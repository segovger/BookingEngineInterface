<?php 

require_once('retrieve.php');

include 'header.php'; 
include 'lang.php';

  if(!empty($_GET['origen'] && !empty($_GET['destino'] && !empty($_GET['fechaTraslado'] && !empty($_GET['num_pasajeros']))))){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $origen = $GET['origen'];
    $destino = $GET['destino'];
    $fecha = $GET['fechaTraslado'];
    $pasajeros = $GET['num_pasajeros'];

  }else {
    header('Location: booking.php');
  }
  
  //Procesamiento de los pagos finales a deber en efectivo, ya sea para tarif anormal o XL
  if($pasajeros < 5){
    $precioFinal = $precioTotal;
    $pagoPendiente = $precioFinal - $precioReservaDec;
  }else {
    $precioFinal = $precioTotalXL;
    $pagoPendiente = $precioFinal - $precioReservaDec;
  }

  if($precioReserva == ""){
    header('Location: nA.php');
    return false;
  }


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
         <p><a href="booking.php"><?php echo $lang['modificar_reserva'] ?></a></p>
         <br />

          <div class="columns">
            <div class="column">

                <h3 class="has-text-cenetred title is-3"><?php echo $lang['datos_reservacion'] ?></h3>

                <form name="paymentForm" action="./charge.php" method="post" id="payment-form">

                  <div style="margin: 0;" class="columns">

                    <div style="margin: 0;" class="column">
                    <div class="field">
                      <label class="label"><?php echo $lang['origen_checkout'] ?></label>
                      <div class="control">
                        <input name="origen" readonly class="input" type="text" value="<?php echo $origen ?>">
                        <p id="origenValidator" class="help is-danger validation-notification"></p>
                      </div>
                    </div>
                    </div>
                    <div style="margin: 0;" class="column">                          
                    <div class="field">
                    <label class="label"><?php echo $lang['destino_checkout'] ?></label>
                    <div class="control">
                        <input name="destino" readonly class="input" type="text" value="<?php echo $destino ?>">
                        <p id="destinoValidator" class="help is-danger validation-notification"></p>
                    </div>
                  </div>
                </div>

              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['fecha_checkout'] ?></label>
                    <div class="control has-icons-left">
                      <input name="fecha" readonly class="input" type="text" value="<?php echo $fecha ?>">
                      <p id="fechaValidator" class="help is-danger validation-notification"></p>
                      <span class="icon is-small is-left">
                        <i class="form-icons fa fa-calendar"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                  <label id="horarioRecordatorio" class="label"><?php echo $lang['horario_traslado'] ?><span style="font-size: 0.8em;">(GMT-5)</span><br /> <span style="font-size: 0.8em; color: red;"><?php echo $lang['horario_warning'] ?></span>&nbsp;<span id="horarioActual"></span></label>
                    <div class="control">
                      <div class="select">
                      <label class="label"><?php echo $lang['horario_viaje'] ?></label>
                       <p id="horarioValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                        <select required id="horario" name="horario">
                          <option value="0"><?php echo $lang['seleccionar_horario'] ?></option>
                          <option value="1">1:00</option>
                          <option value="2">2:00</option>
                          <option value="3">3:00</option>
                          <option value="4">4:00</option>
                          <option value="5">5:00</option>
                          <option value="6">6:00</option>
                          <option value="7">7:00</option>
                          <option value="8">8:00</option>
                          <option value="9">9:00</option>
                          <option value="10">10:00</option>
                          <option value="11">11:00</option>
                          <option value="12">12:00</option>
                          <option value="13">13:00</option>
                          <option value="14">14:00</option>
                          <option value="15">15:00</option>
                          <option value="16">16:00</option>
                          <option value="17">17:00</option>
                          <option value="18">18:00</option>
                          <option value="19">19:00</option>
                          <option value="20">20:00</option>
                          <option value="21">21:00</option>
                          <option value="22">22:00</option>
                          <option value="23">23:00</option>
                          <option value="24">24:00</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <br />

              <br />

              <div id="origenCancun">

                  <div style="margin: 0;" class="columns">
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label"><?php echo $lang['origen_cancun'] ?></label>
                        <div class="control">
                          <label class="radio">
                          <input onclick="origenCancun();" id="origenEnAeropuerto" type="radio" name="origen_aeropuerto" value="Si">
                            <?php echo $lang['origen_cancun_si'] ?>
                          </label>
                          <label class="radio">
                          <input onclick="origenCancun();" id="origenNoAeropuerto" type="radio" name="origen_aeropuerto" value="No">
                            <?php echo $lang['origen_cancun_no'] ?>
                          </label>
                          <p id="radio1Validator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="datosVuelo" style="margin: 0;" class="columns datos-vuelo">
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label"><?php echo $lang['vuelo_checkout'] ?></label>
                          <div class="control">
                            <input id="numVuelo" name="num_vuelo" class="input" type="text" value="" placeholder="<?php echo $lang['vuelo_checkout_placeholder'] ?>">
                            <p id="numVueloValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                          </div>
                        </div>
                    </div>
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label"><?php echo $lang['aerolinea_checkout'] ?></label>
                          <div class="control">
                            <input id="aerolinea" name="aerolinea" class="input" type="text" value="" placeholder="<?php echo $lang['aerolinea_checkout_placeholder'] ?>">
                            <p id="aerolineaValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                          </div>
                        </div>
                    </div>
                  </div>

              </div>

              <div style="margin: 0;"class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['num_pasajeros'] ?></label>
                      <div class="control">
                        <input id="numPasajeros" name="num_pasajeros" class="input" type="text" value="<?php echo $pasajeros ?>">
                      </div>
                    </div>
                  <div id="pasajerosMsg"><span style="font-size:0.8em; color:red;"><?php echo $lang['pasajeros_warning'] ?><a href="trips-list.php" target="_blank" >Precio XL</a></span></div>
                </div>
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['nombres_pasajeros'] ?></label>
                      <div class="control">
                        <textarea id="nombrePasajeros" name="nombre_pasajeros" class="textarea" placeholder="<?php echo $lang['nombres_placeholder'] ?>"></textarea>
                        <p id="nombresValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                      </div>
                    </div>
                </div>
              </div>

              <div id="direccionOrigen" style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['origen_exacto_checkout'] ?></label>
                      <div class="control">
                        <textarea name="direccion_origen" class="textarea" placeholder="<?php echo $lang['destino_placeholder'] ?>"></textarea>
                        <p id="dirOrigenValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                      </div>
                    </div>
                </div>
              </div>


              <div id="direccionDestino" style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['destino_exacto_checkout'] ?></label>
                      <div class="control">
                        <textarea name="direccion_destino" class="textarea" placeholder="<?php echo $lang['destino_placeholder'] ?>"></textarea>
                        <p id="dirDestinoValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                      </div>
                    </div>
                </div>
              </div>

              <div style="margin: 0;" class="columns is-vcentered">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['asientos_bebe_checkout'] ?></label>
                      <div class="control">
                        <label class="radio">
                          <input onclick="sillasBebe()" id="conAsientoBebe" type="radio" name="silla_bebe" value="Si">
                          <?php echo $lang['asientos_bebe_si'] ?>
                        </label>
                        <label class="radio">
                          <input onclick="sillasBebe()" id="sinAsientoBebe" type="radio" name="silla_bebe" value="No">
                          <?php echo $lang['asientos_bebe_no'] ?>
                        </label>
                        <p id="radio2Validator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                      </div>
                    </div>
                </div>
                <div id="numSillasBebe" class="column">
                  <label class="label"><?php echo $lang['asientos_bebe_num'] ?></label>
                    <div class="control">
                      <div class="select">
                            <select id="asientosBebe" name="asientos_bebe">
                              <option>0</option>
                              <option>1</option>
                              <option>2</option>
                            </select>
                        </div>
                        <p id="asientosValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                    </div>
                </div>
              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['paradas_intermedias'] ?><br /><span style="font-size:0.8em; color:red;"><?php echo $lang['paradas_intermedias_warning'] ?></span></label>
                    <div class="control">
                        <label class="radio">
                          <input type="radio" name="paradas_intermedias" value="Si">
                           <?php echo $lang['paradas_intermedias_si'] ?>
                        </label>
                        <label class="radio">
                          <input type="radio" name="paradas_intermedias" value="No">
                            <?php echo $lang['paradas_intermedias_no'] ?>
                        </label>
                        <p id="radio3Validator" class="help is-danger validation-notification"><<?php echo $lang['validation_txt'] ?>/p>
                      </div>
                    </div>
                 </div>
              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label"><?php echo $lang['detalles_adicionales_checkout'] ?></label>
                      <div class="control">
                        <textarea class="textarea" placeholder="<?php echo $lang['detalles_placeholder'] ?>" name="detalles_adicionales"></textarea>
                      </div>
                    </div>
                </div>
              </div>


            </div>

            
                <div style="margin: 0;" class="column">

                <h3 class="has-text-cenetred title is-3"><?php echo $lang['pago_reservacion_titulo'] ?>&nbsp;<span><img width="60px" height="auto" src="img/stripe-payments.png" alt="Stripe payments"></span></h3>

                <div class="field">
                  <label class="label"><?php echo $lang['precio_traslado_checkout'] ?></label>
                  <div class="control">
                    <input readonly id="costo_traslado" name="costo_traslado" class="input" type="text" value="<?php echo $precioFinal ?> MXN">
                  </div>
                </div>  
                
                <div class="field">
                  <label class="label"><?php echo $lang['precio_reserva_checkout'] ?></label>
                  <div class="control">
                    <input readonly id="costo_reserva" name="costo_reserva"  class="input" type="text" value="<?php echo $precioReservaDec ?> MXN">
                  </div>
                </div>  

                <div class="field">
                  <label class="label"><?php echo $lang['pago_efectivo_checkout'] ?></label>
                  <div class="control">
                    <input readonly id="pago_pendiente" name="pago_pendiente" class="input" type="text" value="<?php echo $pagoPendiente ?> MXN">
                  </div>
                </div>

                <hr>
              
                <div class="field">
                    <label class="label"><?php echo $lang['nombre_checkout'] ?></label>
                    <div class="control">
                      <input required id="nombre" class="input" type="text" name="first_name" placeholder="e.g Alex Smith">
                      <p id="nameValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                    </div>
                  </div>
    
                  <div class="field">
                    <label class="label"><?php echo $lang['apellidos_checkout'] ?></label>
                    <div class="control">
                      <input required id="lastName" class="input" type="text" name="last_name" placeholder="e.g Alex Smith">
                      <p id="lastnameValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="label"><?php echo $lang['email_checkout'] ?></label>
                    <div class="control">
                      <input required id="email" class="input" type="email" name="client_email" placeholder="e.g. alexsmith@gmail.com">
                      <p id="emailValidator" class="help is-danger validation-notification"><?php echo $lang['validation_txt'] ?></p>
                    </div>
                  </div>

                  <div class="field">
                    <label class="label"><?php echo $lang['phone_checkout'] ?></label>
                    <div class="control">
                      <input id="telefonoMovil" class="input" type="tel" name="client_phone" placeholder="include area code">
                      <p id="phoneValidator" class="help is-danger validation-notification"></p>
                    </div>
                  </div>
    
                <img width="150px" height="auto" src="img/powered_by_stripe.svg" alt="Powered by Stripe">
                <div class="form-row">
                  <label for="card-element">
                    <?php echo $lang['credit_card_label_checkout'] ?>
                  </label>
                  <div class="checkout-card-element" id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>
              
                  <!-- Used to display Element errors. -->
                  <div id="card-errors" role="alert"></div>
                </div>
                <br />
                <!---En el botón de abajo había: un onclick="validateForm()"-->
                <button type="submit" id="checkoutBtn" class="button is-link"><?php echo $lang['submit_btn_checkout'] ?></button>
                <button style="border: none;" id="canceltBtn" class="button"><a style="padding-top: 1.25em; padding-bottom: 1.25em; padding-left: 1.25em; padding-right: 1.25em;" href="index.php">Cancelar</a></button>
              </form>
              <!--El div de abajo cacha las respuesta de la form-->
              <!--<div id="resp"></div>-->
            </div>
          </div>

        </div>

        <div class="spacer"></div>

        <!--Modal Horario-->
        <div id="modalHorario" class="modal">
            <div class="modal-background"></div>
            <div class="columns is-vcentered hero hero-body has-text-centered">
                <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title"><?php echo $lang['horario_modal_title'] ?></p>
                </header>
                <section class="modal-card-body">
                    <p><?php echo $lang['horario_modal_msg'] ?></p>
                </section>
                <footer class="modal-card-foot" style="display: block;">
                    <a href="booking.php"><button class="button btn-green"><?php echo $lang['horario_modal_cta'] ?></button></a> 
                </footer>
                </div>
            </div>
        </div>

        <!--Modal Loading-->
         <div id="modalLoad" class="modal">
            <div class="modal-background"></div>
            <div class="columns is-vcentered hero hero-body has-text-centered">
                <div class="modal-card">
                <header class="modal-card-head">
                    <p>Loading...</p>
                </header>
                <section class="modal-card-body">
                    <p>Procesando transacción</p>
                    <div class="loader-1 center"><span></span></div>
                </section>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

      
    <script type="text/javascript">

      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });

      var theButton = document.getElementById("checkoutBtn");    

      var cancelBtn = document.getElementById("canceltBtn");
      cancelBtn.addEventListener('click', function(){
        document.getElementById("paymentForm").reset();
      })

      //Si el origen es Cancun despliega el radio que pregunta si parten del aeropuerto
      if (document.paymentForm.origen.value == "Cancún") {
          document.getElementById('origenCancun').style.display = "block";
          origenCancun();
      }else{
          document.getElementById('origenCancun').style.display = "none";
      }


      //Pasajeros Msg. Indica que el precio cambia cuando hay 5 o más pasajeros.
      if (document.paymentForm.num_pasajeros.value >= 5){
          document.getElementById('pasajerosMsg').style.display = "block";
      }else{
          document.getElementById('pasajerosMsg').style.display = "none";
      }



      $(document).on('ready',function(){       
          $('#checkoutBtn').click(function(){
              var url = "quickstart.php";
              $.ajax({                        
                type: "POST",                 
                url: url,                     
                data: $("#paymentForm").serialize(), 
                success: function(data)             
                {
                  $('#resp').html(data);               
                }
            });
          });
      });

    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/client.js"></script>
    <script src="js/fecha.js"></script>
    <script src="js/validations.js"></script>
    <script src="js/validHorario.js"></script>
    <script src="js/bulma.js"></script>

</body>
</html>