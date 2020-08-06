<?php 

require_once('tiers.php');

  include 'header.php'; 
  //(DEBUGGING) echo "Origen: ".$_GET['origen']." &nbsp;&nbsp;&nbsp; Destino: ".$_GET['destino']."&nbsp;&nbsp;&nbsp; Fecha: ".$_GET['fecha-traslado'];

  if(!empty($_GET['origen'] && !empty($_GET['destino'] && !empty($_GET['fechaTraslado'])))){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $origen_traslado = $GET['origen'];
    $destino_traslado = $GET['destino'];
    $fecha_traslado = $GET['fechaTraslado'];

  }else {
    //header('Location: booking.php');
  }   


?>
<!DOCTYPE html>
<html lang="en">

<body>

        <div class="spacer"></div>
        
        <div class="container">
         <a href="booking.php"><p class="">Modificar reserva</p></a>
         <br />


          <div class="columns">
            <div class="column">

                <h3 class="has-text-cenetred title is-3">Datos de reservación</h3>

                <form name="confirmacionForm" action="checkout.php" method="post" id="confirmacion-form">

                  <div style="margin: 0;" class="columns">

                    <div style="margin: 0;" class="column">
                    <div class="field">
                      <label class="label">Origen</label>
                      <div class="control">
                        <input name="origen" readonly class="input" type="text" value="<?php echo $origen_traslado ?>">
                        <p id="origenValidator" class="help is-danger"></p>
                      </div>
                    </div>
                    </div>
                    <div style="margin: 0;" class="column">                          
                    <div class="field">
                    <label class="label">Destino</label>
                    <div class="control">
                        <input name="destino" readonly class="input" type="text" value="<?php echo $destino_traslado ?>">
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
                      <input name="fecha" readonly class="input" type="text" value="<?php echo $fecha_traslado ?>">
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
                  <label class="label">Horario de tu traslado<span style="font-size: 0.8em;">(GMT-5)</span><br /><span id="horarioRecordatorio" style="font-size: 0.8em; color: red;">+12 hrs de horario actual: <span id="horarioActual"></span></span></label>
                    <div class="control">
                      <div class="select">
                        <select required id="horario" class="horario" name="horario">
                          <option disabled selected value="0">Selecciona el horario</option>
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
                      <p id="horarioValidator" class="help is-danger"></p>
                    </div>
                  </div>
                </div>
              </div>

              <div id="origenCancun">

                  <div style="margin: 0;" class="columns">
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label">¿Su punto de partida es el aeropuerto de Cancún?</label>
                        <div class="control">
                          <label class="radio">
                          <input onclick="origenCancun();" id="origenEnAeropuerto" type="radio" name="origen_aeropuerto">
                            Sí
                          </label>
                          <label class="radio">
                          <input onclick="origenCancun();" id="origenNoAeropuerto" type="radio" name="origen_aeropuerto">
                            No
                          </label>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                  <div id="datosVuelo" style="margin: 0;" class="columns datos-vuelo">
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label">Numero de vuelo</label>
                          <div class="control">
                            <input id="numVuelo" name="num_vuelo" class="input" type="text" value="">
                            <p id="" class="help is-danger"></p>
                          </div>
                        </div>
                    </div>
                    <div style="margin: 0;" class="column">
                      <div class="field">
                        <label class="label">Aerolínea</label>
                          <div class="control">
                            <input id="aerolinea" name="aerolinea" class="input" type="text" value="">
                            <p id="" class="help is-danger"></p>
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
                        <div class="select">
                          <select required id="numPasajeros" name="num_pasajeros">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                          </select>
                        </div>
                      </div>
                    </div>
                </div>
                <div style="margin: 0;" class="column">
                  <div class="field">
                    <label class="label">Nombres de pasajeros</label>
                      <div class="control">
                        <textarea id="nombrePasajeros" name="nombre_pasajeros" class="textarea" placeholder="Nombres separados por coma , "></textarea>
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
                          <input onclick="sillasBebe()" id="conAsientoBebe" type="radio" name="silla_bebe">
                          Si
                        </label>
                        <label class="radio">
                          <input onclick="sillasBebe()" id="sinAsientoBebe" type="radio" name="silla_bebe" value="No">
                          No
                        </label>
                      </div>
                    </div>
                </div>
                <div id="numSillasBebe" class="column">
                  <label class="label">Número de asientos</label>
                    <div class="control">
                      <div class="select">
                            <select id="asientosBebe" name="asientos_bebe">
                              <option>1</option>
                              <option>2</option>
                            </select>
                          </div>
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
              <div class="field has-text-centered">
                <button onclick="validateForm()" class="button btn-green">Reserva</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="spacer"></div>

        <?php include 'footer.php'; ?>

      
    <script type="text/javascript">

      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });

      //Todos los elementos de la fecha actual
      var fecha = new Date();
      var diaActual = fecha.getDate();
      var mesActual = fecha.getMonth() + 1;
      var year = fecha.getFullYear();
      var horaActual = fecha.getHours();
      var minutosActual = fecha.getMinutes();

      //Fecha actual para validator
      var fechaActual = mesActual + '/' + diaActual + '/' + year + ' ' + horaActual + ':' + minutosActual;

      //Fecha actual para condicional
      var diaActual = '0' + mesActual + '/' + '0' + diaActual + '/' + year;

      //Valor de la fecha para condicional
      var fechaReserva = document.confirmacionForm.fecha.value;

      //Campo de horario actual
      document.getElementById("horarioActual").innerHTML = fechaActual + 'hrs' ;

      horasInt = fecha.getHours()*10000;
      console.log(horasInt + 12);

      console.log(horaActual +12);

      var horaViaje = document.getElementById('horario');


      //Cachar el valor del select de horario en jQuery
      $(document).ready(function(){
        $("select.horario").change(function(){
          var selectedTime = $(this).children("option:selected").val()
          console.log(selectedTime);
          //Convertir el .val() a Int
          var horaTotal = (horaActual + selectedTime);
          console.log(horaTotal);
          if(horaActual + selectedTime < 24){
            alert("Está bien")
          }else{
            alert("Its too late (To apologize)");
          }
        });
      });

      //////////////// Tengo que aventar esto al server para que php lo cache
      var pasajeros = document.getElementById('numPasajeros');
      pasajeros.onchange = pasajerosNum;

      function pasajerosNum(){
        var numeroPasajeros = pasajeros.options[pasajeros.selectedIndex].value;
        console.log(numeroPasajeros);
        if(numeroPasajeros <= 5){
          //Precio normal
          console.log("Menos");
        }else{
          //precioXL
          console.log("Mas");
        }
      }

      


      if (fechaReserva > diaActual){
        alert(fechaReserva + " es mayor a " + diaActual);
        document.getElementById('horarioRecordatorio').style.display = "none";
        document.getElementById('horarioActual').style.display = "none";
      } else{
        document.getElementById('horarioRecordatorio').style.display = "block";
        document.getElementById('horarioActual').style.display = "block";
      }


      if (document.confirmacionForm.origen.value == "Cancun") {
          document.getElementById('origenCancun').style.display = "block"
        }else{
          document.getElementById('origenCancun').style.display = "none"
        }

      function origenCancun(){
        if(document.getElementById('origenEnAeropuerto').checked) { 
            document.getElementById('direccionOrigen').style.display = "none";
            document.getElementById('datosVuelo').style.display = "block";
          }else if(document.getElementById('origenNoAeropuerto').checked){
            document.getElementById('datosVuelo').style.display = "none";
            document.getElementById('direccionOrigen').style.display = "block";
          }else{
            return false;
          }
       }

      function sillasBebe(){
        if(document.getElementById('conAsientoBebe').checked) { 
            document.getElementById('numSillasBebe').style.display = "block";
          }else{
            document.getElementById('numSillasBebe').style.display = "none";
            return false;
        }
      }
          

    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/client.js"></script>
    <<script src="js/validations.js"></script>
    <script src="js/bulma.js"></script>

</body>
</html>