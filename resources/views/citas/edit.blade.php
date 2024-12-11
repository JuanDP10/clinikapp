@extends('layout')

@section('title')
<title>Clinick App | Editar Cita</title>
@endsection

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="right_col" role="main">
        <div class="x_panel" >
            <div class="x_title">
                <h2>Editar Cita</h2>
                <div class="clearfix"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-1 col-2">
                    <p></p>
                </div>

                <div class="col-md-10 col-8 my-3" >
                    <form class="form-label-left input_mask" action="{{ route('citas.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="paciente_id" name="paciente_id" required>
                                    <option value="" disabled>Seleccione el Paciente</option>
                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}" 
                                            {{ $data->paciente_id == $paciente->id ? 'selected' : '' }}>
                                            {{ $paciente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="time" class="form-control" value="{{ $data->hora }}" id="hora" name="hora" placeholder="Hora" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="doctor_id" name="doctor_id" required>
                                    <option value="" disabled>Seleccione el Doctor</option>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}" 
                                            {{ $data->doctor_id == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="date" class="form-control has-feedback" value="{{ $data->fecha }}" id="fecha" name="fecha" placeholder="Fecha" required>
                            </div>
                        </div>                        

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="consultorio_id" name="consultorio_id" required>
                                    <option value="" disabled>Seleccione el Consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}" 
                                            {{ $data->consultorio_id == $consultorio->id ? 'selected' : '' }}>
                                            {{ $consultorio->numero_consultorio }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-right" value="{{ $data->diagnostico }}" id="diagnostico" name="diagnostico" placeholder="Diagnostico">
                                <span class="fa fa-heartbeat form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="" disabled>Seleccione el Estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado }}" 
                                            {{ $data->estado == $estado ? 'selected' : '' }}>
                                            {{ $estado }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-right" value="{{ $data->tratamiento }}" id="tratamiento" name="tratamiento" placeholder="Tratamiento">
                                <span class="fa fa-medkit form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-8 text-center">
                                <a href="{{ route('citas.index') }}" class="btn btn-danger" style="color: white;">
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
    <script>
        $('select').select2();
    </script>
@endsection
