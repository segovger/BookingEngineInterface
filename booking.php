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

    <section class="hero is-fullheight home-hero-section">
      <div class="overlay"></div>
      <div class="hero-body">
        <div class="container">
        <div class="container">
      <div class="columns is-vcentered">
        <div class="column">
          <h4 class="subtitle is-5"><?php echo $lang['booking_subtitle'] ?></h4>
          <h2 class="title is-1"><?php echo $lang['booking_title'] ?></h2>
        </div> <!---Col inicia--->
        <div class="column">
          <div class="panel panel-white" style="padding: 40px; text-align: left;">
            <form name="bookingForm" action="checkout.php">
            <div class="field" style="margin-bottom: 2.75rem;" style="margin-bottom: 2.75rem;">
          <div class="control has-icons-left">
              <div class="select home-select">
                  <select required id="origen" name="origen">
                      <option value="0"><?php echo $lang['origen_input'] ?></option>
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
                      <option value="0"><?php echo $lang['destino_input'] ?></option>
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
                    <option value="0"><?php echo $lang['pasajeros_input'] ?></option>
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
              <input name="" class="input" id="" type="text" value="" placeholder="Cupon code...">
                <span class="icon is-small is-left">
                  <i class="form-icons fa fa-ticket"></i>
                </span>
            </div>
         </div>
         -->
          <div class="columns">
            <div class="column">
              <div class="field">
                <button onclick="validateForm()"class="button btn-green"><?php echo $lang['book_btn'] ?></button>
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


    <?php include 'footer.php'; ?>
    <script language="javascript">
      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });

      function validateForm() {

      if (document.bookingForm.origen.value == "0"){
        document.bookingForm.origen.focus();
        document.getElementById('origenValidator').classList.remove("validation-notification");
        event.preventDefault();
        return false;
        }
      
        if (document.bookingForm.destino.value == "0"){
        document.bookingForm.destino.focus();
        document.getElementById('destinoValidator').classList.remove("validation-notification");
        event.preventDefault();
        return false;
        }

        if (document.bookingForm.fechaTraslado.value == "Fecha" || document.bookingForm.fechaTraslado.value == "Date" || document.bookingForm.fechaTraslado.value == "Date[fr]" ){
        document.bookingForm.fechaTraslado.focus();
        document.getElementById('fechaValidator').classList.remove("validation-notification");
        event.preventDefault();
        return false;
        }

        if (document.bookingForm.num_pasajeros.value == "0"){
        document.bookingForm.num_pasajeros.focus();
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