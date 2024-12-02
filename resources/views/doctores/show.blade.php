@extends('layout')

@section('title')
<title>Clinick App | {{ $data->nombre }}</title>
@endsection

@section('content')

<div class="right_col" role="main" style="min-height: 913px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              <h3 style="font-weight: bold"><i class="fa fa-user-md"></i> Perfil </h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search text-right">
                    <a href="{{ route('doctores.index') }}" class="btn btn-primary ">
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
                        <li><i class="fa fa-graduation-cap"></i> Especialidad: {{ $data->especialidad }}</li>
                        <li><i class="fa fa-envelope"></i> Correo: {{ $data->correo }}</li>
                        <li><i class="fa fa-phone"></i> Telefono: {{ $data->telefono }}</li>
                        <li><i class="fa fa-clock-o"></i> Horario: {{ $data->horario }}</li>
                        <li><i class="fa fa-stethoscope"></i> Consultorio: {{ $data->consultorio->numero_consultorio }}</li>
                        <li><i class="fa fa-calendar"></i> Fecha Contratación: {{ $data->fecha_contratacion }}</li>
                        <li><i class="fa fa-check-circle-o"></i> Estado: {{ $data->estado }}</li>
                      </ul>
                      
                      <div class="btn-group" style="display: flex; gap: 10px; justify-content: flex-start;">
                        <a href="{{ route('doctores.edit', $data->id) }}" class="btn btn-success" style="color: white;">
                            <i class="fa fa-edit m-right-xs"></i> Editar Perfil
                        </a>
                        <form action="{{ route('doctores.destroy', $data->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-danger" style="color: white; width: 100%;" onclick="return confirm('¿Estás seguro de que deseas desactivar este perfil?')">
                              <i class="fa fa-times m-right-xs"></i> Eliminar perfil
                          </button>
                        </form>
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
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Consultorio</th>
                                  <th>Paciente</th>
                                  <th>Diagnostico</th>
                                  <th>Tratamiento</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($citas as $key)
                                  <tr>
                                    <td>{{ $key->fecha }}</td>
                                    <td>{{ $key->hora }}</td>
                                    <td>{{ $key->consultorio->numero_consultorio }}</td>
                                    <td>{{ $key->paciente->nombre }}</td>
                                    <td>{{ $key->diagnostico }}</td>
                                    <td>{{ $key->tratamiento }}</td>
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