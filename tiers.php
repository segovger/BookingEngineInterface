<?php 

include 'retrieve.php';

foreach($results as $result){
  $tier = $result->tier; 
  $precioTotal = $result->precio; 
}

if ($tier == "1"){
  $precioReserva = 20000;
}else if ($tier == "2"){
  $precioReserva = 30000;
} else if ($tier == "3"){
  $precioReserva =  50000;
}else if ($tier == "4"){
  $precioReserva = 80000;
}

//Precio de la reserva a 2 decimales
$precioReservaDec = $precioReserva/100;

?>
