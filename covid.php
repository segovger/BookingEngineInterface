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



    <!--PROPUESTA DE VALOR DE EMPRESA 2-->

    <div class="hero-body">
      <div class="container">
        <div class="panel" style="padding: 25px"><h1 class="title is-2 has-text-centered" style="color: #C7555A">Medidas ante COVID-19</h1></div>
        <div class="small-spacer"></div>
          <div class="columns is-vcentered">
          <div class="column is-5 panel" style="padding: 25px;">
                <h1 class="title is-2">
                <?php echo $lang['covid_nosotros'] ?>
                </h1>
                <p class="pt"><?php echo $lang['covid_nosotros_1'] ?></p>
                <p class="pt"><?php echo $lang['covid_nosotros_2'] ?></p>
                <p class="pt"><?php echo $lang['covid_nosotros_3'] ?></p>
                <p class="pt"><?php echo $lang['covid_nosotros_4'] ?></p>
                <p class="pt"><?php echo $lang['covid_nosotros_5'] ?></p>
                <p class="pt"><?php echo $lang['covid_nosotros_6'] ?></p>
            </div>

            <div class="column is-offset-2 is-5 panel" style="padding: 25px;">
                <h1 class="title is-2">
                  <?php echo $lang['covid_pasajeros'] ?>
                </h1>
                <p class="pt"><?php echo $lang['covid_pasajeros_1'] ?></p>
                <p class="pt"><?php echo $lang['covid_pasajeros_2'] ?></p>
                <p class="pt"><?php echo $lang['covid_pasajeros_3'] ?></p>
                <p class="pt"><?php echo $lang['covid_pasajeros_4'] ?></p>
                <p class="pt"><?php echo $lang['covid_pasajeros_5'] ?></p>
            </div>
          </div>
      </div>
  </div>

  <div class="spacer"></div>

  <!--AREA DE FOOTER-->
  <?php include 'footer.php'; ?>


    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/slider.js" type="text/javascript"></script>
    <script src="js/bulma.js"></script>

</body>
</html>
