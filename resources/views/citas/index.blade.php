@extends('layout')

@section('title')
<title>Clinick App | Citas</title>
@endsection

@section('content')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

  <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3 style="font-weight: bold"><i class="fa fa-calendar"></i> Citas</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 form-group pull-right top_search text-right">
                  <a href="{{ route('citas.create') }}" class="btn btn-primary ">
                      <i class="fa fa-plus"></i> Ingresar Cita
                  </a>
              </div>
            </div>
        </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div>
                  <form action="{{ route('citas.index') }}" method="GET" id="filterForm">
                      <div class="form-group d-flex align-items-center">
                          <label for="estado" class="mr-2 mb-0">Filtrar por estado:</label>
                          <select name="estado" id="estado" class="form-control form-control-sm mr-2" style="width: 150px;" onchange="this.form.submit()">
                              <option value="todos" {{ $estado == 'todos' ? 'selected' : '' }}>Todos</option>
                              <option value="Completada" {{ $estado == 'Completada' ? 'selected' : '' }}>Completada</option>
                              <option value="Cancelada" {{ $estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                              <option value="Programada" {{ $estado == 'Programada' ? 'selected' : '' }}>Programada</option>
                          </select>
                      </div>
                  </form>
                </div>
                  <!-- <h2>Welcome to Clinik App</h2> -->
                  
                  <table class="table table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Doctor</th>
                          <th>Paciente</th>
                          <th>Diagnostico</th>
                          <th>Tratamiento</th>
                          <th>Estado</th>
                          <th>Acciones</th>
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
                              <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit m-right-xs"></i> Editar</a>
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
  <script>
    let table = new DataTable('#myTable', {
        paging: true,
        searching: true, 
        ordering: true, 
        info: true, 
        lengthMenu: [10, 25, 50],
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            search: "Buscar:",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
        columnDefs: [
            { orderable: false, targets: [7] } // Desactivar ordenamiento en la columna "Acciones"
        ]
    });
  </script>

@endsection      
      