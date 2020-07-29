<?php

session_start();

if(!isset($_SESSION['user_id']) ){
	header("Location: login.php");
}

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

<title>Registro instalador</title>
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
                                    <input class="input is-large" type="text" name="username" placeholder="username" required >
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
                            <button type="submit" name="register" class="button is-block is-info is-large is-fullwidth">Registrar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/precios.js" type="text/javascript"></script>
    <script src="js/sticky.js"></script>
</body>
</html>