

var theButton = document.getElementById('checkoutBtn');

theButton.addEventListener('click', function(){
  validateForm();
});


//Si parte de Cancun y su orgen es el aeropuerto, pregunta no. de vuelo y aerolinea. Si no, no.
function origenCancun(){

if(document.getElementById('origenEnAeropuerto').checked) { 
    document.getElementById('direccionOrigen').style.display = "none";
    document.getElementById('datosVuelo').style.display = "block";
    document.paymentForm.direccion_origen.value = "Aeropuerto Cancún";
    //Validar que los datos estén ingresados en la sig. funcion
    validAeropuerto();
  
}else if(document.getElementById('origenNoAeropuerto').checked){
    document.getElementById('datosVuelo').style.display = "none";
    document.getElementById('direccionOrigen').style.display = "block";
    document.paymentForm.direccion_origen.value = "";
    document.paymentForm.num_vuelo.value = "";
    document.paymentForm.aerolinea.value = "";
    }else{
        return false;
    }
}
  
//Validar que los datos estén ingresados
function validAeropuerto(){
  
  //Numero de vuelo
  if (document.paymentForm.num_vuelo.value == ""){
  document.paymentForm.num_vuelo.focus();
  document.getElementById('numVueloValidator').classList.remove("validation-notification");
  event.preventDefault()
  return false;
  }
  
  //Aerolinea
  if (document.paymentForm.aerolinea.value == ""){
  document.paymentForm.aerolinea.focus();
  document.getElementById('aerolineaValidator').classList.remove("validation-notification");
  event.preventDefault()
  return false;       
  }
}

function validateForm() {

  //Validacion origen
  if (document.paymentForm.origen.value == "") {
  document.paymentForm.origen.focus();
  document.getElementById('origenValidator').classList.remove("validation-notification");
  event.preventDefault();
  return false;
  }

  //Validacion destino
  if (document.paymentForm.destino.value == "") {
  document.paymentForm.destino.focus();
  document.getElementById('destinoValidator').classList.remove("validation-notification");
  event.preventDefault();
  return false;
  }

  //Validacion fecha
  if (document.paymentForm.fecha.value == "") {
  document.paymentForm.fecha.focus();
  document.getElementById('fechaValidator').classList.remove("validation-notification");
  event.preventDefault();
  return false;
  }


  //Validacion hora
  if (document.paymentForm.horario.value == "0"){
  document.paymentForm.horario.focus();
  document.getElementById('horarioValidator').classList.remove("validation-notification");
  //Modal Msg
  //document.getElementById('modalHoraViaje').style.display = "block";
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Si el destino es Cancun, esto valida que el radio no esté vacío
  
  if (document.paymentForm.origen.value == "Cancún") {
    //Radio 1
    var radio1 = false;
    var llegadaAirport = document.paymentForm.origen_aeropuerto;

    for(var i=0;i<llegadaAirport.length;i++){
      if(llegadaAirport[i].checked){
        radio1 = true;
        break;
      }
    }

    if(radio1){
      console.log("[Debugging]Validacion Radio 1 completa");
      //document.paymentForm.direccion_origen.value = "Aeropuerto Cancun"
      }else{
        //Modal Msg
        //document.getElementById('modalRadio1').style.display = "block";
        event.preventDefault()
        document.getElementById('radio1Validator').classList.remove("validation-notification");
        //Re-activar botón
        theButton.disabled = false;
    
        return false;
    }
  }

  //Número de Pasajeros
  if (document.paymentForm.num_pasajeros.value == ""){
  document.paymentForm.num_pasajeros.focus();
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Nombres de Pasajeros
  if (document.paymentForm.nombre_pasajeros.value == ""){
  document.paymentForm.nombre_pasajeros.focus();
  document.getElementById('nombresValidator').classList.remove("validation-notification");;
  //Modal Msg
  //document.getElementById('modalNombrePasajeros').style.display = "block";
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Dirección exacta de origen
  if (document.paymentForm.direccion_origen.value == ""){
  document.paymentForm.direccion_origen.focus();
  document.getElementById('dirOrigenValidator').classList.remove("validation-notification");
  //Modal Msg
  //document.getElementById('modalDireccionOrigen').style.display = "block";
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Dirección exacta de destino
  if (document.paymentForm.direccion_destino.value == ""){
  document.paymentForm.direccion_destino.focus();
  document.getElementById('dirDestinoValidator').classList.remove("validation-notification");
  //Modal Msg
  //document.getElementById('modalDireccionDestino').style.display = "block";
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Validación Radio 2
  var radio2 = false;
  var asientoBebe = document.paymentForm.silla_bebe;

  for(var i=0;i<asientoBebe.length;i++){
    if(asientoBebe[i].checked){
      radio2 = true;
      break;
    }
  }

  if(radio2){
    console.log("[Debugging]Validacion Radio 2 completa");
  }else{
    //Modal Msg
    //document.getElementById('modalRadio2').style.display = "block";
    event.preventDefault()
    document.getElementById('radio2Validator').classList.remove("validation-notification");
    //Re-activar botón
    theButton.disabled = false;

    return false;
  }

  //Validación Radio 3
  var radio3 = false;
  var paradadIntermedias = document.paymentForm.paradas_intermedias;

  for(var i=0;i<paradadIntermedias.length;i++){
    if(paradadIntermedias[i].checked){
      radio3 = true;
        break;
      }
    }

  if(radio3){
    console.log("[Debugging]Validacion Radio 3 completa");
  }else{
    //Modal Msg
    //document.getElementById('modalRadio3').style.display = "block";
    event.preventDefault()
    document.getElementById('radio3Validator').classList.remove("validation-notification");
    //Re-activar botón
    theButton.disabled = false;

    return false;
  }
    
  //Validacion nombre
  if (document.paymentForm.first_name.value == "") {
  document.paymentForm.first_name.focus();
  document.getElementById('nameValidator').classList.remove("validation-notification");
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Validacion apellido
  if (document.paymentForm.last_name.value == "") {
  document.paymentForm.last_name.focus();
  document.getElementById('lastnameValidator').classList.remove("validation-notification");
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  } 

  //Validacion email
  if (document.paymentForm.client_email.value == "") {
  document.paymentForm.client_email.focus();
  document.getElementById('emailValidator').classList.remove("validation-notification");
  event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
  return false;
  }

  //Validacion phone
 var numTel = /^\d{10}$/;
 if(document.paymentForm.client_phone.value.match(numTel)){
   return true;
   }
   else
   {
   document.getElementById('phoneValidator').classList.remove("validation-notification");
   event.preventDefault();
  //Re-activar botón
  theButton.disabled = false;
   return false;
 }

}


function sillasBebe(){

  if(document.getElementById('conAsientoBebe').checked) { 
      document.getElementById('numSillasBebe').style.display = "block";
      document.getElementById('asientosValidator').classList.remove("validation-notification");
      document.paymentForm.asientos_bebe.value = 1;
      return false;
  }

  if (document.getElementById('sinAsientoBebe').checked){
      document.getElementById('numSillasBebe').classList.remove("validation-notification");
      document.paymentForm.asientos_bebe.value = 0;
      return false;
  }
}


//Form Btn
/*
var theButton = document.getElementById('checkoutBtn');

//Turn Btn off 

var theButton = document.getElementById('checkoutBtn');
/*
theButton.addEventListener('click', function(){
  validateForm();
});
*/












