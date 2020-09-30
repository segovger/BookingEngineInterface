//Horario con 24h de diferencia

//Datos de horario retrieved de fecha.js


document.getElementById('horarioRecordatorio').style.display = "none";
document.getElementById('horarioActual').style.display = "none";

var op = document.getElementById("horario").getElementsByTagName("option");
var difHra = horaActual + 12;
var difHraSig = (horaActual + 12) - 24;

//Validacion Día y Hora (Tiene que ser mayor a 24hrs)
if (fechaReserva == diaActual){
  document.getElementById('horarioRecordatorio').style.display = "block";
  document.getElementById('horarioActual').style.display = "block";
  //Modal Msg decir que en caso de urgencia contacten a Mariel
  document.getElementById('modalHorario').style.display = "block";
} else if(fechaReserva == diaManana){
    //Disable las horas menor a la hra actual
    for (i = 0; i < horaActual + 1; i++) {
      op[i].disabled = true;
    }
}



//Horairo con más de 12h de diferencia:

//Datos de horario retrieved de fecha.js

/*

document.getElementById('horarioRecordatorio').style.display = "none";
document.getElementById('horarioActual').style.display = "none";

var op = document.getElementById("horario").getElementsByTagName("option");
var difHra = horaActual + 12;
var difHraSig = (horaActual + 12) - 24;


//Validacion Día y Hora (Tiene que ser mayor a 12hrs)
if (fechaReserva == diaActual && horaActual >= 12){
  document.getElementById('horarioRecordatorio').style.display = "block";
  document.getElementById('horarioActual').style.display = "block";
  //Modal Msg
  document.getElementById('modalHorario').style.display = "block";
}else if(fechaReserva == diaActual && horaActual < 12){
  document.getElementById('horarioRecordatorio').style.display = "block";
  document.getElementById('horarioActual').style.display = "block";
  h = horaActual;
  for (; h < difHra; h++) {
       op[h].disabled = true;
  }

  i = 0;
  for(; i < horaActual; i++){
      op[i].disabled = true;
  }
}
else{
  console.log("Sin Modal");
}

var horaDropdown = document.getElementById('horario');
var horaSeleccionada = horaDropdown.options[horaDropdown.selectedIndex].value;

console.log('Dif hra día siguiente: ' + difHraSig);


  if(fechaReserva == diaManana && horaActual >= 12){
    document.getElementById('horarioRecordatorio').style.display = "block";
    document.getElementById('horarioActual').style.display = "block";
    for (i = 0; i < difHraSig + 1; i++) {
      op[i].disabled = true;
    }
  }else{
    console.log('Más de 12 hrs de anticipación');
  }

  */