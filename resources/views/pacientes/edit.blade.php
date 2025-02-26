@extends('layout')

@section('title')
<title>Clinick App | Editar Paciente</title>
@endsection

@section('content')

<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>Editar Paciente</h2>
            <div class="clearfix"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-1 col-2">
                
            </div>

            <div class="col-md-10 col-8 my-3">
                <form action="{{ route('pacientes.update', $data->id ) }}" method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    <div class="row">
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre', $data->nombre) }}" required>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $data->fecha_nacimiento) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="" disabled selected>Seleccione un género</option>
                                @foreach($generos as $genero)
                                    <option value="{{ $genero }}" {{ $genero == old('genero', $data->genero) ? 'selected' : '' }}>{{ $genero }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                                <option value="" disabled selected>Seleccione un tipo de documento</option>
                                @foreach($tipos_documento as $tipo)
                                    <option value="{{ $tipo }}" {{ $tipo == old('tipo_documento', $data->tipo_documento) ? 'selected' : '' }}>{{ $tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="documento" name="documento" placeholder="Documento" value="{{ old('documento', $data->documento) }}" required>
                            <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-right" id="eps" name="eps" placeholder="EPS" value="{{ old('eps', $data->eps) }}" required>
                            <span class="fa fa-hospital-o form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="telefono" name="telefono" placeholder="Telefono" value="{{ old('telefono', $data->telefono) }}" required>
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="email" class="form-control has-feedback-right" id="correo" name="correo" placeholder="Correo" value="{{ old('correo', $data->correo) }}" required>
                            <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="historial_medico" name="historial_medico" placeholder="Historial Medico" value="{{ old('historial_medico', $data->historial_medico) }}" required>
                            <span class="fa fa-heartbeat form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-right" id="direccion" name="direccion" placeholder="Direccion" value="{{ old('direccion', $data->direccion) }}" required>
                            <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-12 form-group has-feedback">
                            <input type="file" id="formFile" name="foto" placeholder="Foto" class="form-control has-feedback-left" accept="image/*">
                            <span class="fa fa-photo form-control-feedback left" aria-hidden="true"></span>
                            @if($data->foto)
                                <div class="mt-3 text-center">
                                    <p><strong>Foto Actual:</strong></p>
                                    <img src="{{ asset('images/' . $data->foto) }}" alt="Foto actual" class="img-thumbnail" width="150">
                                    <div class="form-check mt-2">
                                        <input type="checkbox" name="eliminar_foto" value="1" class="form-check-input" id="eliminarFoto">
                                        <label class="form-check-label" for="eliminarFoto">Eliminar Foto</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8 text-center">
                            <a href="{{ route('pacientes.show', $data->id) }}" class="btn btn-danger" style="color: white;">
                                <i class="fa fa-times"></i> Cancelar
                            </a>
                            
                            <!-- Botón de Restablecer -->
                            <button class="btn btn-primary" type="reset">
                                <i class="fa fa-undo"></i> Restablecer
                            </button>

                            <!-- Botón de Enviar -->
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-paper-plane"></i> Enviar
                            </button>

                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-1 col-2">
                <p></p>
            </div>
        </div>
    </div>
</div>

@endsection
