@extends('layout')

@section('title')
<title>Clinick App | Doctores</title>
@endsection

@section('content')

  <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-user-md"></i> Doctores</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 form-group pull-right top_search text-right">
                    <a href="{{ route('doctores.create') }}" class="btn btn-primary ">
                        <i class="fa fa-plus"></i> Ingresar Doctor
                    </a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div>
                      <form action="{{ route('doctores.index') }}" method="GET" id="filterForm">
                          <div class="form-group d-flex align-items-center">
                              <label for="estado" class="mr-2 mb-0">Filtrar por estado:</label>
                              <select name="estado" id="estado" class="form-control form-control-sm mr-2" style="width: 150px;" onchange="this.form.submit()">
                                  <option value="todos" {{ $estado == 'todos' ? 'selected' : '' }}>Todos</option>
                                  <option value="Activo" {{ $estado == 'Activo' ? 'selected' : '' }}>Activos</option>
                                  <option value="Inactivo" {{ $estado == 'Inactivo' ? 'selected' : '' }}>Inactivos</option>
                              </select>
                          </div>
                      </form>
                    </div>

                    <div class="row">
                        @foreach ($data as $doctor)
                            <div class="col-md-4 col-sm-4 profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i>{{ $doctor->nombre }}</i></h4>
                                        <div class="left col-sm-7">
                                            <p><strong>Especialidad: </strong> {{ $doctor->especialidad }} </p>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-building"></i> Correo: {{ $doctor->correo }}</li>
                                                <li><i class="fa fa-phone"></i> Telefono: {{ $doctor->telefono }}</li>
                                                <li><i class="fa fa-clock-o"></i> Horario: {{ $doctor->horario }}</li>
                                                <li><i class="fa fa-stethoscope"></i> Consultorio: {{ $doctor->consultorio->numero_consultorio }}</li>
                                                <li><i class="fa fa-calendar"></i> Fecha Contratación: {{ $doctor->fecha_contratacion }}</li>
                                                <li><i class="fa fa-check-circle-o"></i> Estado: {{ $doctor->estado }}</li>
                                            </ul>
                                        </div>
                                        <div class="right col-sm-5 text-center">
                                            <img src="{{ $doctor->foto ? asset('images/' . $doctor->foto) : asset('images/user.png') }}" alt="" class="img-circle img-fluid" style="width: 150px; height: 150px;">
                                            <div class="pt-3 text-center">
                                                <a href="{{ route('doctores.show', $doctor->id) }}" class="btn btn-primary btn-sm "> Ver Perfil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
