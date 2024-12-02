@extends('layout')
@section('title')
<title>Clinick App | Pacientes</title>
@endsection

@section('content')

  <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3 style="font-weight: bold"><i class="fa fa-users"></i> Pacientes</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search text-right">
                  <a href="{{ route('pacientes.create') }}" class="btn btn-primary ">
                      <i class="fa fa-plus"></i> Ingresar Paciente
                  </a>
              </div>
            </div>
        </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <!-- <h2>Welcome to Clinik App</h2> -->
                  
                  <table class="table table-hover text-center">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>Nombre</th>
                          <th>Fecha Nacimiento</th>
                          <th>Genero</th>
                          <th>Tipo Documento</th>
                          <th>Documento</th>
                          <th>EPS</th>
                          <th>Correo</th>
                          <th>Teléfono</th>
                          <th>Dirección</th>
                          <th>Historial Medico</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $paciente)
                          <tr>
                            <td><img src="{{ $paciente->foto ? asset('images/' . $paciente->foto) : asset('images/user.png') }}" alt="" style="width: 70px; height: 70px;"></td>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->fecha_nacimiento }}</td>
                            <td>{{ $paciente->genero }}</td>
                            <td>{{ $paciente->tipo_documento }}</td>
                            <td>{{ $paciente->documento }}</td>
                            <td>{{ $paciente->eps }}</td>
                            <td>{{ $paciente->correo }}</td>
                            <td>{{ $paciente->telefono }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>{{ $paciente->historial_medico }}</td>
                            <td width="100">
                              <div class="btn-group" style="gap: 10px; flex-direction: column; align-items: flex-start; width: 100%;">
                                <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-primary btn-sm" style="width: 100%;">
                                  <i class="fa fa-eye m-right-xs"></i> Ver
                                </a>
                                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-success btn-sm" style="width: 100%;">
                                  <i class="fa fa-edit m-right-xs"></i> Editar
                                </a>
                              </div>    
                            </td>                                                   
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>

@endsection      
      