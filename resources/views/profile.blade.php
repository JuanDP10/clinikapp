@extends('layout')

@section('title')
<title>Clinick App | Actualizar Perfil</title>
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 style="font-weight: bold"><i class="fa fa-user"></i> Perfil</h3>
            </div>

            <div class="clearfix"></div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Actualizar Perfil</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('profile.update') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Nombre</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" name="name" class="form-control" value="{{ old('name', $datos->name) }}" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Correo</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="email" name="email" class="form-control" value="{{ old('email', $datos->email) }}" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Foto</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" id="formFile" name="foto" class="form-label" accept="image/*">
                                @if($datos->foto)
                                    <br><br>
                                    <p>Foto actual: <img src="{{ asset('images/' . $datos->foto) }}" alt="Foto de perfil" style="max-height: 100px;"></p>
                                    <label for="deletePhoto">Eliminar foto:</label>
                                    <input type="checkbox" id="deletePhoto" name="delete_foto" value="1" {{ old('delete_foto') ? 'checked' : '' }}>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
