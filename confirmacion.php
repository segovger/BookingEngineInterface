<?php 

    include 'header.php'; 

    if(!empty($_GET['origen'] && !empty($_GET['destino']))){
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    
        $origen = $GET['origen'];
        $destino = $GET['destino'];
    
      }else {
        header('Location: booking.php');
    }


?>

<!DOCTYPE html>
<html lang="es">
<body>
    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">
      

        <!--POPULAR TRIPS-->     

        <section class="popular-trips-table">

        <div class="container">
          <div class="panel">
          <br />
            <h4 class="subtitle is-4 has-text-centered">Cancún - Playa del Carmen</h4>
              <form name="destinosFrecuentes" action="checkout.php">
                  <div class="columns hero-form">
                      <div class="column">
                          <div class="field">
                            <div class="control has-icons-left">
                              <input name="origen" readonly class="input" type="text" value="<?php echo $origen ?>">
                              <span class="icon is-small is-left">
                                  <i class="form-icons fa fa-map-marker"></i>
                              </span>
                            </div>
                          </div>
                          </div>
                          <div class="column">
                              <div class="field">
                                <div class="control has-icons-left">
                                  <input name="destino" readonly class="input" type="text" value="<?php echo $destino ?>">
                                  <span class="icon is-small is-left">
                                    <i class="form-icons fa fa-map-marker"></i>
                                  </span>
                                </div>
                              </div>
                          </div>
                          <div class="column">
                            <div class="field">
                              <div class="control has-icons-left">
                              <input name="fechaTraslado" class="input" id="datepicker" type="text" value="Fecha">
                                <p id="fechaValidator" class="help is-danger"></p>
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
                                    <option>Número de pasajeros</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                  </select>
                                </div>
                                <p id="pasajerosValidator" class="help is-danger"></p>
                                <span class="icon is-small is-left">
                                  <i class="form-icons fa fa-users"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="column">
                            <div class="field has-text-centered">
                              <button onclick="validateForm()" class="button is-white" type="submit"><span>Reserva&nbsp;</span><img class="reserva-icon" src="img/reserva-icon.svg" alt=""></button>
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

        
          if (document.destinosFrecuentes.fechaTraslado.value == "Fecha"){
          document.destinosFrecuentes.fechaTraslado.focus();
          document.getElementById('fechaValidator').innerHTML ="Fecha de tu traslado"
          event.preventDefault();
          return false;
          }

          if (document.destinosFrecuentes.num_pasajeros.value == "Número de pasajeros"){
          document.destinosFrecuentes.num_pasajeros.focus();
          document.getElementById('pasajerosValidator').innerHTML ="Número de pasajeros"
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
