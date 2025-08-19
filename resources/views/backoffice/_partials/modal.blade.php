<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="role-title">$datos['textos']['titulo'];
                    </h4>
                    <p class="text-body-secondary">$datos['textos']['instruccion'];
                    </p>
                </div>
                <hr>
                <form action="{{ route('backoffice.user.contact.update') }}" method="post">
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                
                <div class="text-center mb-4">
                    <h4 class="modal-title">Editar Información de Contacto y Redes Sociales</h4>
                    <p class="text-body-secondary">Actualiza tus datos de contacto y enlaces a redes sociales.</p>
                </div>

                <hr>

                <form action="{{ route('backoffice.user.contact.update') }}" method="post">
                    @csrf

                    {{-- Contact Information --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ old('email', $user->email ?? '') }}"
                               placeholder="john.doe@example.com" required>
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="form-control"
                               value="{{ old('phone', $user->phone ?? '') }}"
                               placeholder="+56 9 1234 5678" required>
                        @error('phone')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" id="address" name="address" class="form-control"
                               value="{{ old('address', $user->address ?? '') }}"
                               placeholder="Av. Principal 123, Santiago, Chile">
                        @error('address')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="mt-4 mb-4">

                    {{-- Social Media --}}
                    <h5 class="mb-3">Redes Sociales</h5>

                    <div class="mb-3">
                        <label for="facebook" class="form-label">
                            <i class="bi bi-facebook me-1 text-primary"></i> Facebook
                        </label>
                        <input type="url" id="facebook" name="facebook" class="form-control"
                               value="{{ old('facebook', $user->facebook ?? '') }}"
                               placeholder="https://www.facebook.com/tuPerfil">
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">
                            <i class="bi bi-twitter-x me-1 text-info"></i> Twitter
                        </label>
                        <input type="url" id="twitter" name="twitter" class="form-control"
                               value="{{ old('twitter', $user->twitter ?? '') }}"
                               placeholder="https://twitter.com/tuUsuario">
                    </div>

                    <div class="mb-3">
                        <label for="instagram" class="form-label">
                            <i class="bi bi-instagram me-1 text-danger"></i> Instagram
                        </label>
                        <input type="url" id="instagram" name="instagram" class="form-control"
                               value="{{ old('instagram', $user->instagram ?? '') }}"
                               placeholder="https://www.instagram.com/tuPerfil">
                    </div>

                    <div class="mb-3">
                        <label for="linkedin" class="form-label">
                            <i class="bi bi-linkedin me-1 text-primary"></i> LinkedIn
                        </label>
                        <input type="url" id="linkedin" name="linkedin" class="form-control"
                               value="{{ old('linkedin', $user->linkedin ?? '') }}"
                               placeholder="https://www.linkedin.com/in/tuPerfil">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
