<?php 

//require_once('tiers.php');
include 'lang.php';
require_once('quickstart.php');


$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    require_once('vendor/autoload.php');
    require_once('transactions/transactionsDb/db.php');
    require_once('lib/pdo_db.php');
    require_once('transactions/transaction_models/Customer.php');
    require_once('transactions/transaction_models/Transaction.php');

//INGRESAR API
    \Stripe\Stripe::setApiKey('sk_test_3J1CbdPGPwD6vajiW7yaFCob00HXjqPbb5');


//Recoger variables de checkout.php

//Datos de cliente
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['client_email'];
$phonenum = $POST['client_phone'];
$token = $POST['stripeToken'];

//Datos de Pago
$costo_traslado = $POST['costo_traslado'];
$costo_reserva = $POST['costo_reserva'];
$pago_pendiente = $POST['pago_pendiente'];

$precioReservaSt = $costo_reserva * 100;

//Datos de Traslado
$origen_traslado = $POST['origen'];
$destino_traslado = $POST['destino'];
$fecha_traslado = $POST['fecha'];
$hora_traslado = $POST['horario'];
$num_pasajeros = $POST['num_pasajeros'];
$nombre_pasajeros = $POST['nombre_pasajeros'];
$direccion_origen = $POST['direccion_origen'];
$direccion_destino = $POST['direccion_destino'];
$asientos_bebe = $POST['asientos_bebe'];
$silla_bebe = $POST['silla_bebe'];
$paradas_intermedias = $POST['paradas_intermedias'];
$detalles_adicionales = $POST['detalles_adicionales'];

//Si punto de partida es Cancun
$origen_aeropuerto = $POST['origen_aeropuerto'];
$num_vuelo = $POST['num_vuelo'];
$aerolinea = $POST['aerolinea'];




//Generar un cliente en Stripe

$customer = \Stripe\Customer::create([
    "email" => $email,
    "source" => $token
]);


$charge = \Stripe\Charge::create([
    "amount" => $precioReservaSt, 
    "currency" => "mxn",
    "description" => "Booking Reservation",
    "customer" => $customer->id
]/*,[
    'idempotency_key' => 'Dn48Y90d2C62pTpVotsU'
]*/);



//Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'amount' => $charge->amount
];

//Instancias Customer
$customer = new Customer();


//Agregar Customer a DB //***** */
$customer->addCustomer($customerData); 





//Transaction Data
$transactionData = [
    'id' => $charge->customer,
    'nombre' => $first_name,
    'apellido' => $last_name,
    'email' => $email,
    'telefono' => $phonenum,
    'costo_traslado' => $costo_traslado,
    //Se hace referencia al costo_reserva ya que el amount está en formato de la API con dos ceros extra el costo_reserva ya está procesado por tiers.php y es el valor del input del checkout
    'costo_reserva' => $costo_reserva,
    'pago_efectivo' => $pago_pendiente,
    'origen' => $origen_traslado,
    'destino' => $destino_traslado,
    'fecha' => $fecha_traslado,
    'hora' => $hora_traslado,
    'num_pasajeros' => $num_pasajeros,
    'nombres_pasajeros' => $nombre_pasajeros,
    'asientos_bebe' => $asientos_bebe,
    'paradas' => $paradas_intermedias,
    'detalles_adicionales' => $detalles_adicionales
];

//Instancias Transaction
$transaction = new Transaction();


//Agregar Transaction a DB //***** */
$transaction->addTransaction($transactionData); 






///////Envio de Mail a cliente///////
use PHPMailer\PHPMailer\PHPMailer;

$subject = "Reserva de traslado";

$subject2 = "Nueva reserva de traslado";

$currentLang = $_SESSION['lang'];


if($currentLang == 'es'){
    $template_file = "emailTemplates/template.php";
}else if ($currentLang == 'en'){
    $template_file = "emailTemplates/templateeng.php";
}else if ($currentLang == 'fr'){
    $template_file = "emailTemplates/templatefr.php";
}else if ($currentLang == 'de'){
    $template_file = "emailTemplates/templatede.php";
}

$template_admin = "emailTemplates/template2.php";

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$mail = new PHPMailer();

//Mail template
if(file_exists($template_file))
    $body = file_get_contents($template_file); 
else
    die("Unable to locate the template file");

$body = str_replace('$name', $first_name, $body);
$body = str_replace('$lastname', $last_name, $body);
$body = str_replace('$precioReserva', $costo_reserva, $body);
$body = str_replace('$pagoPendiente', $pago_pendiente, $body);
$body = str_replace('$precioTraslado', $costo_traslado, $body);
$body = str_replace('$Destino', $destino_traslado, $body);
$body = str_replace('$Origen', $origen_traslado, $body);
$body = str_replace('$Fecha', $fecha_traslado, $body);
$body = str_replace('$Horario', $hora_traslado, $body);


$body = str_replace('$origen_aeropuerto', $origen_aeropuerto, $body);
$body = str_replace('$num_vuelo', $num_vuelo, $body);
$body = str_replace('$aerolinea', $aerolinea, $body);
$body = str_replace('$num_pasajeros', $num_pasajeros, $body);
$body = str_replace('$nombresPasajeros', $nombre_pasajeros, $body);
$body = str_replace('$origenExacto', $direccion_origen, $body);
$body = str_replace('$destinoExacto', $direccion_destino, $body);
$body = str_replace('$asientosBebe', $silla_bebe, $body);
$body = str_replace('$numAsientosBebe', $asientos_bebe, $body);
$body = str_replace('$paradas', $paradas_intermedias, $body);
$body = str_replace('$detallesAdicionales', $detalles_adicionales, $body);

        

//SMTP Settings
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->Username = "info@cancuntravelers.com";
$mail->Password = 'Marol1234';
$mail->Port = 25; //587
$mail->SMTPSecure = 'none'; //tls

//Email Settings
$mail->isHTML(true);
$mail->setFrom("info@cancuntravelers.com");
$mail->addAddress($email, $first_name);
$mail->Subject = $subject;
$mail->Body = $body;

if ($mail->send()) {
    $status = "success";
    $response = "Email is sent!";
    } else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

///////Fin de Mail a cliente///////


///////Envio de Mail a admin///////

$mail = new PHPMailer();


//Mail template
if(file_exists($template_admin))
    $body2 = file_get_contents($template_admin); 
else
    die("Unable to locate the template file");
    
$body2 = str_replace('$name', $first_name, $body2);
$body2 = str_replace('$lastname', $last_name, $body2);
$body2 = str_replace('$precioReserva', $costo_reserva, $body2);
$body2 = str_replace('$pagoPendiente', $pago_pendiente, $body2);
$body2 = str_replace('$precioTraslado', $costo_traslado, $body2);
$body2 = str_replace('$Destino', $destino_traslado, $body2);
$body2 = str_replace('$Origen', $origen_traslado, $body2);
$body2 = str_replace('$Fecha', $fecha_traslado, $body2);
$body2 = str_replace('$Horario', $hora_traslado, $body2);


$body2 = str_replace('$origen_aeropuerto', $origen_aeropuerto, $body2);
$body2 = str_replace('$num_vuelo', $num_vuelo, $body2);
$body2 = str_replace('$aerolinea', $aerolinea, $body2);
$body2 = str_replace('$num_pasajeros', $num_pasajeros, $body2);
$body2 = str_replace('$nombresPasajeros', $nombre_pasajeros, $body2);
$body2 = str_replace('$origenExacto', $direccion_origen, $body2);
$body2 = str_replace('$destinoExacto', $direccion_destino, $body2);
$body2 = str_replace('$asientosBebe', $silla_bebe, $body2);
$body2 = str_replace('$numAsientosBebe', $asientos_bebe, $body2);
$body2 = str_replace('$paradas', $paradas_intermedias, $body2);
$body2 = str_replace('$detallesAdicionales', $detalles_adicionales, $body2);
    
            
    
//SMTP Settings
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->Username = "info@cancuntravelers.com";
$mail->Password = 'Marol1234';
$mail->Port = 25; //587
$mail->SMTPSecure = 'none'; //tls
    
//Email Settings
$mail->isHTML(true);
$mail->setFrom("info@cancuntravelers.com");
$mail->addAddress("info@cancuntravelers.com");
$mail->Subject = $subject2;
$mail->Body = $body2;
    
if ($mail->send()) {
    $status = "success";
    $response = "Email is sent!";
    } else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

///////Fin de Mail a admin///////


///////Calendar API/////////////


//Redirigir a los clientes a Success Page cuando pase su pago
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);