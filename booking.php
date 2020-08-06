<?php 
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="es">
<body>

<!--PREGUNTA-->

    <div class="hero-body">
    <div class="container">
        <form name="bookingForm" action="checkout.php">
            <div class="columns hero-form">
                <div class="column">
                    <div class="field">
                      <div class="control has-icons-left">
                        <div class="select home-select">
                            <select required id="origen" name="origen">
                                <option>Selecciona el origen</option>
                                <option>Chiquila</option>
                                <option>Akumal</option>
                                <option>Bacalar</option>
                                <option>Cancun</option>
                                <option>Coba</option>
                                <option>Costa Mujeres</option>
                                <option>Mahahual</option>
                                <option>Playa del Carmen</option>
                                <option>Puerto Aventuras</option>
                                <option>Puerto Juarez</option>
                                <option>Puerto Morelos</option>
                                <option>Punta Maroma</option>
                                <option>Tulum (Zona Hotelera)</option>
                             </select>
                             <p id="origenValidator" class="help is-danger"></p>
                        </div>
                        <span class="icon is-small is-left">
                            <i class="form-icons fa fa-map-marker"></i>
                        </span>
                      </div>
                     </div>
                    </div>
                    <div class="column">
                        <div class="field">
                          <div class="control has-icons-left">
                              <div class="select home-select">
                                <select required id="destino" name="destino">
                                   <option>Selecciona el destino</option>
                                   <option>Chiquila</option>
                                   <option>Akumal</option>
                                   <option>Bacalar</option>
                                   <option>Cancun</option>
                                   <option>Coba</option>
                                   <option>Costa Mujeres</option>
                                   <option>Mahahual</option>
                                   <option>Playa del Carmen</option>
                                   <option>Puerto Aventuras</option>
                                   <option>Puerto Juarez</option>
                                   <option>Puerto Morelos</option>
                                   <option>Punta Maroma</option>
                                   <option>Tulum (Zona Hotelera)</option>
                                </select>
                                <p id="destinoValidator" class="help is-danger"></p>
                              </div>
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
                        </div>
                      </div>
                    </div>
                    <div class="column">
                      <div class="field has-text-centered">
                        <button onclick="validateForm()" class="button btn-green">Reserva</button>
                    </div>
                </div>
            </div> <!--Cierra Columns-->
        </form>
    </div>
    </div>
    <?php include 'footer.php'; ?>
    <script language="javascript">
      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });

      function validateForm() {

      if (document.bookingForm.origen.value == "Selecciona el origen"){
        document.bookingForm.origen.focus();
        document.getElementById('origenValidator').innerHTML ="Campo requerido"
        event.preventDefault();
        return false;
        }
      
        if (document.bookingForm.destino.value == "Selecciona el destino"){
        document.bookingForm.destino.focus();
        document.getElementById('destinoValidator').innerHTML ="Campo requerido"
        event.preventDefault();
        return false;
        }

        if (document.bookingForm.fechaTraslado.value == "Fecha"){
        document.bookingForm.fechaTraslado.focus();
        document.getElementById('fechaValidator').innerHTML ="Campo requerido"
        event.preventDefault();
        return false;
        }

        if (document.bookingForm.num_pasajeros.value == "Número de pasajeros"){
        document.bookingForm.num_pasajeros.focus();
        document.getElementById('pasajerosValidator').innerHTML ="Campo requerido"
        event.preventDefault();
        return false;
        }
      }
      
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/bulma.js"></script>
</body>