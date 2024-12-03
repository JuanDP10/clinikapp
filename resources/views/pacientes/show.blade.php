@extends('layout')

@section('title')
<title>Clinick App | {{ $data->nombre }}</title>
@endsection

@section('content')

<div class="right_col" role="main" style="min-height: 913px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              <h3 style="font-weight: bold"><i class="fa fa-users"></i> Perfil </h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search text-right">
                    <a href="{{ route('pacientes.index') }}" class="btn btn-primary ">
                        <i class="fa fa-arrow-left"></i> Regresar
                    </a>
                </div>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">

                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left text-dark">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img 
                              class="img-responsive avatar-view" 
                              src="{{ $data->foto ? asset('images/' . $data->foto) : asset('images/user.png') }}" 
                              alt="Avatar" 
                              title="Change the avatar"
                              style="width: 280px; height: 280px;"
                          />
                        </div>
                      </div>
                      <h3 class="font-weight-bold">{{ $data->nombre }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-calendar"></i> Fecha de Nacimiento: {{ $data->fecha_nacimiento }}</li>
                        <li><i class="fa fa-info-circle"></i> Tipo de Documento: {{ $data->tipo_documento }}</li>
                        <li><i class="fa fa-hashtag"></i> Documento: {{ $data->documento }}</li>
                        <li><i class="fa fa-venus-mars"></i> Genero: {{ $data->genero }}</li>
                        <li><i class="fa fa-hospital-o"></i> EPS: {{ $data->eps }}</li>
                        <li><i class="fa fa-envelope"></i> Correo: {{ $data->correo }}</li>
                        <li><i class="fa fa-phone"></i> Telefono: {{ $data->telefono }}</li>
                        <li><i class="fa fa-map-marker"></i> Direccion: {{ $data->direccion }}</li>
                        <li><i class="fa fa-stethoscope"></i> Historial Medico: {{ $data->historial_medico }}</li>
                      </ul>
                      
                      <div class="btn-group" style="display: flex; gap: 10px; justify-content: flex-start;">
                        <a href="{{ route('pacientes.edit', $data->id) }}" class="btn btn-success" style="color: white;">
                            <i class="fa fa-edit m-right-xs"></i> Editar Perfil
                        </a>
                      </div>
                    </div>

                    <div class="col-md-9 col-sm-9 ">

                      <div class="profile_title">
                        <div class="col-md-12">
                          <h2 class="text-center font-weight-bold text-dark">CITAS</h2>
                        </div>
                      </div>

                          <div role="tabpanel" class="tab-pane fade active show" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin text-center">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Doctor</th>
                                  <th>Consultorio</th>
                                  <th>Diagnostico</th>
                                  <th>Tratamiento</th>
                                  <th>Estado</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($citas as $key)
                                  <tr>
                                    <td>{{ $key->fecha }}</td>
                                    <td>{{ $key->hora }}</td>
                                    <td>{{ $key->doctor->nombre }}</td>
                                    <td>{{ $key->consultorio->numero_consultorio }}</td>
                                    <td>{{ $key->diagnostico }}</td>
                                    <td>{{ $key->tratamiento }}</td>
                                    <td>{{ $key->estado }}</td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection