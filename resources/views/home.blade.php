@extends('layouts.app')
@section('title','Inicio')
@section('location','Inicio')
@section('content')

@if(Session::has('create'))
    <script>
        setTimeout(function(){
                function_swal_confirm('{{Session::get('create')}}', 'creados')
        }, 500);
    </script>
@elseif(Session::has('update'))
    <script>
        setTimeout(function(){
            function_swal_confirm('{{Session::get('update')}}', 'editados')
        }, 500);
    </script>
@endif
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Uso</h6>
                </div>
                <div class="card-body">
                <p>Para acceder a la calculadora haga click en el panel izquierdo o por medio de estos botones</p>
                    <div class="col-md-12 text-center d-xl-flex justify-content-xl-center" style="text-align: center;">
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary m-5" href="{{route('calculadora.index')}}" type="button">Consultar</a>
                            <a class="btn btn-primary m-5" href="{{route('calculadora.create')}}" type="button">Registro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

              

<script>
    function function_swal_confirm(text, type) {
        swal("Informacion almacenada", "Los datos de "+text+" han sido "+type+" correctamente", "success");
    }
</script>
@endsection
