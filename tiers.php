<?php 

$tier = "tier1";

$precioTotal = 2000;
$precioTotalXL = 3000;

    if ($tier == "tier1"){
      $precioReserva = 20000;
    }else if ($tier == "tier2"){
      $precioReserva = 30000;
    } else if ($tier == "tier3"){
      $precioReserva =  50000;
    }else{
      $precioReserva = 80000;
    }

  
//Precio de la reserva a 2 decimales
$precioReservaDec = $precioReserva/100;

?>
