@extends('layout')

@section('title')
<title>Clinick App | Crear Doctor</title>
@endsection

@section('content')

    <div class="right_col" role="main">
        <div class="x_panel" >
            <div class="x_title">
                <h2>Crear Doctor</h2>
                <div class="clearfix"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-1 col-2">
                    <p></p>
                </div>

                <div class="col-md-10 col-8 my-3" >
                    <form class="form-label-left input_mask" action="{{ route('doctores.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" placeholder="Nombre" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Especialidad" required>
                                <span class="fa fa-stethoscope form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="email" class="form-control has-feedback-left" id="correo" name="correo" placeholder="Correo" required>
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="file" id="formFile" name="foto" placeholder="Foto" class="form-control has-feedback-left" accept="image/*">
                                <span class="fa fa-photo form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-right" id="horario" name="horario" placeholder="Horario" required>
                                <span class="fa fa-clock-o form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select id="consultorio_id" name="consultorio_id" class="form-control" required>
                                    <option value="" disabled>Selecciona un consultorio</option>
                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}" 
                                            {{ old('consultorio_id', $data->consultorio_id ?? '') == $consultorio->id ? 'selected' : '' }}>
                                            {{ $consultorio->numero_consultorio }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="date" class="form-control has-feedback" id="fecha_contratacion" name="fecha_contratacion" placeholder="Fecha Contratacion" required>

                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-8 text-center">
                                <a href="{{ route('doctores.index') }}" class="btn btn-primary" style="color: white;">
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

                {{-- Sidebar derecha --}}
                <div class="col-md-1 col-2" >
                    <p></p>
                </div>
            </div>
        </div>
    </div>

@endsection
