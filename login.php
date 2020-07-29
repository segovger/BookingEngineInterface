<?php

session_start();


if(isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'transactions/transactionsDb/db.php';

if(!empty($_POST['username']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,username,password FROM admins WHERE username = :username');
	$records->bindParam(':username', $_POST['username']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['user_id'] = $results['id'];
		header("Location: cust.php");

	} else {
		$message = 'Los campos no coinciden con el usuario';
	}

endif;

?>

<!DOCTYPE html>
<html lang="en">
<body>

<?php include 'header.php'; ?>
<title>Ingreso</title>
<section class="hero is-light is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Ingreso</h3>
                    <div class="box">
                        <figure class="avatar">
                            <img height="128" width="128" src="./img/Logo-Cancun-Travelers.svg">
                        </figure>
                        <br />

                        	<?php if(!empty($message)): ?>
                                <p><?= $message ?></p>
                            <?php endif; ?>

                        <form action="login.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="text" name="username" placeholder="username" >
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <button type="submit" name="ingreso" class="button is-block is-info is-large is-fullwidth">Ingreso</button>
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