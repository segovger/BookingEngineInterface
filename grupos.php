<?php 

include 'header.php'; 
include 'lang.php';

require_once('transactions/transactionsDb/db.php');
require_once('lib/pdo_db.php');
require_once('transactions/transaction_models/Grupos.php');

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
                <div class="column is-5">
                    <h1 class="title is-2">
                      <?php echo $lang['gpos_title'] ?>
                    </h1>
                    <h5 class="subtitle is-5">
                      <?php echo $lang['gpos_subtitle'] ?>
                    </h5>
                    <p class="subtitle is-6 pt">
                      <?php echo $lang['gpos_intro'] ?>
                    </p>
                    <div class="small-spacer"></div>
                </div>
                <div class="column is-6 is-offset-1">
                    <figure class="image is-5by3">
                        <img src="./img/CT-3.jpg" alt="Description">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer"></div>


    <!--PROPUESTA DE VALOR DE EMPRESA-->

    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-5">
                    <figure class="image is-4by5">
                        <img src="./img/CT-5.jpg" alt="Description">
                    </figure>
                </div>
                <div class="column is-6 is-offset-1">
                    <h3 class="title is-3">
                      <?php echo $lang['gpos_precio_title'] ?>
                    </h3>
                    <p class="subtitle is-6 pt">
                      <?php echo $lang['gpos_precio_desc'] ?>
                    </p>
                    <br />
                    <h3 class="title is-3">
                      <?php echo $lang['gpos_amenidades_title'] ?>
                    </h3>
                    <p class="subtitle is-6 pt">
                      <?php echo $lang['gpos_amenidades_desc'] ?>
                    </p>
                    <div class="small-spacer"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

  <div class="container">
  <form action="./registro-grupos.php" method="post" id="formGrupales" name="viajesGrupalesForm">
    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_representante'] ?></label>
        <div class="control">
          <input name="nombre_representante" class="input" type="text" placeholder="Text input">
        </div>
        <p id="nombreValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_evento'] ?></label>
        <div class="control">
          <input name="nombre_evento" class="input" type="text" placeholder="Text input">
        </div>
        <p id="eventoValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
      <label class="label"><?php echo $lang['gpos_form_motivo_evento'] ?></label>
      <div class="control">
        <input name="motivo_evento" class="input" type="text" placeholder="Motivo del evento"></input>
      </div>
      <p id="motivoValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
      <label class="label"><?php echo $lang['gpos_form_email'] ?></label>
      <div class="control has-icons-left has-icons-right">
        <input name="email" class="input is-danger" type="email" placeholder="Email input">
        <span class="icon is-small is-left">
          <i class="fa fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fa fa-exclamation-triangle"></i>
        </span>
      </div>
      <p id="emailValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
      <label class="label"><?php echo $lang['gpos_form_telefono'] ?></label>
      <div class="control has-icons-left has-icons-right">
        <input name="telefono" class="input is-success" type="text" placeholder="Text input">
        <span class="icon is-small is-left">
          <i class="fa fa-phone"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fa fa-check"></i>
        </span>
      </div>
      <p id="telefonoValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
      <label class="label"><?php echo $lang['gpos_form_servicios'] ?></label>
      <div class="control">
        <label class="checkbox">
          <input id="servicio1" class="chkbx" type="checkbox" value="Aeropuerto - Hotel">
          <?php echo $lang['gpos_form_servicios_1'] ?>
        </label>
        <br />
        <label class="checkbox">
          <input class="chkbx" type="checkbox" value="Hotel - Aeropuerto">
          <?php echo $lang['gpos_form_servicios_2'] ?>
        </label>
        <br />
        <label class="checkbox">
          <input class="chkbx" type="checkbox" value="Hotel - Locación">
          <?php echo $lang['gpos_form_servicios_3'] ?>
        </label>
        <br />
        <label class="checkbox">
          <input class="chkbx" type="checkbox" value="Locación - Hotel">
          <?php echo $lang['gpos_form_servicios_4'] ?>
        </label>
        <input style="border: none; opacity: 0;" type="text" id="selectedtext" name="servicios" class="input" placeholder="" readonly></input>
        <p id="serviciosValidator" class="help is-danger validation-notification"><?php echo $lang['validation_options'] ?></p>
      </div>
    </div>

    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_punto_partida'] ?></label>
        <div class="control">
          <input name="punto_partida" class="input" type="text" placeholder="Text input">
        </div>
        <p id="puntoPartidaValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_fecha_partida'] ?></label>
        <div class="control">
          <input name="fecha_partida" class="input" type="text" placeholder="Text input">
        </div>
        <p id="fechaPartidaValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_lugar_destino'] ?></label>
        <div class="control">
          <input name="lugar_destino" class="input" type="text" placeholder="Text input">
        </div>
        <p id="destinoValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_fecha_llegada'] ?></label>
        <div class="control">
          <input name="fecha_llegada" class="input" type="text" placeholder="Text input">
        </div>
        <p id="llegadaValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
        <label class="label"><?php echo $lang['gpos_form_numero_personas'] ?></label>
        <div class="control">
          <input name="numero_personas" class="input" type="text" placeholder="Text input">
        </div>
        <p id="numPersonasValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>

    <div class="field">
      <label class="label"><?php echo $lang['gpos_form_detalles'] ?></label>
      <div class="control">
        <textarea name="detalles" class="textarea" placeholder="Textarea"></textarea>
      </div>
      <p id="detallesValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
    </div>


    <div class="field is-grouped">
      <div class="control">
        <button onclick="validation()" id="submitForm" type="submit" class="button btn-green"><?php echo $lang['gpos_form_submit_btn'] ?></button>
      </div>
    </div>
  </form>
  </div>

  <!--AREA DE FOOTER-->
  <?php include 'footer.php'; ?>

    <script type="text/javascript">

    //Validaciones
    //Validacion nombre 

    function validation(){
      if (document.viajesGrupalesForm.nombre_representante.value == "") {
      document.viajesGrupalesForm.nombre_representante.focus();
      document.getElementById('nombreValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.nombre_evento.value == "") {
      document.viajesGrupalesForm.nombre_evento.focus();
      document.getElementById('eventoValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.motivo_evento.value == "") {
      document.viajesGrupalesForm.motivo_evento.focus();
      document.getElementById('motivoValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.email.value == "") {
      document.viajesGrupalesForm.email.focus();
      document.getElementById('emailValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.telefono.value == "") {
      document.viajesGrupalesForm.telefono.focus();
      document.getElementById('telefonoValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.servicios.value == "") {
      document.viajesGrupalesForm.servicios.focus();
      document.getElementById('serviciosValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.punto_partida.value == "") {
      document.viajesGrupalesForm.punto_partida.focus();
      document.getElementById('puntoPartidaValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.fecha_partida.value == "") {
      document.viajesGrupalesForm.fecha_partida.focus();
      document.getElementById('fechaPartidaValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.lugar_destino.value == "") {
      document.viajesGrupalesForm.lugar_destino.focus();
      document.getElementById('destinoValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.fecha_llegada.value == "") {
      document.viajesGrupalesForm.fecha_llegada.focus();
      document.getElementById('llegadaValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.numero_personas.value == "") {
      document.viajesGrupalesForm.numero_personas.focus();
      document.getElementById('numPersonasValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
      if (document.viajesGrupalesForm.detalles.value == "") {
      document.viajesGrupalesForm.detalles.focus();
      document.getElementById('detallesValidator').classList.remove("validation-notification");
      event.preventDefault();
      return false;
      }
    }
    

 $(document).ready(function(){
   $('.chkbx').click(function(){
     var text="";
     $('.chkbx:checked').each(function(){
       text+=$(this).val()+ ',';
     });
     text=text.substring(0,text.length-1);
     $('#selectedtext').val(text);
     var count=$("[type='checkbox']:checked").length;
   });
 });



    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/slider.js" type="text/javascript"></script>
    <script src="js/bulma.js"></script>

</body>
</html>
