//Todos los elementos de la fecha actual
var fecha = new Date();
var dia = fecha.getDate();
var mes = fecha.getMonth() + 1;
var year = fecha.getFullYear();
var horaActual = fecha.getHours();
var minutosActual = fecha.getMinutes();

//Fecha actual para validator
var fechaActual = mes + '/' + dia + '/' + year + ' ' + horaActual;

//Fecha actual para condicional
//var diaActual = '0' + mesActual + '/' + '0' + diaActual + '/' + year;

//Valor de la fecha para condicional//
var fechaReserva = document.paymentForm.fecha.value;

//Campo de horario actual
document.getElementById("horarioActual").innerHTML = fechaActual + 'hrs' ;

horasInt = fecha.getHours()*10000; //Debugging
console.log(horasInt + 12); //Debugging

console.log(horaActual); //Debugging

//Calculando el día siguiente

//Aqui calculamos el día de mañana
//86400000 es un día en milisegundos, que es la unidad del objeto Date()
var manana = new Date().getTime() + 86400000;
var diaManana = new Date(manana); //Lo equivalente al fecha de arriba
var mananaDia = diaManana.getDate();

//Fecha actual para condicional
if(mes < 10 && dia < 10){
    var diaActual = '0' + mes + '/' + '0' + dia + '/' + year;
    var diaManana = '0' + mes + '/' + '0' + mananaDia + '/' + year;
}else if (dia >= 10 && mes < 10){
    var diaActual = '0' + mes + '/' + dia + '/' + year;
    var diaManana = '0' + mes + '/' + mananaDia + '/' + year;
}else if(dia < 10 && mes >= 10){
    var diaActual = mes + '/' + '0' + dia + '/' + year;
    var diaManana = mes + '/' + '0' + mananaDia + '/' + year;
}
else{
    var diaActual = mes + '/' + dia + '/' + year;
    var diaManana = mes + '/' + mananaDia + '/' + year;
}

console.log('hoy = ' + diaActual);
console.log('mañana = ' + diaManana);

