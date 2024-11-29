@extends('layout')

@section('title')
<title>Clinick App | Editar Doctor</title>
@endsection

@section('content')

    <div class="right_col" role="main">
        <div class="x_panel" >
            <div class="x_title">
                <h2>Editar Doctor</h2>
                <div class="clearfix"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-1 col-2">
                    
                </div>

                <div class="col-md-10 col-8 my-3" >
                    <form action="{{ route('doctores.update', $data->id ) }}" method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 

                        <div class="row" >
                            <div class="col-md-6 col-6 form-group has-feedback" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align"  style="font-weight: bold; color: #000; font-size: 16px;" for="name">Nombre 
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="text" id="nombre" name="nombre" value="{{ $data->nombre }}" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="col-md-6 col-6 form-group has-feedback" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; color: #000; font-size: 16px;" for="especialidad">Especialidad
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="text" id="especialidad" name="especialidad" value="{{ $data->especialidad }}" required="required" class="form-control ">
                                </div>
                            </div>

                            
                            <div class="col-md-6 col-6 form-group has-feedback" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; color: #000; font-size: 16px;" for="foto">Foto
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="file" id="formFile" name="foto" value="{{ $data->foto }}" required="required" class="form-label" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-6 col-6 form-group has-feedback">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; color: #000; font-size: 16px;" for="consultorio_id">
                                    Consultorio
                                </label>
                                <div class="col-md-8 col-sm-8">
                                    <select id="consultorio_id" name="consultorio_id" class="form-control" required>
                                        <option value="" disabled>Selecciona un consultorio</option>
                                        @foreach ($consultorios as $consultorio)
                                            <option value="{{ $consultorio->id }}" 
                                                {{ $consultorio->id == $data->consultorio_id ? 'selected' : '' }}>
                                                {{ $consultorio->numero_consultorio }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6 form-group has-feedback" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; color: #000; font-size: 16px;" for="telefono">Telefono
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="tel" id="telefono" name="telefono" value="{{ $data->telefono }}" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="col-md-6 col-6 form-group has-feedback" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; color: #000; font-size: 16px;" for="correo">Correo
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="email" id="correo" name="correo" value="{{ $data->correo }}" required="required" class="form-control ">
                                </div>
                            </div>

                            <div class="col-md-6 col-6 form-group has-feedback" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; color: #000; font-size: 16px;" for="horario">Horario
                                </label>
                                <div class="col-md-8 col-sm-8 ">
                                    <input type="text" id="horario" name="horario" value="{{ $data->horario }}" required="required" class="form-control ">
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-8 text-center">
                                <a href="{{ route('doctores.show', $data->id) }}" class="btn btn-primary" style="color: white;">
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

                <div class="col-md-1 col-2" >
                    <p></p>
                </div>
            </div>
        </div>
    </div>

@endsection
