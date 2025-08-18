<h5 class="card-header">Lista de Pagos</h5>
<div class="container-fluid px-0">
    <div class="table-responsive text-nowrap" style="width: 100%;">
        <table class="table table-striped table-bordered w-100">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Item a Pagar</th>
                <th>Monto</th>      
                <th>Tipo de Pago</th>
                <th>Fecha de Pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @forelse ($lista as $pago)
                <tr>
                    <td>{{ $pago->user ? $pago->user->id : 'N/A' }}</td>
                    <td>{{ $pago->user ? $pago->user->name : 'N/A' }}</td>
                    <td>{{ $itemsMap[$pago->item_a_pagar]['nombre'] ?? 'N/A' }}</td>
                    <td>{{ $itemsMap[$pago->item_a_pagar]['monto'] ?? 'N/A' }}</td>
                    <td>{{ $pago->tipo_pago }}</td>
                    <td>{{ $pago->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('backoffice.pagos.show', $pago->id) }}">
                                    <i class="ti ti-eye me-1"></i> Ver
                                </a>
                                <a class="dropdown-item" href="{{ route('backoffice.pagos.edit', $pago->id) }}">
                                    <i class="ti ti-pencil me-1"></i> Editar
                                </a>
                                <form action="{{ route('backoffice.pagos.destroy', $pago->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('¿Estás seguro de eliminar este pago?')">
                                        <i class="ti ti-trash me-1"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="8">No hay pagos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
