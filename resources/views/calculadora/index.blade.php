@extends('layouts.app')
@section('title','Listado De Personas')
@section('content')
@if(Session::has('create'))
    <script>
        setTimeout(function(){
                function_swal_confirm('{{Session::get('create')}}', 'creada/o')
        }, 500);
    </script>
@elseif(Session::has('update'))
    <script>
        setTimeout(function(){
            function_swal_confirm('{{Session::get('update')}}', 'editada/o')
        }, 500);
    </script>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Personas</h1>
    <p class="mb-4">Datos registrados en el sistema</p>
    
    <div class="card shadow mb-4">
        <div class="text-center mt-3 ml-3">
            <a href="{{route('calculadora.create')}}" class="btn btn-success">
                <span class="icon text-white-50">
                <i class="fas fa-plus text-white"></i>
                </span>
                <span class="text">Nueva</span>
            </a>    
            <a href="{{route('home')}}" class="btn btn-warning ">
                <span class="icon text-white-50">
                <i class="fas fa-plus text-white"></i>
                </span>
                <span class="text-white">Salir</span>
            </a>
        </div>

      <div class="card-body">
        <div class="table-responsive">
            <table id="table_calculadora" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="option-item">ID</th>
                        <th class="option-item">Nombre</th>
                        <th class="option-item">Apellido</th>
                        <th class="option-item">Edad</th>
                        <th>Genero</th>
                        <th class="option-item">Peso</th>
                        <th class="option-item">BMI</th>
                        <th>Categoria Masa Muscular</th>
                        <th class="option-item">BMR</th>
                        <th>Nivel de actividad</th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody >
                
                    @foreach($personas as $persona)
                        <tr>
                            <td>{{ $persona->id }}</td>
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->apellido }}</td>
                            <td>{{ (date("Y") - date('Y', strtotime($persona->fecha_nacimiento))) }}</td>
                            <td>{{ $persona->genero }}</td>
                            <td>{{ $persona->peso }}</td>
                            <td>{{ $persona->bmi }}</td>
                            <td>{{ $persona->bmi_categoria }}</td>
                            <td>{{ $persona->bmr }}</td>
                            <td>{{ $persona->nivel_actividad }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-info btn-sm" onclick="window.location='{{route('calculadora.show', $persona->id)}}'"><i class="fa fa-eye"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>

<div class="container">

    <style>
        .ddtf-processed th.option-item > select{
            display:none;
        }
        .ddtf-processed th.option-item > div{
            display:block !important;
        }
    </style>

    <div class="card-body table-responsive">

    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">

    // {{-- Filtro select en table --}}
        $(document).ready(function() {
            $('#table_calculadora').DataTable({
                "ordering": false
            });
            $('#table_calculadora').ddTableFilter();
        });


        var idclick;var nombreclick;
        function id_clickeado(id,nombre){
                console.log("id clickeada => "+id);
            idclick=id;//captura el id a la cual se le dio click
            nombreclick=nombre;//captura el nombre a la cual se le dio click
        }
        function function_swal() {
            
            swal({
                    title: "¿Seguro que desea eliminar la persona "+nombreclick+"? ",
                    text: "Se eliminara toda la información",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                    closeOnCancel: false 
                 },
                function(isConfirm){
                    if (isConfirm) {
                        swal("Persona Eliminada!","procesando cambios","success");
                        setTimeout(function(){
                            var idfinal="#delete"+idclick;//se le agrega el id que fue clickeado
                            $(idfinal).click();
                        }, 500);
                    } else {
                        swal("Cancelado", "La persona NO ha sido eliminada", "error");
                    }
                });
        }
        function function_swal_confirm(text, type) {
            swal("Informacion almacenada", " "+text+" han sido "+type+" correctamente", "success");
        }
    </script>
@endsection