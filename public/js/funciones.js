var bmi=0;
var bmi_cat='';

function bmi_categoria() {
  var peso = $( "#peso").val();
  var estatura = $( "#estatura").val();
  bmi = ((peso / (Math.pow(estatura,2))) *10000).toFixed(3);
  if(bmi <= 18.5){
    bmi_cat = 'PESO BAJO';
    cambiarGeneroIcono('peso_bajo');
      }else if(bmi<=24.9){
          bmi_cat = 'SALUDABLE';
          cambiarGeneroIcono('saludable');
          }else if(bmi<=29.9){
              bmi_cat = 'SOBRE PESO';
              cambiarGeneroIcono('sobre_peso');
              }else{
                  bmi_cat = 'OBESO';
                  cambiarGeneroIcono('obeso');
              }

  $('#bmi').val(bmi);
  $('#bmi_categoria').val(bmi_cat);
}

function cambiarGeneroIcono(categoria_bmi) {
  var genero = $('#genero').val();
  $("#bmi_categoria_svg").attr("src","http://sysbmibmr.herokuapp.com/svg/"+genero+"_"+categoria_bmi+".svg");
  $("#bmi_categoria_svg").css({"with":"50px","height":"50px"});
  $("#bmi_categoria_svg").addClass(" img-responsive mx-auto d-block");
}

function calcularEdad(dateString) { 
  var today = new Date();
  var birthDate = new Date(dateString);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
  }
  return age;
}

function bmr_nivel_actividad() {
  var genero = $('#genero').val();
  var peso = $( "#peso").val();
  var estatura = $( "#estatura").val();
  var fecha_nacimiento = $('#fecha_nacimiento').val();
  var nivel_actividad = $('#nivel_actividad').val();
  console.log(nivel_actividad);
  var bmr = 0;
  
  if(genero == 'Masculino'){
      bmr =  66 + (13.7 * peso ) + (5 * estatura ) - (6.8 * calcularEdad(fecha_nacimiento));
    }else if(genero == 'Femenino'){
      bmr =  655 + (9.6 * peso ) + (1.8 * estatura ) - (4.7 * calcularEdad(fecha_nacimiento));
  }

  
    if(nivel_actividad == 'Sedentario'){
        factor_actividad = "BMR x 1.2";
        }else if(nivel_actividad == 'Ligeramente activo') {
                  factor_actividad="BMR x 1.375";                    
              }else if(nivel_actividad == 'Moderadamente activo') {
                        factor_actividad="BMR x 1.55";                    
                    }else if (nivel_actividad=='Muy activo') {
                              factor_actividad = "BMR x 1.725";                    
                          }else if(nivel_actividad=='Extremadamente activo') {
                                factor_actividad = "BMR x 1.9";                    
            }

  $('#bmr').val(bmr);
  $('#factor_actividad').val(factor_actividad);
}



function salir_sin_guardar() {
  if( document.getElementById('nombre').value != '' &&
      document.getElementById('apellido').value != '' &&
      document.getElementById('fecha_nacimiento').value != '' &&
      document.getElementById('genero').value != '' &&
      document.getElementById('peso').value != '' &&
      document.getElementById('estatura').value != '' &&
      document.getElementById('nivel_actividad').value != '') {
      $('#modal_salir_sin_guardar').modal('show');      
  }else{
    window.location.href = history.back();
  }
}
