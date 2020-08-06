<?php 
<<<<<<< HEAD
    
    if(!empty($_GET['tid'] && !empty($_GET['product'] && !empty($_GET['email'])))){
=======
    if(!empty($_GET['tid'] && !empty($_GET['product']))){
>>>>>>> 52fc2a19bf17455fd0695103d185cc5af94a5e29
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $tid = $GET['tid'];
        $product = $GET['product'];
<<<<<<< HEAD
        $email = $GET['email'];

    }else {
        header('Location: transaction-error.php');
    }
    
    


    //Header Nav
=======
    }else {
        header('Location: index.php');
    }


>>>>>>> 52fc2a19bf17455fd0695103d185cc5af94a5e29
    include 'header.php'; 
?>



<!DOCTYPE html>
<html lang="en">

<body>
<<<<<<< HEAD
    <div class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                    <div class="columns is-vcentered">
                    <div class="column">
                     <h1 class="has-text-centered title is-1">Gracias por comprar <?php echo $product; ?></h1>
                     <hr>
                     <p class="has-text-centered">Para más información revisar correo: <?php echo $email; ?></p>
                     <br />
                     <div class="has-text-centered"><a href="index.php" class="button">Finalizar</a></div>
                     <br />
                </div>
            </div>
        </div>
=======

    <div class="container">
        <h1 class="title is-1">Thank your for purchasing <?php echo $product; ?></h1>
        <hr>
        <p>Transaction ID: <?php echo $tid; ?></p>
        <p>Chech your email for more information</p>
        <a href="index.php" class="button">Finalizar</a>
>>>>>>> 52fc2a19bf17455fd0695103d185cc5af94a5e29
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>