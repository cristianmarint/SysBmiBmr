@extends('layouts.app')
@section('title','Visualizar Persona')
@section('content')
<div class="row col-sm-8 col-sm-offset-2 align-left ml-3 mt-3">
    <button onclick="window.location='{{route('home')}}'" type="button" class="btn btn-warning ml-auto">Salir</button>
</div>
<div class="card-body">
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Nombre</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" value="{{ $persona->nombre }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Apellido</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->apellido }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Fecha de nacimiento</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->fecha_nacimiento }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Genero</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->genero }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Peso</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->peso }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Estatura</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->estatura }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Nivel de actividad</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->nivel_actividad }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Calorias diarias</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->calorias_diarias }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">BMI</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->bmi }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">Categoria masa corporal</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->bmi_categoria }}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-sm-3 ">BMR</label>
        <div class="col-sm-9">
            <input type="text" name="descripcion" class="form-control" value="{{ $persona->bmr }}" readonly>
        </div>
    </div>
</div>
@endsection