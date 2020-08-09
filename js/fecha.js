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

horasInt = fecha.getHours()*10000; //Debugging
console.log(horasInt + 12); //Debugging

console.log(horaActual); //Debugging
