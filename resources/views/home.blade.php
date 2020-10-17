@extends('layouts.app')

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

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: gray;">Bienvenido {{ Auth::user()->name }} </h4>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container d-xl-flex justify-content-xl-center mt-5">
        <h3>BMI & BMR</h3>
            <div class="row">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-12 text-center d-xl-flex justify-content-xl-center" style="text-align: center;">
                <div class="btn-group" role="group">
                    <a class="btn btn-primary m-5" href="{{route('calculadora.index')}}" type="button">Consultar</a>
                    <a class="btn btn-primary m-5" href="{{route('calculadora.create')}}" type="button">Registro</a>
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
