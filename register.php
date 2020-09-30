<?php

session_start();

if(!isset($_SESSION['user_id']) ){
	header("Location: login.php");
}

include 'lang.php';

require 'transactions/transactionsDb/db.php';

$message = '';

if(!empty($_POST['username']) && !empty($_POST['password'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO admins (username, password) VALUES (:username, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':username', $_POST['username']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

	if( $stmt->execute() ):
		$message = 'Usuario registrado';
	else:
		$message = 'Error al crear usuario';
	endif;

endif;

?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<body>

<title>Registro</title>

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

<section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Registo</h3>
                    <div class="box">
                        <figure class="avatar">
                            <img height="128" width="128" src="./img/Logo-Cancun-Travelers.svg">
                        </figure>
                        <br />
                        <?php if(!empty($message)): ?>
                            <p><?= $message ?></p>
                        <?php endif; ?>

                        <form action="register.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="username" placeholder="Usuario" required >
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="password" placeholder="Contraseña" required >
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="confirm_password" placeholder="Confirmar contraseña">
                                </div>
                            </div>
                            <button style="padding-top: calc(.375em - 1px);" type="submit" name="register" class="button is-block is-info is-large is-fullwidth">Registrar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
</body>
</html>