@extends('layout')

@section('title')
<title>Clinick App | Consultorios</title>
@endsection

@section('content')

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<style>
  table#myTable thead th {
    text-align: center !important;
  }
</style>
  
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3 style="font-weight: bold"><i class="fa fa-stethoscope"></i> Consultorios</h3>
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
              <!-- <h2>Welcome to Clinik App</h2> -->
              
              <table class="table table-hover text-center" id="myTable">
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
                        <td class="text-center">{{ $consultorio->numero_consultorio }}</td>
                        <td class="text-center">{{ $consultorio->piso }}</td>
                        <td class="text-center">{{ $consultorio->estado }}</td>
                        <td>
                          <div class="btn-group" style="gap: 5px; justify-content: flex-start;">
                            <a href="{{ route('consultorios.edit', $consultorio->id) }}" class="btn btn-success btn-sm" style="color: white;">
                                <i class="fa fa-edit m-right-xs"></i> Editar
                            </a>
                            @if(Auth::user()->rol == 'admin')
                              <form action="{{ route('consultorios.destroy', $consultorio->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="color: white; width: 100%;" onclick="return confirm('¿Estás seguro de que deseas desactivar este perfil?')">
                                    <i class="fa fa-times m-right-xs"></i> Mantenimiento
                                </button>
                              </form>
                            @endif
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
            { orderable: false, targets: [3] } // Desactivar ordenamiento en la columna "Acciones"
        ]
    });
  </script>

@endsection      
      