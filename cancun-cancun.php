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
      

        <!--POPULAR TRIPS-->     

        <section class="popular-trips-table">

        <div class="container">
          <div class="panel">
          <br />
           <h4 class="subtitle is-4 has-text-centered">Cancún - Cancún</h4>
              <form name="destinosFrecuentes" action="checkout.php">
                  <div class="columns hero-form">
                      <div class="column">
                          <div class="field">
                            <div class="control has-icons-left">
                              <input name="origen" readonly class="input" type="text" value="Cancún">
                              <span class="icon is-small is-left">
                                  <i class="form-icons fa fa-map-marker"></i>
                              </span>
                            </div>
                          </div>
                          </div>
                          <div class="column">
                              <div class="field">
                                <div class="control has-icons-left">
                                  <input name="destino" readonly class="input" type="text" value="Cancún">
                                  <span class="icon is-small is-left">
                                    <i class="form-icons fa fa-map-marker"></i>
                                  </span>
                                </div>
                              </div>
                          </div>
                          <div class="column">
                            <div class="field">
                              <div class="control has-icons-left">
                              <input name="fechaTraslado" class="input" id="datepicker" type="text" value="<?php echo $lang['fecha'] ?>">
                              <p id="fechaValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                                <span class="icon is-small is-left">
                                  <i class="form-icons fa fa-calendar"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="column">
                            <div class="field">
                              <div class="control has-icons-left">
                                <div class="select">
                                  <select required id="numPasajeros" name="num_pasajeros">
                                    <option><?php echo $lang['pasajeros'] ?></option>
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
                          </div>
                          <div class="column">
                            <div class="field has-text-centered">
                              <button onclick="validateForm()" class="button is-white" type="submit"><span><?php echo $lang['submit_btn_checkout'] ?>&nbsp;&nbsp;&nbsp;</span><img class="reserva-icon" src="img/reserva-icon.svg" alt=""></button>
                          </div>
                      </div>
                  </div> <!--Cierra Columns-->
              </form>
            </div>
          </div>
  
        <div class="spacer"></div>


    </section>

    <?php include 'footer.php'; ?>


    </section>
    </section>
    <script language="javascript">

        $(document).ready(function () {
          $("#datepicker").datepicker({
              minDate: 0
          });
        });


        function validateForm() {

        
          if (document.destinosFrecuentes.fechaTraslado.value == "Fecha" || document.destinosFrecuentes.fechaTraslado.value == "Date" || document.destinosFrecuentes.fechaTraslado.value == "Departure date" || document.destinosFrecuentes.fechaTraslado.value == "Datum"){
          document.destinosFrecuentes.fechaTraslado.focus();
          document.getElementById('fechaValidator').classList.remove("validation-notification");
          event.preventDefault();
          return false;
          }

          if (document.destinosFrecuentes.num_pasajeros.value == "Número de pasajeros" || document.destinosFrecuentes.num_pasajeros.value == "No. of passengers" || document.destinosFrecuentes.num_pasajeros.value == "Nombre de passagers" || document.destinosFrecuentes.num_pasajeros.value == "Anzahl der Passagiere"){
          document.destinosFrecuentes.num_pasajeros.focus();
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
