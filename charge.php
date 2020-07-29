<?php 

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    require_once('vendor/autoload.php');
    require_once('transactions/transactionsDb/db.php');
    require_once('lib/pdo_db.php');
    require_once('transactions/transaction_models/Customer.php');
    //require_once('transactions/transaction_models/Viaje.php');
    //require_once('transactions/transaction_models/Traslado.php');

//INGRESAR API
    \Stripe\Stripe::setApiKey('Secret Key');


//Recoger variables de booking.php
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['client_email'];
$token = $POST['stripeToken'];
$costo_traslado = $POST['costo_traslado'];
$costo_reserva = $POST['costo_reserva'];
$pago_pendiente = $POST['pago_pendiente'];
$origen_traslado = $POST['origen'];
$destino_traslado = $POST['destino'];
$hora_traslado = $POST['horario'];
$fecha_traslado = $POST['fecha'];


//$precioTraslado = $POST['precioTraslado'];



//Generar un cliente en Stripe

$customer = \Stripe\Customer::create([
    "email" => $email,
    "source" => $token
]);

//Debugging
//echo $token;


$charge = \Stripe\Charge::create([
    "amount" => 500,
    "currency" => "usd",
    "description" => "Booking Reservation",
    "customer" => $customer->id
]);



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



//Viaje Data 
/*
$viajeData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'last_name' => $$charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status
];



//Instancias Viaje
$viaje = new Viaje();

//Agregar Viaje a DB 
$viaje->addCustomer($viajeData); 
*/


//Traslados Data
/*

$trasladoData = [
    'id' => $charge->id,
    'costo_reserva' => $costo_reserva,
    'costo_traslado' => $costo_traslado,
    'pago_pendiente' => $pago_pendiente
];

//Instancia de Traslados
$traslado = new Traslado();

//Agregar traslado a DB
$traslado->addTraslado($trasladoData);
*/



//Envio de Mail
use PHPMailer\PHPMailer\PHPMailer;

 $subject = "Reserva de traslado";

 $subject2 = "Nueva reserva de traslado";
//$body = "This is the body of the email";

$template_file = "./template.php";

$template_file2 = "./template2.php";

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

        

//SMTP Settings
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "email";
$mail->Password = 'emil pss';
$mail->Port = 465; //587
$mail->SMTPSecure = "ssl"; //tls

//Email Settings
$mail->isHTML(true);
$mail->setFrom("email");
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

    //Email para el admin

    $mail = new PHPMailer();


    //Mail template
    if(file_exists($template_file2))
        $body2 = file_get_contents($template_file2); 
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
    
            
    
    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "email";
    $mail->Password = 'email pss';
    $mail->Port = 465; //587
    $mail->SMTPSecure = "ssl"; //tls
    
    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom("email");
    $mail->addAddress("email");
    $mail->Subject = $subject2;
    $mail->Body = $body2;
    
    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
        } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

//exit(json_encode(array("status" => $status, "response" => $response)));
    


//Redirigir a los clientes a Success Page cuando pase su pago
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description.'&email='.$charge->receipt_email);