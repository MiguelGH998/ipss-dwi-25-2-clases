<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa Auth si necesitas verificar usuarios autenticados
use Illuminate\Support\Facades\Validator; // Importa Validator si necesitas validación manual
use App\Models\PagosModel; // Importa el modelo PagosModel


class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        if (!Auth::check()) {
            // Verifica si el usuario NO está autenticado
            return redirect()->route('/')->withErrors('Debe iniciar sesión.');
        }

        $user = Auth::user();

        // Muestra una lista de pagos
        $lista = PagosModel ::all();
    
        $datos = [
            'textos' => [
                'titulo' => 'Iniciar Sesión | Sonkei FC',
                'logo' => '/assets/imgs/logo_sonkei_v2.webp',
                'nombre' => 'Sonkei FC',
                'formulario' => [
                    'titulo' => 'Bienvenido a Sonkei FC ⚽️',
                    'instruccion' => 'Ingrese Credenciales'
                ],
            ],
            'mantenedor' => [
                'titulo' => 'Pagos del Usuario',
                'instruccion' => 'Los pagos de un usuario definen si puede estar o no un usuario dentro del sistema.',
                'routes' => [
                    'new' => 'backoffice.pagos.new',
                    'update' => 'backoffice.pagos.update',
                    'up' => 'backoffice.pagos.up',
                    'down' => 'backoffice.pagos.down',
                    'delete' => 'backoffice.pagos.destroy',
                ],
                'fields' => [
                    [
                        'label' => 'Nombre',
                        'name' => 'pago_nombre',
                        'required' => true,
                        'control' => [
                            'element' => 'input',
                            'type' => 'text',
                            'classList' => [
                                'form-control',
                                'mb-4'
                            ],
                            'min' => 3,
                            'max' => 50,
                            'placeholder' => 'Ingrese un nombre'   
                        ],
                        'access' => [
                            'editableIn' => [
                                'new' => true,
                                'edit' => true,
                                'show' => false,
                                'up' => false,
                                'down' => false,
                                'delete' => false
                            ],
                            'readIn' => [
                                'new' => true,
                                'edit' => true,
                                'show' => true,
                                'up' => true,
                                'down' => true,
                                'delete' => true
                            ]
                        ]
                    ],
                ]
            ],
            'dev' => [
                'nombre' => 'Instituto Profesional San Sebastián',
                'url' => 'https://www.ipss.cl',
                'logo' => 'https://ipss.cl/wp-content/uploads/2025/04/cropped-LogoIPSS_sello50anos_webipss.png'
            ],
            
        ];
        $items = [
            [
                'id' => 1,
                'nombre' => 'Pago Cuota Mensual',
                'monto_pendiente' => 1000,
                'icon' => 'fa-solid fa-money-bill-wave'
            ],
            [
                'id' => 2,
                'nombre' => 'Pago Membrecía Anual',
                'monto_pendiente' => 12000,
                'icon' => 'fa-solid fa-cash-register'
            ],
            [
                'id' => 3,
                'nombre' => 'Pago Comida',
                'monto_pendiente' => 1000,
                'icon' => 'fa-solid fa-ban'
            ],
            [
                'id' => 4,
                'nombre' => 'Pago Baños Premium',
                'monto_pendiente' => 1000,
                'icon' => 'fa-solid fa-arrows-rotate'
            ]

            ];

// Crear mapeo de nombre y monto
$itemsMap = [];
foreach ($items as $item) {
    $itemsMap[$item['id']] = [
        'nombre' => $item['nombre'],
        'monto' => $item['monto_pendiente']
    ];
}
return view('backoffice.pagos.index', [
    'datos' => $datos,
    'user' => $user,
    'lista' => $lista,
    'items' => $items,
    'itemsMap' => $itemsMap
]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (!Auth::check()) {
            // Verifica si el usuario NO está autenticado
            return redirect()->route('/')->withErrors('Debe iniciar sesión.');
        }

        $user = Auth::user();

        // Muestra el formulario para crear un nuevo pago
        return view('backoffice.pagos.new'); // Ajusta la vista según tu estructura
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            // Verifica si el usuario NO está autenticado
            return redirect()->route('/')->withErrors('Debe iniciar sesión.');
        }

        $user = Auth::user();

        // Valida los datos del formulario
        $validator = Validator::make($request->all(), [
            'item_a_pagar' => 'required|string',
            'tipo_pago' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Crea un nuevo pago
        PagosModel::create($request->only(['item_a_pagar', 'tipo_pago']));

        return redirect()->route('backoffice.pagos.index')->with('success', 'Pago creado exitosamente.'); // Ajusta la redirección
    }

    /**
     * Display the specified resource.
     */
    public function show(PagosModel $pago)
    {
        // Muestra los detalles de un pago específico
        return view('backoffice.pagos.show', compact('pago')); // Ajusta la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PagosModel $pago)
    {
        // Muestra el formulario para editar un pago
        return view('backoffice.pagos.edit', compact('pago')); // Ajusta la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PagosModel $pago)
    {
        // Valida los datos del formulario
        $validator = Validator::make($request->all(), [
            'item_a_pagar' => 'required|string',
            'tipo_pago' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Actualiza el pago
        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente.'); // Ajusta la redirección
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PagosModel $pago)
    {
        // Elimina el pago
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente.'); // Ajusta la redirección
    }
}
