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
<script src="/js/funciones.js"></script>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          
          <form action="{{route('calculadora.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan">
              </div>

              <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Peras Lopez">
              </div>

              <div class="form-group">
                <label for="fecha_nacimiento">Fecha nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
              </div>
              
              <div class="form-group">
                <label for="genero">Genero</label>
                <select class="form-control" name="genero" id="genero">
                  <option disabled>Seleccione una opci&oacute;n</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>

              <div class="form-group">
                <label for="peso">Peso (Kiligramos)</label>
                <input type="number" class="form-control" id="peso" name="peso">
              </div>

              <div class="form-group">
                <label for="estatura">Altura (Centimetros)</label>
                <input type="number" class="form-control" id="estatura" name="estatura">
              </div>

              <div class="form-group">
                <label for="nivel_actividad">Nivel de actividad</label>
                <select class="form-control disable" id="nivel_actividad" name="nivel_actividad">
                  <option disabled>Seleccione una opci&oacute;n</option>
                  <option value="Sedentario">Sedentario</option>
                  <option value="Ligeramente activo">Ligeramente activo</option>
                  <option value="Moderadamente activo">Moderadamente activo</option>
                  <option value="Muy activo">Muy activo</option>
                  <option value="Extremadamente activo">Extremadamente activo</option>
                </select>
              </div>
              {{-- Activar Modal --}}
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#informacion_niveles_actividad">
                <i class="fas fa-question-circle"></i>
                Informacion sobre niveles de actividad
              </button>
              

              
              <hr>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="bmi" >BMI</label>
                  <input type="text" class="form-control mt-4" id="bmi" readonly>
                </div>
                <div class="col-md-6">
                  <label for="bmi">Categoria</label>
                  <br>
                  <img id="bmi_categoria_svg">
                  <input type="text" class="form-control" id="bmi_categoria" readonly>
                </div>
                
                <hr>
                <div class="col-md-6 mt-5">
                  <label for="bmr">BMR</label>
                  <input type="text" class="form-control" id="bmr" readonly>
                </div>
                <div class="col-md-6 mt-5">
                  <label for="factor_actividad">Factor de actividad</label>
                  <input type="text" class="form-control" id="factor_actividad" readonly>
                </div>
              </div>            

              <script>
                $('#peso').change(function(){
                  bmi_categoria();
                  bmr_nivel_actividad();
                });
                $('#estatura').change(function(){
                  bmi_categoria();
                  bmr_nivel_actividad();
                });
                $('#genero').change(function(){
                  bmi_categoria();
                  bmr_nivel_actividad();
                });
                $('#nivel_actividad').change(function(){
                  bmi_categoria();
                  bmr_nivel_actividad();
                });
              </script>
              
              <div class="form-group row">
                  <div class="col-sm-12 offset-sm-5">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_salir_sin_guardar">
                        Salir
                      </button>

                      <button type="submit" class="btn btn-primary">
                        Guardar
                      </button>
                  </div>
              </div>

            </form>

          </div>
          
          {{-- Modal informacion --}}
          <div class="modal fade" id="informacion_niveles_actividad" tabindex="-1" role="dialog" aria-labelledby="informacion_niveles_actividad" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="informacion_niveles_actividad">Informacion sobre niveles de actividad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="/img/descripcion_niveles_actividad.png" class="img-fluid">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="modal_salir_sin_guardar" tabindex="-1" role="dialog" aria-labelledby="modal_salir_sin_guardar" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="">¿Seguro que quiere salir sin guardar?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Todos los cambios seran borrados
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Continuar editando</button>
                  <button type="button" class="btn btn-danger" onclick="window.location='{{route('home')}}'">Salir</button>
                </div>
              </div>
            </div>
          </div>

      </div>
  </div>
@endsection