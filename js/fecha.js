//Todos los elementos de la fecha actual
var fecha = new Date();
var diaActual = fecha.getDate();
var mesActual = fecha.getMonth() + 1;
var year = fecha.getFullYear();
var horaActual = fecha.getHours();
var minutosActual = fecha.getMinutes();

//Fecha actual para validator
var fechaActual = mesActual + '/' + diaActual + '/' + year + ' ' + horaActual + ':' + minutosActual;

//Fecha actual para condicional
var diaActual = '0' + mesActual + '/' + '0' + diaActual + '/' + year;

//Valor de la fecha para condicional
var fechaReserva = document.paymentForm.fecha.value;

//Campo de horario actual
document.getElementById("horarioActual").innerHTML = fechaActual + 'hrs' ;

horasInt = fecha.getHours()*10000;
console.log(horasInt + 12);

console.log(horaActual);

var horaViaje = document.getElementById('horario');

if(fechaReserva == diaActual){
    console.log("Mismo día y fecha");
  }else{
    console.log("diferentes días");
}

if (horaActual >= 12){
    console.log("Sale el modal");
    //alert("Sale el Modal")
}else{
    console.log("No sale el modal pero las horas están condicionadas");
}


if (fechaReserva > diaActual){
    document.getElementById('horarioRecordatorio').style.display = "none";
    document.getElementById('horarioActual').style.display = "none";
}else{
    document.getElementById('horarioRecordatorio').style.display = "block";
    document.getElementById('horarioActual').style.display = "block";
    console.log("Mas de las 12");
}