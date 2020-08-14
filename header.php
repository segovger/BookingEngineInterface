<?php

session_start();

require 'transactions/transactionsDb/db.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,username,password FROM admins WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<head>
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cancún Travelers</title>
        <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/slider.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/booking.css">
        <link rel="stylesheet" href="css/faq.css">
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/slider.js" type="text/javascript"></script>
    <script src="js/bulma.js"></script>
</head>

<div class="hero-head">


<!--MENÚ-->

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
                        Language
                      </a>
              
                      <div class="navbar-dropdown">
                        <a class="navbar-item">
                          Español
                        </a>
                        <a class="navbar-item">
                          English
                        </a>
                        <a class="navbar-item">
                          Deutsch
                        </a>
                        <a class="navbar-item">
                          Français
                        </a>
                      </div>
                  </div>
                  <a href="nosotros.php" class="navbar-item">
                     Nosotros
                  </a>
                  <a href="contacto.php" class="navbar-item">
                      Contacto
                  </a>
                  <a href="faq.php" class="navbar-item">
                      FAQs
                  </a>
                  <a href="booking.php" class="navbar-item">
                      Booking
                  </a>
                  <a href="traslados.php" class="navbar-item">
                    Traslados
                  </a>
                    <?php if( !empty($user) ): ?>
                    <a class="navbar-item" href="logout.php">&nbsp;Cerrar sesión</a>
                    <?php else: ?>
                    <?php endif; ?>
                  </a>
                </div>
              </div>
            </nav>