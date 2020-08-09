//Datos de horario retrieved de fecha.js

  document.getElementById('horarioRecordatorio').style.display = "none";
  document.getElementById('horarioActual').style.display = "none";
  
  //Validacion Día y Hora (Tiene que ser mayor a 12hrs)
  if (fechaReserva == diaActual && horaActual > 12){
    document.getElementById('horarioRecordatorio').style.display = "block";
    document.getElementById('horarioActual').style.display = "block";
    console.log('mayor'); //Debugging [Borrar después]
    console.log("dia y hora. Debe salir el modal"); //Debugging [Borrar después]
    //Modal Msg
    document.querySelector('.modal').style.display = "block";
}else if(fechaReserva == diaActual && horaActual <= 12){
  console.log('menor'); //Debugging [Borrar después]
    document.getElementById('horarioRecordatorio').style.display = "block";
    document.getElementById('horarioActual').style.display = "block";
}
else{
    console.log("Sin Modal");
    //document.getElementById('horarioRecordatorio').style.display = "none";
    //document.getElementById('horarioActual').style.display = "none";
}
  
  //Si parte de Cancun y su orgen es el aeropuerto, pregunta no. de vuelo y aerolinea. Si no, no.
function origenCancun(){

  if(document.getElementById('origenEnAeropuerto').checked) { 
      document.getElementById('direccionOrigen').style.display = "none";
      document.getElementById('datosVuelo').style.display = "block";
      document.paymentForm.direccion_origen.value = "Aeropuerto Cancun";
      //Validar que los datos estén ingresados en la sig. funcion
      //validAeropuerto();
    
  }else if(document.getElementById('origenNoAeropuerto').checked){
      document.getElementById('datosVuelo').style.display = "none";
      document.getElementById('direccionOrigen').style.display = "block";
      document.paymentForm.direccion_origen.value = ""
      document.paymentForm.num_vuelo.value = ""
      document.paymentForm.aerolinea.value = ""
      }else{
          return false;
      }
  }
    
  //Validar que los datos estén ingresados
  function validAeropuerto(){
    
    //Numero de vuelo
    if (document.paymentForm.num_vuelo.value == ""){
    document.paymentForm.num_vuelo.focus();
    document.getElementById('numVueloValidator').innerHTML ="Confirmar número de vuelo antes"
    event.preventDefault()
    return false;
    }
    
    //Aerolinea
    if (document.paymentForm.aerolinea.value == ""){
    document.paymentForm.aerolinea.focus();
    document.getElementById('aerolineaValidator').innerHTML ="Confirmar nombre de aerolinea antes"
    event.preventDefault()
    return false;       
    }
  }

function validateForm() {

    //Validacion origen
    if (document.paymentForm.origen.value == "") {
    document.paymentForm.origen.focus();
    document.getElementById('origenValidator').innerHTML ="Punto de origen"
    event.preventDefault()
    return false;
    }

    //Validacion destino
    if (document.paymentForm.destino.value == "") {
    document.paymentForm.destino.focus();
    document.getElementById('destinoValidator').innerHTML ="Punto de destino"
    event.preventDefault()
    return false;
    }

    //Validacion fecha
    if (document.paymentForm.fecha.value == "") {
    document.paymentForm.fecha.focus();
    document.getElementById('fechaValidator').innerHTML ="Fecha de viaje requerida"
    event.preventDefault()
    return false;
    }

    //Si traslado se hace el mismo día pero todavía entra la posibilidad de hacerlo 12h antes
    var horaDropdown = document.getElementById('horario');
    console.log(horaDropdown); //Debugging [Borrar después]

    var horaTraslado = horaDropdown.options[horaDropdown.selectedIndex].value;
    console.log(horaTraslado); //Debugging [Borrar después]

    if(fechaReserva == diaActual && horaActual < 12){
      var horaSeleccionada = horaTraslado - horaActual;
        if(horaSeleccionada >= 12){
          alert("Horario correcto"); //Debugging [Borrar después] (Chance agregar modal msg)
        }else{
          alert("Horario no aceptable. Debe sercon 12 0 más hrs de anticipación"); //Debugging [Borrar después] (Chance agregar modal msg)
          console.log(horaTraslado);
          event.preventDefault()
        }
      return false;
    }

    //Si el traslado se hace al día siguiente pero hay una posibilidad de overlap 12 hrs
    //Aqui calculamos el día de mañana
    //86400000 es un día en milisegundos, que es la unidad del objeto Date()
    var manana = new Date().getTime() + 86400000;
    var tomorrow = new Date(manana);
    var diaManana = '0' + mesActual + '/' + '0' + tomorrow.getDate() + '/' + year;
    console.log('mañana = ' + manana); //Debugging [Borrar después]
    console.log('hoy = ' + diaActual); //Debugging [Borrar después]

    if(fechaReserva == diaManana && horaActual > 12){
      var horaSeleccionada = horaTraslado - horaActual;
        if(horaSeleccionada <= 12){
          alert("Horario correcto"); //Debugging [Borrar después] (Chance agregar modal msg)
        }else{
          alert("Horario no aceptable. Debe sercon 12 0 más hrs de anticipación"); //Debugging [Borrar después] (Chance agregar modal msg)
          document.getElementById('horarioRecordatorio').style.display = "block";
          document.getElementById('horarioActual').style.display = "block";
          event.preventDefault()
        }
      return false;
    }


    //Validacion hora
    if (document.paymentForm.horario.value == "Selecciona el horario"){
    document.paymentForm.horario.focus();
    document.getElementById('horarioValidator').innerHTML ="Horario requerido"
    event.preventDefault()
    return false;
    }

    //Si el destino es Cancun, esto valida que el radio no esté vacío
    
    if (document.paymentForm.origen.value == "Cancun") {
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
          alert("[Debugging]Selecciona una opcion: Radio 1"); //Debugging [Borrar después] (Chance agregar modal msg)
          event.preventDefault()
          document.getElementById('radio1Validator').innerHTML ="Especificar punto de partida"
          return false;
      }
    }

    //Número de Pasajeros
    if (document.paymentForm.num_pasajeros.value == ""){
    document.paymentForm.num_pasajeros.focus();
    event.preventDefault()
    return false;
    }

    //Nombres de Pasajeros
    if (document.paymentForm.nombre_pasajeros.value == ""){
    document.paymentForm.nombre_pasajeros.focus();
    document.getElementById('nombresValidator').innerHTML ="Nombres de pasajeros"
    event.preventDefault()
    return false;
    }

    //Dirección exacta de origen
    if (document.paymentForm.direccion_origen.value == ""){
    document.paymentForm.direccion_origen.focus();
    document.getElementById('dirOrigenValidator').innerHTML ="Dirección de origen"
    event.preventDefault()
    return false;
    }

    //Dirección exacta de destino
    if (document.paymentForm.direccion_destino.value == ""){
    document.paymentForm.direccion_destino.focus();
    document.getElementById('dirDestinoValidator').innerHTML ="Dirección de destino"
    event.preventDefault()
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
      alert("[Debugging]Selecciona una opcion: Radio 2"); //Debugging [Borrar después] (Chance agregar modal msg)
      event.preventDefault()
      document.getElementById('radio2Validator').innerHTML ="Seleccionar una opcion"
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
      alert("[Debugging]Selecciona una opcion: Radio 3"); //Debugging [Borrar después] (Chance agregar modal msg)
      event.preventDefault()
      document.getElementById('radio3Validator').innerHTML ="Especificar punto de partida"
      return false;
    }
      
    //Validacion nombre
    if (document.paymentForm.first_name.value == "") {
    document.paymentForm.first_name.focus();
    document.getElementById('nameValidator').innerHTML ="Nombre requerido"
    event.preventDefault()
    return false;
    }

    //Validacion apellido
    if (document.paymentForm.last_name.value == "") {
    document.paymentForm.last_name.focus();
    document.getElementById('lastnameValidator').innerHTML ="Apellido requerido"
    event.preventDefault()
    return false;
    } 

    //Validacion email
    if (document.paymentForm.client_email.value == "") {
    document.paymentForm.client_email.focus();
    document.getElementById('emailValidator').innerHTML ="Email requerido"
    event.preventDefault()
    return false;
    }

    //Validacion phone
   var numTel = /^\d{10}$/;
   if(document.paymentForm.client_phone.value.match(numTel)){
     alert("Numero correcto");
     return true;
     }
     else
     {
     alert("Insertar numero de telefono");
     document.getElementById('phoneValidator').innerHTML ="Telefono requerido"
     event.preventDefault()
     return false;
   }

}

  
  function sillasBebe(){
  
    if(document.getElementById('conAsientoBebe').checked) { 
        document.getElementById('numSillasBebe').style.display = "block";
        document.getElementById('asientosValidator').innerHTML ="Indique el numero de asientos";
        document.paymentForm.asientos_bebe.value = 1;
        return false;
    }
  
    if (document.getElementById('sinAsientoBebe').checked){
        document.getElementById('numSillasBebe').style.display = "none";
        document.paymentForm.asientos_bebe.value = 0;
        return false;
    }
  
}
  
  