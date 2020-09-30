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


    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">

        </div>
        
        <!--HERO-->

      <section class="hero is-fullheight home-hero-section">
      <div class="overlay"></div>
      <div class="hero-body">
        <div class="container">
        <div class="container">
      <div class="columns is-vcentered">
        <div class="column">
          <h4 class="subtitle is-5"><?php echo $lang['intro_subtitle'] ?></h4>
          <h2 class="title is-1"><?php echo $lang['intro_title'] ?></h2>
        </div> <!---Col inicia--->
        <div class="column">
          <div class="panel panel-white" style="padding: 40px; text-align: left;">
            <form name="homeForm" action="checkout.php">
            <div class="field" style="margin-bottom: 2.75rem;" style="margin-bottom: 2.75rem;">
          <div class="control has-icons-left">
              <div class="select home-select">
                  <select required id="origen" name="origen">
                      <option value="0"><?php echo $lang['origen'] ?></option>
                      <option>Chiquilá</option>
                      <option>Akumal</option>
                      <option>Bacalar</option>
                      <option>Cancún</option>
                      <option>Cobá</option>
                      <option>Costa Mujeres</option>
                      <option>Mahahual</option>
                      <option>Playa del Carmen</option>
                      <option>Puerto Aventuras</option>
                      <option>Puerto Juárez</option>
                      <option>Puerto Morelos</option>
                      <option>Punta Maroma</option>
                      <option>Tulum</option>
                    </select>
                      <p id="origenValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
              </div>
                <span class="icon is-small is-left">
                  <i class="form-icons fa fa-map-marker"></i>
                </span>
           </div>
         </div>
         <div class="field" style="margin-bottom: 2.75rem;">
            <div class="control has-icons-left">
                <div class="select home-select">
                    <select required id="destino" name="destino">
                      <option value="0"><?php echo $lang['destino'] ?></option>
                      <option>Chiquilá</option>
                      <option>Akumal</option>
                      <option>Bacalar</option>
                      <option>Cancún</option>
                      <option>Cobá</option>
                      <option>Costa Mujeres</option>
                      <option>Mahahual</option>
                      <option>Playa del Carmen</option>
                      <option>Puerto Aventuras</option>
                      <option>Puerto Juárez</option>
                      <option>Puerto Morelos</option>
                      <option>Punta Maroma</option>
                      <option>Tulum</option>
                    </select>
                      <p id="destinoValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
              </div>
                <span class="icon is-small is-left">
                  <i class="form-icons fa fa-map-marker"></i>
                </span>
            </div>
          </div>
          <div class="field" style="margin-bottom: 2.75rem;">
            <div class="control has-icons-left">
              <input name="fechaTraslado" class="input" id="datepicker" type="text" value="<?php echo $lang['fecha'] ?>" style="z-index: 9;">
              <p id="fechaValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                <span class="icon is-small is-left">
                  <i class="form-icons fa fa-calendar"></i>
                </span>
            </div>
         </div>
         <div class="field field-margin" style="margin-bottom: 2.75rem;">
            <div class="control has-icons-left">
              <div class="select">
                <select required id="numPasajeros" name="num_pasajeros">
                    <option value="0"><?php echo $lang['pasajeros'] ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                </select>
              </div>
              <p id="pasajerosValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                <span class="icon is-small is-left">
                  <i class="form-icons fa fa-users"></i>
                </span>
            </div>
          </div>
          <!--
          <div class="field" style="margin-bottom: 2.75rem;">
            <div class="control has-icons-left">
              <input name="" class="input" id="" type="text" value="" placeholder="code...">
                <span class="icon is-small is-left">
                  <i class="form-icons fa fa-ticket"></i>
                </span>
            </div>
         </div>
         -->
          <div class="columns">
            <div class="column">
              <div class="field">
                <button onclick="validateForm()"class="button btn-green"><?php echo $lang['button'] ?></button>
              </div>
            </div>
          </div>
          </div>
        </form>
        </div> <!---Col acaba---->
      </div>
    </div>

        </div>
      </div>
    </section>
    


        <!--MENSAJE INICIAL-->

        <section class="hero height500">
            <div class="hero-body">
              <div class="container has-text-centered">
                <h1 class="title">
                  <?php echo $lang['initial_msg'] ?>
                </h1>
                <h2 class="subtitle pt">
                  <?php echo $lang['initial_desc'] ?>
                </h2>
              </div>
            </div>
        </section>



        <!--CARDS-->

       

        <section class="home-cards">
          <div class="container">
            <div style="margin: 0;" class="columns is-vcentered">

           

              <!--CARD 1-->

            

              <div class="column">
                <div class="card home-card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="img/markus-winkler-3vlGNkDep4E-unsplash.jpg" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4"><?php echo $lang['airport_hotel'] ?></p>
                      </div>
                    </div>
                
                    <div class="content">
                      <a class="card-cta" href="booking.php"><?php echo $lang['airport_hotel_cta'] ?></a>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

         

              <!--CARD 2-->

            
              <div class="column">
                <div class="card home-card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="img/4.jpg" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4"><?php echo $lang['vacational_spots'] ?></p>
                      </div>
                    </div>
                
                    <div class="content">
                      <a class="card-cta" href="booking.php"><?php echo $lang['vacational_spots_cta'] ?></a>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

            

              <!--CARD 3-->

              
              <div class="column">
                <div class="card home-card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="img/jezael-melgoza-2ktKz6CnNk0-unsplash.jpg" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4"><?php echo $lang['archeological_sites'] ?></p>
                      </div>
                    </div>
                
                    <div class="content">
                      <a class="card-cta" href="booking.php"><?php echo $lang['archeological_sites_cta'] ?></a>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
      </section>

      <div class="spacer"></div>

   


        <!--PROPUESTA DE VALOR 2-->

       

        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column is-6">
                        <h1 class="title is-2">
                          <?php echo $lang['cta_title'] ?>
                        </h1>
                        <h2 class="subtitle is-6 pt">
                          <?php echo $lang['cta_des'] ?>
                        </h2>
                        <div class="buttons">
                          <a href="nosotros.php"><button class="button btn-green"><?php echo $lang['cta_button'] ?></button></a>
                        </div>
                        <div class="small-spacer"></div>
                    </div>
                    <div class="column is-4 is-offset-1">
                      <figure class="image is-4by5">
                        <img src="img/4-mobile.jpg" alt="Description">
                      </figure>
                    </div>
                    <div class="column-is-1 desktop-only">
                      <figure class="image is-128x128">
                        <img src="img/128-1.png">
                      </figure>
                      <br />
                      <figure class="image is-128x128">
                        <img src="img/128-2.png">
                      </figure>
                      <br />
                      <figure class="image is-128x128">
                        <img src="img/128-3.png">
                      </figure>
                    </div>
                </div>
            </div>
        </div>

     


        <!--MENSAJE 2-->

      

        <section class="hero height500">
            <div class="hero-body">
              <div class="container has-text-centered">
                <h1 class="title">
                  <?php echo $lang['msg2_title'] ?>
                </h1>
                <h2 class="subtitle pt">
                  <?php echo $lang['msg2_desc'] ?>
                </h2>
              </div>
            </div>
        </section>

      

        <!--POPULAR TRIPS-->

     

        <section class="popular-trips-table">
          <div class="container">
            <div style="margin: 0;" class="columns is-vcentered">
              <div class="column is-full-mobile">
                <section class="panel">
                  <p class="has-text-centered panel-heading"><?php echo $lang['popular_trips_title'] ?></p>
                  <div class="panel-block">
                    <table class="table table is-fullwidth">
                      <tbody>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares"><a href="cancun-cancun.php">Cancún - Cancún</a><br /><span style="font-size: 0.8em;">(<?php echo $lang['gpos_form_servicios_1'] ?>)</span></td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares"><a href="cancun-playadelcarmen.php">Cancún - Playa Del Carmen</a></td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares"><a href="cancun-tulum.php">Cancún - Tulum</a></td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares"><a href="cancun-chiquila.php">Cancún - Chiquilá</a></td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td><a class="red-link" href="traslados.php"><?php echo $lang['trips_cta'] ?></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>

  
        
        <div class="spacer"></div>


    <!--AREA DE FOOTER-->
    <?php include 'footer.php'; ?>


    </section>
    <script language="javascript">
      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });


      function validateForm() {

      if (document.homeForm.origen.value == "0"){
        document.homeForm.origen.focus();
        document.getElementById('origenValidator').classList.remove("validation-notification");
        event.preventDefault();
        return false;
        }
      
        if (document.homeForm.destino.value == "0"){
        document.homeForm.destino.focus();
        document.getElementById('destinoValidator').classList.remove("validation-notification");
        event.preventDefault();
        return false;
        }

        if (document.homeForm.fechaTraslado.value == "Fecha" || document.homeForm.fechaTraslado.value == "Date" || document.homeForm.fechaTraslado.value == "Date[fr]" ){
        document.homeForm.fechaTraslado.focus();
        document.getElementById('fechaValidator').classList.remove("validation-notification");
        event.preventDefault();
        return false;
        }

        if (document.homeForm.num_pasajeros.value == "0"){
        document.homeForm.num_pasajeros.focus();
        document.getElementById('pasajerosValidator').classList.remove("validation-notification");
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