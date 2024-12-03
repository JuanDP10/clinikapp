@extends('layout')

@section('title')
<title>Clinick App | Crear Cita</title>
@endsection

@section('content')

    <div class="right_col" role="main">
        <div class="x_panel" >
            <div class="x_title">
                <h2>Crear Cita</h2>
                <div class="clearfix"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-1 col-2">
                    <p></p>
                </div>

                <div class="col-md-10 col-8 my-3" >
                    <form class="form-label-left input_mask" action="{{ route('citas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="paciente_id" name="paciente_id" required>
                                    <option value="" disabled selected>Seleccione el Paciente</option>
                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id}}">{{ $paciente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="time" class="form-control" id="hora" name="hora" placeholder="Hora" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="doctor_id" name="doctor_id" required>
                                    <option value="" disabled selected>Seleccione el Doctor</option>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id}}">{{ $doctor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="date" class="form-control has-feedback" id="fecha" name="fecha" placeholder="Fecha" required>
                            </div>
                        </div>                        

                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="consultorio_id" name="consultorio_id" required>
                                    <option value="" disabled selected>Seleccione el Consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->numero_consultorio }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-right" id="diagnostico" name="diagnostico" placeholder="Diagnostico">
                                <span class="fa fa-heartbeat form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="" disabled selected>Seleccione el Estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado }}">{{ $estado }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-right" id="tratamiento" name="tratamiento" placeholder="Tratamiento">
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

@endsection
