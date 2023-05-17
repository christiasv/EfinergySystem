<div class="modal fade" aria-hidden="true" aria-labelledby="mediumModalLabel" role="dialog" tabindex="-1" id="modal-create-usuario" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- modal noticia -->
            <div class="modal-header">
                <h3 class="modal-title" id="mediumModalLabel">Agregar Usuario</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            {!!Form::open(array('url'=>'usuarios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="modal-body">
                <div class="card-body card-block">
                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Empresa') }}</label>

                            <div class="col-md-6">
                                <select name="ID_Empresa" id="ID_Empresa" class="form-control">
                                    <option value="0" disabled selected>{{ __('Seleccionar la empresa') }}</option>
                                    @if (isset($empresas))
                                        @foreach($empresas as $empresa)
                                            <option value="{{ $empresa->ID }}">{{ $empresa->Nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <select name="ID_Area" id="ID_Area" type="text" class="form-control @error('rol') is-invalid @enderror" required>
                                    <option value="0" disabled selected>{{ __('Seleccionar el área') }}</option>
                                    @if (isset($areas))
                                        @foreach($areas as $area)
                                            <option value="{{ $area->ID }}">{{ $area->Nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Cargo') }}</label>

                            <div class="col-md-6">
                                <select name="ID_Cargo" id="ID_Cargo" type="text" class="form-control @error('rol') is-invalid @enderror" required>
                                    <option value="0" disabled selected>{{ __('Seleccionar el cargo') }}</option>
                                    @if (isset($cargos))
                                        @foreach($cargos as $cargo)
                                            <option value="{{ $cargo->ID }}">{{ $cargo->Nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre completo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>

                            <div class="col-md-6">
                                <select name="rol" id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" required>
                                    <option value="0" disabled selected>{{ __('Seleccionar tipo') }}</option>
                                    <option value="Administrador">DNI</option>
                                    <option value="Asistente">RUC</option>
                                    <option value="Visualizador">Carnet de extranjeria</option>
                                    <option value="">Pasaporte</option>
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Numero de documento') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('name') is-invalid @enderror" name="Doc_ident" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('name') is-invalid @enderror" name="Fecha_nac" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('name') is-invalid @enderror" name="Direccion" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('name') is-invalid @enderror" name="Telefono" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo personal') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="Mail_personal" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="file-input" class="col-md-4 col-form-label text-md-end">{{ __('Fotografia') }}</label>

                            <div class="col-12 col-md-9">
                                <input type="file" id="Foto" name="Foto" class="form-control-file" accept="image/png, .jpeg, .jpg">
                                <small class="form-text text-muted">Tamaño: 300x400</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo corporativo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select name="rol" id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" required>
                                    <option value="1" selected>{{ __('Activo') }}</option>
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
