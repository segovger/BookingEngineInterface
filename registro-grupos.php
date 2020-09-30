<?php 

include 'header.php'; 
include 'lang.php';


$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

require_once('transactions/transactionsDb/db.php');
require_once('lib/pdo_db.php');
require_once('transactions/transaction_models/Grupos.php');


//Variables

//Datos personales
$nombre_representante = $POST['nombre_representante'];
$nombre_evento = $POST['nombre_evento'];
$motivo_evento = $POST['motivo_evento'];
$email = $POST['email'];
$telefono = $POST['telefono'];

//Checklist
$servicios_requeridos = $POST['servicios'];


//Booking info
$punto_partida = $POST['punto_partida'];
$fecha_partida = $POST['fecha_partida'];
$lugar_destino = $POST['lugar_destino'];
$fecha_llegada = $POST['fecha_llegada'];
$numero_personas = $POST['numero_personas'];
$detalles = $POST['detalles'];

//Grupos Data

$gruposData= [
    'nombre_representante' => $nombre_representante,
    'nombre_evento' => $nombre_evento,
    'motivo_evento' => $motivo_evento,
    'email' => $email,
    'telefono' => $telefono,
    'servicios_requeridos' => $servicios_requeridos,
    'punto_partida' => $punto_partida,
    'fecha_partida' => $fecha_partida,
    'lugar_destino' => $lugar_destino,
    'fecha_llegada' => $fecha_llegada,
    'numero_personas' => $numero_personas,
    'detalles' => $detalles,
    'detalles' => $detalles

];

$grupos = new Grupos();

$grupos->addGrupos($gruposData);

///////Envio de Mail a admin///////

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$template_gpos = "emailTemplates/templategpos.php";

//$subject = "Nueva solicitud de viaje en grupo";

$mail = new PHPMailer();

//Mail template
if(file_exists($template_gpos))
    $body = file_get_contents($template_gpos); 
else
    die("Unable to locate the template file");
    
$body = str_replace('$nombre_representante', $nombre_representante, $body);
$body = str_replace('$nombre_evento', $nombre_evento, $body);
$body = str_replace('$motivo_evento', $motivo_evento, $body);
$body = str_replace('$email', $email, $body);
$body = str_replace('$telefono', $telefono, $body);
$body = str_replace('$servicios_requeridos', $servicios_requeridos, $body);
$body = str_replace('$punto_partida', $punto_partida, $body);
$body = str_replace('$fecha_partida', $fecha_partida , $body);
$body = str_replace('$lugar_destino', $lugar_destino, $body);
$body = str_replace('$fecha_llegada', $fecha_llegada, $body);
$body = str_replace('$numero_personas', $numero_personas, $body);
$body = str_replace('$detalles', $detalles, $body);

    
            
    
//SMTP Settings
$mail->SMTPDebug = 0; //$mail->isSMTP();
$mail->Host = 'localhost'; //"smtp.gmail.com";
$mail->SMTPAuth = false; //true;
$mail->Username = "info@cancuntravelers.com";
$mail->Password = 'Pss';
$mail->Port = 25; //465; //587
$mail->SMTPSecure = 'none'; //"ssl"; //tls
    
//Email Settings
$mail->isHTML(true);
$mail->setFrom("info@cancuntravelers.com");
$mail->addAddress("info@cancuntravelers.com");
$mail->Subject = $subject;
$mail->Body = $body;
    
if ($mail->send()) {
    $status = "success";
    $response = "Email is sent!";
    } else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

///////Fin de Mail a admin///////


?>

<!DOCTYPE html>
<html lang="en">

<body>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="img/Logo Cancun Travelers.svg" width="112" height="28">
    </a>
            
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
            
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
    </div>
            
    <div class="navbar-end uppercase">
      <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            <?php echo $lang['language'] ?>
          </a>
              
          <div class="navbar-dropdown">
            <a href="index.php?lang=es" class="navbar-item">
              <?php echo $lang['lang_es'] ?>
            </a>
            <a href="index.php?lang=en"  href="en/index.php" class="navbar-item">
              <?php echo $lang['lang_en'] ?>
            </a>
            <a href="index.php?lang=de" class="navbar-item">
              <?php echo $lang['lang_de'] ?>
            </a>
            <a href="index.php?lang=fr" class="navbar-item">
              <?php echo $lang['lang_fr'] ?>
            </a>
          </div>
      </div>
      <a href="nosotros.php" class="navbar-item">
        <?php echo $lang['nosotros'] ?>
      </a>
      <a href="contacto.php" class="navbar-item">
        <?php echo $lang['contacto'] ?>
      </a>
      <a href="grupos.php" class="navbar-item">
        <?php echo $lang['grupos'] ?>
      </a>
      <a href="covid.php" class="navbar-item">
        <?php echo $lang['covid'] ?>
      </a>
      <a href="faq.php" class="navbar-item">
        <?php echo $lang['FAQs'] ?>
      </a>
      <a href="booking.php" class="navbar-item">
        <?php echo $lang['booking'] ?>
      </a>
      <a href="traslados.php" class="navbar-item">
        <?php echo $lang['traslados'] ?>
      </a>
        <?php if( !empty($user) ): ?>
        <a class="navbar-item" href="admin.php">&nbsp;<span class="tag is-link is-medium"><span style="font-size: 0.8em">Admin panel</span></span></a>
        <?php else: ?>
        <?php endif; ?>
      </a>
      </a>
        <?php if( !empty($user) ): ?>
        <a class="navbar-item" href="logout.php">&nbsp;Cerrar sesión</a>
        <?php else: ?>
        <?php endif; ?>
      </a>
    </div>
  </div>
</nav>

    <div class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                    <div class="columns is-vcentered">
                    <div class="column">
                     <h1 class="has-text-centered title is-1"><?php echo $lang['gpos_success'] ?></h1>
                     <hr>
                     <div><p class="has-text-centered"><?php echo $lang['gpos_success_msg'] ?></p></div>
                     <br />
                     <div class="has-text-centered"><a href="index.php" class="button"><?php echo $lang['success_btn'] ?></a></div>
                     <br />
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>


