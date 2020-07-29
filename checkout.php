<?php 

  include 'header.php'; 
  //(DEBUGGING) echo "Origen: ".$_GET['origen']." &nbsp;&nbsp;&nbsp; Destino: ".$_GET['destino']."&nbsp;&nbsp;&nbsp; Fecha: ".$_GET['fecha-traslado'];

  if(!empty($_GET['origen'] && !empty($_GET['destino'] && !empty($_GET['fechaTraslado'])))){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $origen = $GET['origen'];
    $destino = $GET['destino'];
    $fecha = $GET['fechaTraslado'];

  }else {
    echo "Ingresar lugar de origen, lugar de destino y fecha";
  }   

  //Prueba para cachar valores de la form (debugging)
  /*
  if($origen == "Origen 1" && $destino == "Destino 1"){
    echo "Es Tier 1";
  }else
    echo "No es Tier 1";
  */

?>
<!DOCTYPE html>
<html lang="en">

<body>

        <div class="spacer"></div>
        
        <div class="container">
         <a href="booking.php"><p class="">Modificar reserva</p></a>
         <br />
          <h1 class="has-text-cenetred title is-1">Pago de reservación</h1>
          <div class="columns">
            <div class="column">

            <form name="paymentForm" action="./charge.php" method="post" id="payment-form">

              <div class="columns">

                <div class="column">
                 <div class="field">
                   <label class="label">Origen</label>
                   <div class="control">
                    <input name="origen" readonly class="input" type="text" value="<?php echo $origen ?>">
                   </div>
                 </div>
                </div>
                <div class="column">                          
                 <div class="field">
                 <label class="label">Destino</label>
                 <div class="control">
                    <input name="destino" readonly class="input" type="text" value="<?php echo $destino ?>">
                 </div>
               </div>
             </div>
           </div>

           <div class="field">
            <label class="label">Fecha</label>
            <div class="control has-icons-left">
            <input name="fecha" readonly class="input" type="text" value="<?php echo $fecha ?>">
              <span class="icon is-small is-left">
                <i class="form-icons fa fa-calendar"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Horario de tu traslado</label>
              <div class="control">
                <div class="select">
                  <select required id="horario" name="horario">
                    <option>Selecciona el horario</option>
                    <option>12:00</option>
                    <option>13:00</option>
                  </select>
                </div>
                <p id="horarioValidator" class="help is-danger"></p>
              </div>
            </div>

            <hr>

            <div class="field">
              <label class="label">Precio de traslado</label>
              <div class="control">
                <input readonly id="costo_traslado" name="costo_traslado" class="input" type="text" placeholder="Precio">
              </div>
            </div>  
            
            <div class="field">
              <label class="label">Precio de reserva</label>
              <div class="control">
                <input readonly id="costo_reserva" name="costo_reserva"  class="input" type="text" placeholder="Precio">
              </div>
            </div>  

            <div class="field">
              <label class="label">Pago pendiente (presencial)</label>
              <div class="control">
                <input readonly id="pago_pendiente" name="pago_pendiente" class="input" type="text" placeholder="Precio">
              </div>
            </div>

            </div>

            
            <div class="column">
              

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

        <?php include 'footer.php'; ?>

      
    <script type="text/javascript">

      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });

        preciosTraslados();

        function preciosTraslados(){
         var costoTraslado = 100;
         var costoReserva = 10;
         var pagoPendiente = costoTraslado - costoReserva;
        console.log(pagoPendiente);

        document.getElementById('costo_traslado').value = costoTraslado;
        document.getElementById('costo_reserva').value = costoReserva;
        document.getElementById('pago_pendiente').value = pagoPendiente;
        }


        function validateForm() {
      
        if (document.paymentForm.first_name.value == "") {
        document.paymentForm.first_name.focus();
        document.getElementById('nameValidator').innerHTML ="Required Field"
        event.preventDefault()
        return false;
        }
        if (document.paymentForm.last_name.value == "") {
        document.paymentForm.last_name.focus();
        document.getElementById('lastnameValidator').innerHTML ="Required Field"
        event.preventDefault()
        return false;
        }
        
        if (document.paymentForm.client_email.value == "") {
        document.paymentForm.client_email.focus();
        document.getElementById('emailValidator').innerHTML ="Required Field"
        event.preventDefault()
        return false;
        }

        if (document.paymentForm.horario.value == "Selecciona el horario"){
        document.paymentForm.horario.focus();
        document.getElementById('horarioValidator').innerHTML ="Required Field"
        event.preventDefault()
        return false;
        }
        //return true;
      }
        

    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/client.js"></script>
    <script src="js/bulma.js"></script>

</body>
</html>