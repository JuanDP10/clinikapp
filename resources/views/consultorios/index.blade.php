@extends('layout')

@section('title')
<title>Clinick App | Consultorios</title>
@endsection

@section('content')

  <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3><i class="fa fa-stethoscope"></i> Consultorios</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search text-right">
                  <a href="{{ route('consultorios.create') }}" class="btn btn-primary ">
                      <i class="fa fa-plus"></i> Ingresar Consultorio
                  </a>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div>
                  <form action="{{ route('consultorios.index') }}" method="GET" id="filterForm">
                    <div class="form-group d-flex align-items-center">
                        <label for="estado" class="mr-2 mb-0">Filtrar por estado:</label>
                        <select name="estado" id="estado" class="form-control form-control-sm mr-2" style="width: 150px;" onchange="this.form.submit()">
                            <option value="todos" {{ strtolower($estado) == 'todos' ? 'selected' : '' }}>Todos</option>
                            <option value="Disponible" {{ strtolower($estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="Mantenimiento" {{ strtolower($estado) == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                        </select>
                    </div>
                </form>
                </div>
                <div class="x_title">
                  <!-- <h2>Welcome to Clinik App</h2> -->
                  
                  <table class="table table-hover text-center">
                      <thead>
                        <tr>
                          <th width="200">Numero Consultorio</th>
                          <th width="200">Piso</th>
                          <th width="200">Estado</th>
                          <th width="200">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $consultorio)
                          <tr>
                            <td>{{ $consultorio->numero_consultorio }}</td>
                            <td>{{ $consultorio->piso }}</td>
                            <td>{{ $consultorio->estado }}</td>
                            <td>
                              <div class="btn-group" style="gap: 10px; justify-content: flex-start;">
                                <a href="{{ route('consultorios.edit', $consultorio->id) }}" class="btn btn-success" style="color: white;">
                                    <i class="fa fa-edit m-right-xs"></i> Editar Consultorio
                                </a>
                                <form action="{{ route('consultorios.destroy', $consultorio->id) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <button type="submit" class="btn btn-danger" style="color: white; width: 100%;" onclick="return confirm('¿Estás seguro de que deseas desactivar este perfil?')">
                                      <i class="fa fa-times m-right-xs"></i> Mantenimiento
                                  </button>
                                </form>
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
      