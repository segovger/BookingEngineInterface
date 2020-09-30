<?php 


include 'header.php'; 
include 'lang.php';



?>

<!DOCTYPE html>
<html lang="es">
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

<div class="small-spacer"></div>

<!--POPULAR TRIPS-->     

<section class="container">
      <div class="panel">
        <div class="box" style="box-shadow: none;">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img src="./img/cancun.jpg" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle is-4">Cancún - Cancún <br /> <span style="font-size: 0.6em;">(<?php echo $lang['gpos_form_servicios_1'] ?>)</span></h4>
                <a href="cancun-cancun.php"><?php echo $lang['submit_btn_checkout'] ?></a>
              </div>
            </div>
          </article>
        </div>
      </div>
</section>

<div class="small-spacer"></div>

    <!--POPULAR TRIPS-->     

    <section class="container">
      <div class="panel">
        <div class="box" style="box-shadow: none;">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img src="./img/playa-del-carmen.jpg" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle is-4">Cancún - Playa Del Carmen</h4>
                <a href="cancun-playadelcarmen.php"><?php echo $lang['submit_btn_checkout'] ?></a>
              </div>
            </div>
          </article>
        </div>
      </div>
</section>

<div class="small-spacer"></div>

    <!--POPULAR TRIPS-->     

    <section class="container">
      <div class="panel">
        <div class="box" style="box-shadow: none;">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img src="./img/tulum.jpg" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle is-4">Cancún - Tulum</h4>
                <a href="cancun-tulum.php"><?php echo $lang['submit_btn_checkout'] ?></a>
              </div>
            </div>
          </article>
        </div>
      </div>
</section>

<div class="small-spacer"></div>

    <!--POPULAR TRIPS-->     

    <section class="container">
      <div class="panel">
        <div class="box" style="box-shadow: none;">
          <article class="media">
            <div class="media-left">
              <figure class="image is-128x128">
                <img src="./img/chiquila.jpg" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <h4 class="subtitle is-4">Cancún - Chiquilá</h4>
                <a href="cancun-chiquila.php"><?php echo $lang['submit_btn_checkout'] ?></a>
              </div>
            </div>
          </article>
        </div>
      </div>
</section>

<div class="small-spacer"></div>


    <?php include 'footer.php'; ?>

    <script language="javascript">

        $(document).ready(function () {
          $("#datepicker").datepicker({
              minDate: 0
          });
        });


        function validateForm() {

        
          if (document.destinosFrecuentes.fechaTraslado.value == "Fecha"){
          document.destinosFrecuentes.fechaTraslado.focus();
          document.getElementById('fechaValidator').innerHTML ="Fecha de tu traslado"
          event.preventDefault();
          return false;
          }

          if (document.destinosFrecuentes.num_pasajeros.value == "Número de pasajeros"){
          document.destinosFrecuentes.num_pasajeros.focus();
          document.getElementById('pasajerosValidator').innerHTML ="Número de pasajeros"
          event.preventDefault();
          return false;
          }

        }
      
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/bulma.js"></script>
</body>

</html>
