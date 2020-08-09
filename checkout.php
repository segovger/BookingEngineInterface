<?php 

require_once('tiers.php');

  include 'header.php'; 
  //(DEBUGGING) echo "Origen: ".$_GET['origen']." &nbsp;&nbsp;&nbsp; Destino: ".$_GET['destino']."&nbsp;&nbsp;&nbsp; Fecha: ".$_GET['fecha-traslado'];

  if(!empty($_GET['origen'] && !empty($_GET['destino'] && !empty($_GET['fechaTraslado'] && !empty($_GET['num_pasajeros']))))){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $origen = $GET['origen'];
    $destino = $GET['destino'];
    $fecha = $GET['fechaTraslado'];
    $pasajeros = $GET['num_pasajeros'];

  }else {
    //header('Location: booking.php');
  }
  
  if($pasajeros <= 5){
    $precioFinal = $precioTotal;
    $pagoPendiente = $precioFinal - $precioReservaDec;
  }else {
    $precioFinal = $precioTotalXL;
    $pagoPendiente = $precioFinal - $precioReservaDec;
  }


?>
<!DOCTYPE html>
<html lang="en">

<body>

        <div class="spacer"></div>
        
        <div class="container">
         <a href="booking.php"><p class="">Modificar reserva</p></a>
         <br />

          <h1 class="title is-1">Checkout</h1>


          <div class="columns">
            <div class="column">

                <h3 class="has-text-cenetred title is-3">Datos de reservación</h3>

                <form name="paymentForm" action="./charge.php" method="post" id="payment-form">

                  <div style="margin: 0;" class="columns">

                    <div style="margin: 0;" class="column">
                    <div class="field">
                      <label class="label">Origen</label>
                      <div class="control">
                        <input name="origen" readonly class="input" type="text" value="<?php echo $origen ?>">
                        <p id="origenValidator" class="help is-danger"></p>
                      </div>
                    </div>
                    </div>
                    <div style="margin: 0;" class="column">                          
                    <div class="field">
                    <label class="label">Destino</label>
                    <div class="control">
                        <input name="destino" readonly class="input" type="text" value="<?php echo $destino ?>">
                        <p id="destinoValidator" class="help is-danger"></p>
                    </div>
                  </div>
                </div>

              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Fecha</label>
                    <div class="control has-icons-left">
                      <input name="fecha" readonly class="input" type="text" value="<?php echo $fecha ?>">
                      <p id="fechaValidator" class="help is-danger"></p>
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
                  <label id="horarioRecordatorio" class="label">Horario de tu traslado<span style="font-size: 0.8em;">(GMT-5)</span><br /> <span style="font-size: 0.8em; color: red;">+12 hrs de horario actual:</span>&nbsp;<span id="horarioActual"></span></label>
                    <div class="control">
                      <div class="select">
                      <label class="label">Selecciona el horario</label>
                       <p id="horarioValidator" class="help is-danger"></p>
                        <select required id="horario" name="horario">
                          <option>Selecciona el horario</option>
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

              <div id="origenCancun">

                  <div style="margin: 0;" class="columns">
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label">¿Su punto de partida es el aeropuerto de Cancún?</label>
                        <div class="control">
                          <label class="radio">
                          <input onclick="origenCancun();" id="origenEnAeropuerto" type="radio" name="origen_aeropuerto" value="Si">
                            Sí
                          </label>
                          <label class="radio">
                          <input onclick="origenCancun();" id="origenNoAeropuerto" type="radio" name="origen_aeropuerto" value="No">
                            No
                          </label>
                          <p id="radio1Validator" class="help is-danger"></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="datosVuelo" style="margin: 0;" class="columns datos-vuelo">
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label">Numero de vuelo</label>
                          <div class="control">
                            <input id="numVuelo" name="num_vuelo" class="input" type="text" value="" placeholder="Número de vuelo">
                            <p id="numVueloValidator" class="help is-danger"></p>
                          </div>
                        </div>
                    </div>
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label">Aerolínea</label>
                          <div class="control">
                            <input id="aerolinea" name="aerolinea" class="input" type="text" value="" placeholder="Nombre de aerolínea">
                            <p id="aerolineaValidator" class="help is-danger"></p>
                          </div>
                        </div>
                    </div>
                  </div>

              </div>

              <div  style="margin: 0;"class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Número de pasajeros</label>
                      <div class="control">
                       <input id="numPasajeros" name="num_pasajeros" class="input" type="text" value="<?php echo $pasajeros ?>">
                       <div id="pasajerosMsg"><span style="font-size:0.8em; color:red;">En caso de ser más de 5 pasajeros, se tomará en cuenta el precio de las columnas <a href="#" >Total XL y Cash XL</a></span></div>
                      </div>
                    </div>
                </div>
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Nombres de pasajeros</label>
                      <div class="control">
                        <textarea id="nombrePasajeros" name="nombre_pasajeros" class="textarea" placeholder="Nombres separados por coma , "></textarea>
                        <p id="nombresValidator" class="help is-danger"></p>
                      </div>
                    </div>
                </div>
              </div>

              <div id="direccionOrigen" style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Dirección exacta de origen</label>
                      <div class="control">
                        <textarea name="direccion_origen" class="textarea" placeholder="Calle, número...."></textarea>
                        <p id="dirOrigenValidator" class="help is-danger"></p>
                      </div>
                    </div>
                </div>
              </div>

              <div id="direccionDestino" style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Dirección exacta de destino</label>
                      <div class="control">
                        <textarea name="direccion_destino" class="textarea" placeholder="Calle, número...."></textarea>
                        <p id="dirDestinoValidator" class="help is-danger"></p>
                      </div>
                    </div>
                </div>
              </div>

              <div style="margin: 0;" class="columns is-vcentered">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">¿Asientos de bebe?</label>
                      <div class="control">
                        <label class="radio">
                          <input onclick="sillasBebe()" id="conAsientoBebe" type="radio" name="silla_bebe" value="Si">
                          Si
                        </label>
                        <label class="radio">
                          <input onclick="sillasBebe()" id="sinAsientoBebe" type="radio" name="silla_bebe" value="No">
                          No
                        </label>
                        <p id="radio2Validator" class="help is-danger"></p>
                      </div>
                    </div>
                </div>
                <div id="numSillasBebe" class="column">
                  <label class="label">Número de asientos</label>
                    <div class="control">
                      <div class="select">
                            <select id="asientosBebe" name="asientos_bebe">
                              <option>0</option>
                              <option>1</option>
                              <option>2</option>
                            </select>
                        </div>
                        <p id="asientosValidator" class="help is-danger"></p>
                    </div>
                </div>
              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">¿Paradas intermedias? <br /><span style="font-size:0.8em; color:red;">Se realizará un cargo adicional de $500.00 (MXN) al total mostrado aquí por cada hora o fracción en paradas intermedias. El chofer cronometrará la duración de las paradas y le informará el total a pagar en efectivo al final del trayecto.</span></label>
                    <div class="control">
                        <label class="radio">
                          <input type="radio" name="paradas_intermedias" value="Si">
                          Yes
                        </label>
                        <label class="radio">
                          <input type="radio" name="paradas_intermedias" value="No">
                          No
                        </label>
                        <p id="radio3Validator" class="help is-danger"></p>
                      </div>
                    </div>
                 </div>
              </div>

              <div style="margin: 0;" class="columns">
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Detalles adicionales</label>
                      <div class="control">
                        <textarea class="textarea" placeholder="¿Algo que debamos saber?" name="detalles_adicionales"></textarea>
                      </div>
                    </div>
                </div>
              </div>


            </div>

            
                <div style="margin: 0;" class="column">

                <h3 class="has-text-cenetred title is-3">Pago de reservación</h3>

                <div class="field">
                  <label class="label">Precio de traslado</label>
                  <div class="control">
                    <input readonly id="costo_traslado" name="costo_traslado" class="input" type="text" value="<?php echo $precioFinal ?> MXN">
                  </div>
                </div>  
                
                <div class="field">
                  <label class="label">Precio de reserva</label>
                  <div class="control">
                    <input readonly id="costo_reserva" name="costo_reserva"  class="input" type="text" value="<?php echo $precioReservaDec ?> MXN">
                  </div>
                </div>  

                <div class="field">
                  <label class="label">Pago pendiente (efectivo)</label>
                  <div class="control">
                    <input readonly id="pago_pendiente" name="pago_pendiente" class="input" type="text" value="<?php echo $pagoPendiente ?> MXN">
                  </div>
                </div>

                <hr>
              

                <div class="field">
                    <label class="label">Nombre</label>
                    <div class="control">
                      <input required id="nombre" class="input" type="text" name="first_name" placeholder="e.g Alex Smith">
                      <p id="nameValidator" class="help is-danger"></p>
                    </div>
                  </div>
    
                  <div class="field">
                    <label class="label">Apellidos</label>
                    <div class="control">
                      <input required id="lastName" class="input" type="text" name="last_name" placeholder="e.g Alex Smith">
                      <p id="lastnameValidator" class="help is-danger"></p>
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                      <input required id="email" class="input" type="email" name="client_email" placeholder="e.g. alexsmith@gmail.com">
                      <p id="emailValidator" class="help is-danger"></p>
                    </div>
                  </div>

                  <div class="field">
                    <label class="label">Teléfono móvil</label>
                    <div class="control">
                      <input id="telefonoMovil" class="input" type="tel" name="client_phone" placeholder="include area code">
                      <p id="phoneValidator" class="help is-danger"></p>
                    </div>
                  </div>
    
                <div class="form-row">
                  <label for="card-element">
                    Credit or debit card
                  </label>
                  <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>
              
                  <!-- Used to display Element errors. -->
                  <div id="card-errors" role="alert"></div>
                </div>
                <br />
                <button onclick="validateForm()" class="button is-link">Submit Payment</button>
              </form>
            </div>
          </div>

        </div>

        <div class="spacer"></div>

        <div class="modal">
            <div class="modal-background"></div>
            <div class="columns is-vcentered hero hero-body has-text-centered">
                <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Atención</p>
                </header>
                <section class="modal-card-body">
                    <p>El horario de traslado debe tener una diferencia mayor a 12 horas del horario actual.</p>
                </section>
                <footer class="modal-card-foot" style="display: block;">
                    <a href="booking.php"><button class="button is-success">Cambiar horario de traslado</button></a> 
                </footer>
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

      //Si el origen es Cancun despliega el radio que pregunta si parten del aeropuerto
      if (document.paymentForm.origen.value == "Cancun") {
          document.getElementById('origenCancun').style.display = "block";
      }else{
          document.getElementById('origenCancun').style.display = "none";
      }

      //Pasajeros Msg. Indica que el precio cambia cuando hay 5 o más pasajeros.
      if (document.paymentForm.num_pasajeros.value >= 5){
          document.getElementById('pasajerosMsg').style.display = "block";
      }else{
          document.getElementById('pasajerosMsg').style.display = "none";
      }

  


    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/client.js"></script>
    <script src="js/fecha.js"></script>
    <script src="js/validations.js"></script>
    <script src="js/bulma.js"></script>

</body>
</html>