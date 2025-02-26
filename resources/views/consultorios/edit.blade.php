@extends('layout')

@section('title')
<title>Clinick App | Editar Consultorio</title>
@endsection

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="right_col" role="main">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar Consultorio</h2>
                <div class="clearfix"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-1 col-2">
                    <p></p>
                </div>

                <div class="col-md-10 col-8 my-3">
                    <!-- Formulario para editar el consultorio -->
                    <form class="form-label-left input_mask" action="{{ route('consultorios.update', $data->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="row">
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="numero_consultorio" name="numero_consultorio" value="{{ old('numero_consultorio', $data->numero_consultorio) }}" placeholder="Numero Consultorio" required>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                    
                            <div class="col-md-6 col-12 form-group has-feedback">
                                <input type="text" class="form-control" id="especialidad" name="piso" value="{{ old('piso', $data->piso) }}"  placeholder="Piso" required>
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12 col-12 form-group has-feedback">
                                <select class="form-control" id="estado" name="estado" required>
                                    <option value="disponible" {{ $data->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="mantenimiento" {{ $data->estado == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="ln_solid"></div>
                    
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-8 text-center">
                                <a href="{{ route('consultorios.index') }}" class="btn btn-danger" style="color: white;">
                                    <i class="fa fa-times"></i> Cancelar
                                </a>
                                <button class="btn btn-primary" type="reset">
                                    <i class="fa fa-undo"></i> Restablecer
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-paper-plane"></i> Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>

                {{-- Sidebar derecha --}}
                <div class="col-md-1 col-2">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('select').select2();
    </script>
@endsection
