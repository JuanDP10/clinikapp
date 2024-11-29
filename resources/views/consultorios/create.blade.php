@extends('layout')

@section('title')
<title>Clinick App | Crear Consultorio</title>
@endsection

@section('content')

<div class="right_col" role="main">
    <div class="x_panel" >
        <div class="x_title">
            <div class="clearfix"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-1 col-2">
                <p></p>
            </div>

            <div class="col-md-10 col-8 my-3" >
                <form class="form-label-left input_mask" action="{{ route('consultorios.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="numero_consultorio" name="numero_consultorio" placeholder="Numero Consultorio" required>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-12 form-group has-feedback">
                            <input type="text" class="form-control" id="especialidad" name="piso" placeholder="Piso" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8 text-center">
                            <a href="{{ route('consultorios.index') }}" class="btn btn-primary" style="color: white;">
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