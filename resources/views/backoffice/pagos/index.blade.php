@extends('backoffice._partials.app') 

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">{{ $datos['mantenedor']['titulo'] }}
    </h4>
    {{ $datos['mantenedor']['instruccion'] }}
        </p>
        @include('backoffice._partials.messages')

        <div class="d-flex justify-content-center mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateEstado">
 <i class="fa fa-plus-circle me-2"></i>  Pago
    </button>
</div>


    <div class="card">
                    <div class="card-datatable">
                        @component('backoffice._partials.pagos_table', [
                            'lista' => $lista,
                            'datos' => $datos,
                        ])
                        @endcomponent
                    </div>
                </div>
                <!--/ Role Table -->
            </div>
        </div>
        <!--/ Role cards -->

        <!-- Add Role Modal -->
 <div class="modal fade" id="modalCreateEstado" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
      <div class="modal-content p-3 p-md-5">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body">
          <div class="text-center mb-4">
            <h3 class="role-title">{{ $datos['mantenedor']['titulo'] }}</h3>
            <p>{{ $datos['mantenedor']['instruccion'] }}</p>
          </div>
          <!-- Add role form -->
          <form class="row g-3" action="{{ route($datos['mantenedor']['routes']['new']) }}" method="POST">
            @csrf
             <div class="col-12 mb-4">
                <label class="form-label" for="item_a_pagar">Item a Pagar</label>
                <select id="item_a_pagar" name="item_a_pagar" class="form-select" required>
                   <option value="">Seleccione un item</option>
                   @foreach($items as $item)
                         <option value="{{ $item['id'] }}" 
                        data-monto="{{ $item['monto_pendiente'] }}">{{ $item['nombre'] }} -  ${{ $item['monto_pendiente'] }}</option>
                  @endforeach
                </select>
                     </div>
                        <div class="col-12 mb-4">
                <label class="form-label" for="tipo_pago">Forma de Pago</label>
                <select id="tipo_pago" name="tipo_pago" class="form-select" required>
                   <option value="">Seleccione una forma de pago</option>
                   <option value="Transferencia">Transferencia</option>
                   <option value="Efectivo">Efectivo</option>
                   <option value="Cheque">Cheque</option>
                   <option value="Otro">Otro</option>
                </select>
             </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Pagar</button>
              <button type="reset" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            </div>
          </form>
          <!--/ Add role form -->
        </div>
      </div>
    </div>
  </div>
        @component('backoffice._partials.modal', [
            'titulo' => $datos['mantenedor']['titulo'],
            'instruccion' => $datos['mantenedor']['instruccion'],
            'accion' => 'new',
            'ruta' => $datos['mantenedor']['routes']['new'],
            'campos' => $datos['mantenedor']['fields'],
        ])
        @endcomponent
        <!--/ Add Role Modal -->
        
    </div>
@endsection

