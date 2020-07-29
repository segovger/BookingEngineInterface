<?php 
    
    if(!empty($_GET['tid'] && !empty($_GET['product'] && !empty($_GET['email'])))){
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $tid = $GET['tid'];
        $product = $GET['product'];
        $email = $GET['email'];

    }else {
        header('Location: transaction-error.php');
    }
    
    


    //Header Nav
    include 'header.php'; 
?>



<!DOCTYPE html>
<html lang="en">

<body>
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
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>