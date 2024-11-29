@extends('layout')
@section('title')
<title>Clinick App | Pacientes</title>
@endsection

@section('content')

  <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3><i class="fa fa-users"></i> Pacientes</h3>
            </div>
          </div>
          <a href="#" class="btn btn-success btn-sm">Agregar</a>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <!-- <h2>Welcome to Clinik App</h2> -->
                  
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Fecha Nacimiento</th>
                          <th>Genero</th>
                          <th>Tipo Documento</th>
                          <th>Documento</th>
                          <th>EPS</th>
                          <th>E-mail</th>
                          <th>Teléfono</th>
                          <th>Dirección</th>
                          <th>Historial Medico</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $paciente)
                          <tr>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->fecha_nacimiento }}</td>
                            <td>{{ $paciente->genero }}</td>
                            <td>{{ $paciente->tipo_documento }}</td>
                            <td>{{ $paciente->documento }}</td>
                            <td>{{ $paciente->eps }}</td>
                            <td>{{ $paciente->email }}</td>
                            <td>{{ $paciente->telefono }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>{{ $paciente->historial_medico }}</td>
                            <td>
                              <a href="#" class="btn btn-info btn-sm">Editar</a>
                              <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
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
      