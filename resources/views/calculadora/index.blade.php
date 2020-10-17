@extends('layouts.app')
@section('title','Listado De Personas')
@section('content')
@if(Session::has('create'))
    <script>
        setTimeout(function(){
                function_swal_confirm('{{Session::get('create')}}', 'creada')
        }, 500);
    </script>
@elseif(Session::has('update'))
    <script>
        setTimeout(function(){
            function_swal_confirm('{{Session::get('update')}}', 'editada')
        }, 500);
    </script>
@endif

<div class="container">
    <div class="row col-sm-8 col-sm-offset-2 align-left ml-3 mt-3">
        <button onclick="window.location='{{route('calculadora.create')}}'" type="button" class="btn btn-info"><span class="fa fa-plus"></span> Nueva</button>
        <button onclick="window.location='{{route('home')}}'" type="button" class="btn btn-warning ml-auto">Salir</button>
    </div>

    <style>
        .ddtf-processed th.option-item > select{
            display:none;
        }
        .ddtf-processed th.option-item > div{
            display:block !important;
        }
    </style>

    <div class="card-body table-responsive">
        <table id="table_calculadora" class="table table-hover card-text" style="text-align: center;">
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

@endsection


@section('scripts')
<script type="text/javascript">

    // {{-- Filtro select en table --}}
        $('#table_calculadora').ddTableFilter();

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
            swal("Informacion almacenada", "La persona de "+text+" han sido "+type+" correctamente", "success");
        }
    </script>
@endsection