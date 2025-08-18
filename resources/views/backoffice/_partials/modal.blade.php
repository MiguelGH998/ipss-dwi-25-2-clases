<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="role-title">{{ $titulo }}</h4>
                    <p class="text-body-secondary">{{ $instruccion }}</p>
                </div>
                <hr>
                <form action="{{ route($ruta) }}" method="post">
                    @csrf
                    @foreach ($campos as $campo)
                        @switch($campo['control']['element'])
                            @case('input')
                            <label class="form-label">{{$campo['label']}}</label>
                            <input 
                                type="{{$campo['control']['type']}}" 
                                name="{{$campo['name']}}"
                                class="@foreach ($campo['control']['classList'] as $class){{$class}} @endforeach" 
                                minlength="{{$campo['control']['min']}}" 
                                maxlength="{{$campo['control']['max']}}" 
                                placeholder="{{$campo['control']['placeholder']}}">
                                @break
                            @case(2)
                                
                                @break
                            @default
                                
                        @endswitch
                    @endforeach
                    <hr>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalContacto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="modal-title">Editar Información de Contacto y Redes Sociales</h4>
                    <p class="text-body-secondary">Actualiza tus datos de contacto y enlaces a redes sociales.</p>
                </div>
                <hr>
                <form action="{{ route('update.contact') }}" method="post"> {{-- Replace '#' with your actual route for updating contact info --}}
                    @csrf
                    {{-- Contact Information Fields --}}
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@example.com">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="+1 (123) 456-7890">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="123 Main St, Anytown, USA">
                    </div>

                    <hr class="mt-6 mb-6">

                    {{-- Social Media Fields --}}
                    <h5 class="mb-4">Redes Sociales</h5>
                    <div class="mb-4">
                        <label for="facebook" class="form-label">Facebook URL</label>
                        <input type="url" id="facebook" name="facebook" class="form-control" placeholder="https://www.facebook.com/yourprofile">
                    </div>
                    <div class="mb-4">
                        <label for="twitter" class="form-label">Twitter URL</label>
                        <input type="url" id="twitter" name="twitter" class="form-control" placeholder="https://twitter.com/yourhandle">
                    </div>
                    <div class="mb-4">
                        <label for="instagram" class="form-label">Instagram URL</label>
                        <input type="url" id="instagram" name="instagram" class="form-control" placeholder="https://www.instagram.com/yourprofile">
                    </div>
                    <div class="mb-4">
                        <label for="linkedin" class="form-label">LinkedIn URL</label>
                        <input type="url" id="linkedin" name="linkedin" class="form-control" placeholder="https://www.linkedin.com/in/yourprofile">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
