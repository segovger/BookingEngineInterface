<?php 

include 'header.php'; 
include 'lang.php';

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

<div class="spacer"></div>

<div class="container">
    <div style="margin: 0;" class="columns">
        <div style="margin: 0;" class="column">
          <h1 class="title is-1"><?php echo $lang['contacto_title'] ?></h1>
          <br/>
          <p><?php echo $lang['contacto_desc'] ?></p>
          <br />
          <p><i class="fa fa-phone" style="color: #399F9D;"></i>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;"><?php echo $lang['celular_title'] ?>:</span>&nbsp;&nbsp;<?php echo $lang['celular_number'] ?></p>
          <br />
          <p><i class="fa fa-envelope" style="color: #399F9D;"></i>&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;"><?php echo $lang['email_header'] ?>:</span>&nbsp;&nbsp;<?php echo $lang['contacto_email'] ?></p>
        </div>
        <div class="column is-5 is-offset-1">
          <figure class="image is-5by3">
            <img src="./img/markus-winkler-3vlGNkDep4E-unsplash.jpg" alt="Description">
          </figure>
        </div>
    </div>
</div>

<div class="small-spacer"></div>


<div class="container">
    <div style="margin: 0;" class="columns is-vcentered">
        <div style="margin: 0;" class="column">
          <div class="panel" style="padding: 15px;"><p class="title is-4"><i class="fa fa-street-view" style="color: #C7555A;"></i>&nbsp;&nbsp;<?php echo $lang['chofer_location_title'] ?></p></div>
          <br/>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_aeropuerto_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_aeropuerto_desc'] ?></p>
          <br/>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_terminal_2_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_terminal_2'] ?></p>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_terminal_3_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_terminal_3'] ?></p>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_terminal_4_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_terminal_4'] ?></p>
          <br/>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_hotel_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_hotel_desc'] ?></p>
          <br/>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_airbnb_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_airbnb_desc'] ?></p>
          <br/>
          <p><span style="font-weight: bold;"><?php echo $lang['chofer_location_chiquila_title'] ?>:&nbsp;&nbsp;</span><?php echo $lang['chofer_location_chiquila_desc'] ?></p>
        </div>
        <div style="margin: 0;" class="column is-4">
          <h5 class="title is-5" style="color: #C7555A;"><?php echo $lang['chofer_404'] ?></h5>
          <p><i class="fa fa-phone" style="color: #399F9D;"></i>&nbsp;&nbsp;&nbsp;<?php echo $lang['contact_mariel'] ?></p>
          <p><i class="fa fa-phone" style="color: #399F9D;"></i>&nbsp;&nbsp;&nbsp;<?php echo $lang['contact_hugo'] ?></p>
          <p><i class="fa fa-phone" style="color: #399F9D;"></i>&nbsp;&nbsp;&nbsp;<?php echo $lang['contact_santiago'] ?></p>
        </div>
    </div>
</div>

<div class="spacer"></div>

<!--AREA DE CONTACTO-->

<!--
<section class="hero is-large">
    <div class="hero-body contact-img">
    </div>
</section>
-->


<!--AREA DE FOOTER-->
<?php include 'footer.php'; ?>


</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bulma.js"></script>

</body>
</html>

