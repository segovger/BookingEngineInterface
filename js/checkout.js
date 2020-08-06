


//Cachar el valor del select de horario en jQuery
$(document).ready(function(){
  $("select.horario").change(function(){
    var selectedTime = $(this).children("option:selected").val()
    console.log(selectedTime);
    //Convertir el .val() a Int
    var horaTotal = (horaActual + selectedTime);
    console.log(horaTotal);
    if(horaActual + selectedTime < 24){
      alert("Está bien")
    }else{
      alert("Its too late (To apologize)");
    }
  });
});


if (document.paymentForm.origen.value == "Cancun") {
    document.getElementById('origenCancun').style.display = "block"
  }else{
    document.getElementById('origenCancun').style.display = "none"
  }

function origenCancun(){
  if(document.getElementById('origenEnAeropuerto').checked) { 
      document.getElementById('direccionOrigen').style.display = "none";
      document.getElementById('datosVuelo').style.display = "block";
    }else if(document.getElementById('origenNoAeropuerto').checked){
      document.getElementById('datosVuelo').style.display = "none";
      document.getElementById('direccionOrigen').style.display = "block";
    }else{
      return false;
    }
 }

function sillasBebe(){
  if(document.getElementById('conAsientoBebe').checked) { 
      document.getElementById('numSillasBebe').style.display = "block";
    }else{
      document.getElementById('numSillasBebe').style.display = "none";
      return false;
  }
}