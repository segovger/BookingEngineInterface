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
    
    <!--PROPUESTA DE VALOR DE EMPRESA-->

    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-6">
                    <h1 class="title is-2">
                      <?php echo $lang['nosotros_title'] ?>
                    </h1>
                    <p class="subtitle is-6 pt">
                      <?php echo $lang['nosotros_desc'] ?>
                    </p>
                    <div class="buttons">
                      <a href="booking.php"><button class="button btn-green"><?php echo $lang['nosotros_cta__button'] ?></button></a>
                    </div>
                    <div class="small-spacer"></div>
                </div>
                <div class="column is-5 is-offset-1">
                    <figure class="image is-5by3">
                        <img src="./img/CT-2.jpg" alt="Description">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

    <!--PROCESS-->

    <section class="process">
      <div class="container has-text-centered">
        <h1 class="title">
          <?php echo $lang['icons_title'] ?>
        </h1>
        <div class="small-spacer"></div>


        <div class="columns is-vcentered" style="margin: 0;">

          <!--STEP 1-->
          <div class="column">
            <div class="card home-card">
              <div class="card-image">
                <figure class="image icon-container is-96x96">
                  <img src="img/Process-icon-6.svg" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5 has-text-centered"><?php echo $lang['msg_1'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--STEP 2-->
          <div class="column">
            <div class="card home-card">
              <div class="card-image">
                <figure class="image icon-container is-96x96">
                  <img src="img/Process-icon-5.svg" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-6 has-text-centered"><?php echo $lang['msg_2'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--STEP 3-->
          <div class="column">
            <div class="card home-card">
              <div class="card-image">
                <figure class="image icon-container is-96x96">
                  <img src="img/Process-icon-3.svg" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5 has-text-centered"><?php echo $lang['msg_3'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--STEP 4-->
          <div class="column">
            <div class="card home-card">
              <div class="card-image">
                <figure class="image icon-container is-96x96">
                  <img src="img/Process-icon-7.svg" alt="Placeholder image">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5 has-text-centered"><?php echo $lang['msg_4'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
  </section>

    <div class="spacer"></div>

    <!--PROPUESTA DE VALOR DE EMPRESA 2-->

    <!--

    <div class="hero-body">
      <div class="container">
          <div class="columns is-vcentered">
              <div class="column is-6">
              
                <div class="slider">
                  <div class="slide_viewer">
                    <div class="slide_group">
                      <div class="slide">
                      </div>
                      <div class="slide">
                      </div>
                      <div class="slide">
                      </div>
                      <div class="slide">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="slide_buttons">
                </div>
                
                <div class="directional_nav">
                  <div class="previous_btn" title="Previous">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                      <g>
                        <g>
                          <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                      c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
                          <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="next_btn" title="Next">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                      <g>
                        <g>
                          <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
                          <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
                        </g>
                      </g>
                    </svg>
                  </div>
                </div>
              </div>

              <div class="spacer"></div>

              <div class="column is-offset-1 is-5">
                <h1 class="title is-2">
                  <?php echo $lang['nosotros_cta_title'] ?>
                </h1>
                <h2 class="subtitle is-6 pt">
                  <?php echo $lang['nosotros_cta_desc'] ?>
                </h2>
            </div>
          </div>
      </div>
  </div>

  -->


  <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-6">
                    <figure class="image is-4by3">
                        <img src="./img/CT-1.jpg" alt="Description">
                    </figure>
                </div>
                <div class="column is-5 is-offset-1">
                <h1 class="title is-2">
                  <?php echo $lang['nosotros_cta_title'] ?>
                </h1>
                <h2 class="subtitle is-6 pt">
                  <?php echo $lang['nosotros_cta_desc'] ?>
                </h2>
                    <div class="small-spacer"></div>
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
