@extends('layout')

@section('title')
<title>Clinick App | Citas</title>
@endsection

@section('content')

  <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3><i class="fa fa-calendar"></i> Citas</h3>
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
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Doctor</th>
                          <th>Paciente</th>
                          <th>Diagnostico</th>
                          <th>Tratamiento</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $cita)
                          <tr>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->doctor->nombre }}</td>
                            <td>{{ $cita->paciente->nombre }}</td>
                            <td>{{ $cita->diagnostico }}</td>
                            <td>{{ $cita->tratamiento }}</td>
                            <td>{{ $cita->estado }}</td>
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
      