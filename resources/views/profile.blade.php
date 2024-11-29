@extends('layout')

@section('title')
<title>Clinick App | Actualizar Perfil</title>
@endsection

@section('content')

  <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                <h3><i class="fa fa-user"></i> Perfil</h3>
                </div>

                <div class="clearfix"></div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Actualizar Perfil</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" action="profile" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                            
                            @csrf

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nombre <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control " required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Correo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email"  name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Foto <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="formFile" name="foto" class="form-label" accept="image/*" required>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{ url('home') }}"><button class="btn btn-danger" type="button">Cancelar</button></a>
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection      
      