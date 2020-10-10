@extends('layouts.app')
@section('title','Registrar BMI y BMR')
@section('content')

@if(Session::has('error'))
<script>
    setTimeout(function(){
        swal("¡Algo ha salido mal!", "Ha habido un error al procesar la peticion, vuelte a intentarlo", "error");
    }, 500);
</script>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form action="{{route('calculadora.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
              @csrf
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Juan">
                </div>
                @if ($errors->has('nombre'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                </span>
                @endif

                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" class="form-control" name="apellido" placeholder="Peras Lopez">
                </div>
                @if ($errors->has('apellidos'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('apellidos') }}</strong>
                </span>
                @endif

                <div class="form-group">
                  <label for="fecha_nacimiento">Fecha nacimiento</label>
                  <input type="date" class="form-control" name="fecha_nacimiento">
                </div>
                @if ($errors->has('fecha_nacimiento'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                </span>
                @endif

                <div class="form-group">
                  <label for="genero">Genero</label>
                  <select class="form-control" name="genero">
                    <option >Seleccione una opci&oacute;n</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                  </select>
                </div>
                @if ($errors->has('genero'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('genero') }}</strong>
                </span>
                @endif

                <div class="form-group">
                  <label for="peso">Peso (Kiligramos)</label>
                  <input type="number" class="form-control" name="peso">
                </div>
                @if ($errors->has('peso'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('peso') }}</strong>
                </span>
                @endif

                <div class="form-group">
                  <label for="estatura">Altura (Centimetros)</label>
                  <input type="number" class="form-control" name="estatura">
                </div>
                @if ($errors->has('estatura'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('estatura') }}</strong>
                </span>
                @endif

                <div class="form-group">
                  <label for="nivel_actividad">Nivel de actividad</label>
                  <select class="form-control" name="nivel_actividad">
                    <option >Seleccione una opci&oacute;n</option>
                    <option value="Sedentario">Sedentario</option>
                    <option value="Ligeramente activo">Ligeramente activo</option>
                    <option value="Moderadamente activo">Moderadamente activo</option>
                    <option value="Muy activo">Muy activo</option>
                    <option value="Extremadamente activo">Extremadamente activo</option>
                  </select>
                </div>
                @if ($errors->has('nivel_actividad'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nivel_actividad') }}</strong>
                </span>
                @endif

                <div class="form-group row">
                    <div class="col-sm-12 offset-sm-5">
                        <button type="button"  onclick="window.location='{{route('home')}}'" class="btn btn-secondary">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>

              </form>

            </div>
        </div>
    </div>
</div>
@endsection