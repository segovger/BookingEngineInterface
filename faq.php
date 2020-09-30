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

<div class="spacer"></div>

<h1 class="title is-1 has-text-centered"><?php echo $lang['faqs_title'] ?></h1>
<h2 class="subtitle is-5 has-text-centered"><?php echo $lang['faqs_subtitle'] ?></h2>

<!--PREGUNTA-->

<div class="hero-body">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column has-text-centered">
                <h3 class="title is-3">
                  <?php echo $lang['faqs_tema1'] ?>
                </h3>
                <h4 class="subtitle is-5"><?php echo $lang['faqs_tema1_subtitle'] ?></h4>
                <figure class="image icon-container is-96x96">
                    <img class="faq-icon" src="img/faq-pago.svg" alt="Placeholder image">
                </figure>
            </div>
            <div class="column is-offset-1">
                  <div class="accordion">
                    <div class="below">
                      <input id="c3" type="radio" name="bellow"/>
                      <label for="c3"><?php echo $lang['faqs_pago_pregunta_1'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_pago_respuesta_1'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c4" type="radio" name="bellow" />
                      <label for="c4"><?php echo $lang['faqs_pago_pregunta_2'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_pago_respuesta_2'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c5" type="radio" name="bellow"/>
                      <label for="c5"><?php echo $lang['faqs_pago_pregunta_3'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_pago_respuesta_3'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c6" type="radio" name="bellow"/>
                      <label for="c6"><?php echo $lang['faqs_pago_pregunta_4'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_pago_respuesta_4'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                  </div>
            </div>
        </div>
    </div>
</div>

<!--PREGUNTA-->

<div class="hero-body">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column has-text-centered">
                <h3 class="title is-3">
                  <?php echo $lang['faqs_tema2'] ?>
                </h3>
                <h4 class="subtitle is-5"><?php echo $lang['faqs_tema2_subtitle'] ?></h4>
                <figure class="image icon-container is-96x96">
                    <img class="faq-icon" src="img/faq-traslado.svg" alt="Placeholder image">
                </figure>
            </div>
            <div class="column is-offset-1">
                  <div class="accordion">
                    <div class="below">
                      <input id="c7" type="radio" name="bellow" />
                      <label for="c7"><?php echo $lang['faqs_servicio_pregunta_1'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_servicio_respuesta_1'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c8" type="radio" name="bellow"/>
                      <label for="c8"><?php echo $lang['faqs_servicio_pregunta_2'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_servicio_respuesta_2'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c9" type="radio" name="bellow"/>
                      <label for="c9"><?php echo $lang['faqs_servicio_pregunta_3'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_servicio_respuesta_3'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c10" type="radio" name="bellow" />
                      <label for="c10"><?php echo $lang['faqs_servicio_pregunta_4'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_servicio_respuesta_4'] ?></p>
                        <section>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>


<!--PREGUNTA-->

<div class="hero-body">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column has-text-centered">
                <h3 class="title is-3">
                    <?php echo $lang['faqs_tema3'] ?>
                </h3>
                <h4 class="subtitle is-5"><?php echo $lang['faqs_tema3_subtitle'] ?></h4>
                <figure class="image icon-container is-96x96">
                    <img class="faq-icon" src="img/faq-servicio.svg" alt="Placeholder image">
                </figure>
            </div>
            <div class="column is-offset-1">
                  <div class="accordion">
                    <div class="below">
                      <input id="c11" type="radio" name="bellow"/>
                      <label for="c11"><?php echo $lang['faqs_reservacion_pregunta_1'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_reservacion_respuesta_1_1'] ?></p>
                          <p><?php echo $lang['faqs_reservacion_respuesta_1_2'] ?></p>
                          <p><?php echo $lang['faqs_reservacion_respuesta_1_3'] ?></p>
                          <p><?php echo $lang['faqs_reservacion_respuesta_1_4'] ?></p>
                          <p><?php echo $lang['faqs_reservacion_respuesta_1_5'] ?></p>
                          <p><?php echo $lang['faqs_reservacion_respuesta_1_6'] ?></p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c12" type="radio" name="bellow"/>
                      <label for="c12"><?php echo $lang['faqs_reservacion_pregunta_2'] ?></label>
                      <div>
                        <section>
                          <p><?php echo $lang['faqs_reservacion_respuesta_2'] ?></p>
                        <section>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--PREGUNTA-->

<!--

<div class="hero-body">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column has-text-centered">
                <h3 class="title is-3">
                    Lorem
                </h3>
                <h4 class="subtitle is-5">Lorem</h4>
                <figure class="image icon-container is-96x96">
                    <img class="faq-icon" src="img/faq-servicio.svg" alt="Placeholder image">
                </figure>
            </div>
            <div class="column is-offset-1">
                  <div class="accordion">
                     <div class="below">
                      <input id="c12" type="radio" name="bellow"/>
                      <label for="c12">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                  </div>
                  <br />
                    <div class="below">
                      <input id="c12" type="radio" name="bellow"/>
                      <label for="c12">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c13" type="radio" name="bellow" />
                      <label for="c13">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c14" type="radio" name="bellow"/>
                      <label for="c14">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

-->


<!--PREGUNTA-->

<!--

<div class="hero-body">
    <div class="container">
        <div class="columns is-vcentered">
            <div class="column has-text-centered">
                <h3 class="title is-3">
                    Lorem
                </h3>
                <h4 class="subtitle is-5">Lorem</h4>
                <figure class="image icon-container is-96x96">
                    <img class="faq-icon" src="img/faq-traslado.svg" alt="Placeholder image">
                </figure>
            </div>
            <div class="column is-offset-1">
                  <div class="accordion">
                    <div class="below">
                      <input id="c15" type="radio" name="bellow"/>
                      <label for="c15">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c16" type="radio" name="bellow" />
                      <label for="c16">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                    <br />
                    <div class="below">
                      <input id="c17" type="radio" name="bellow"/>
                      <label for="c17">Lorem</label>
                      <div>
                        <section>
                          <p>Lorem</p>
                        <section>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

-->




<div class="spacer"></div>

  <!--AREA DE FOOTER-->
  <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bulma.js"></script>

</body>
</html>
