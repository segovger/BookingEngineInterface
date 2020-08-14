<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<body>
    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">
      

        <!--POPULAR TRIPS-->     

        <section class="popular-trips-table">
          <div class="container">
            <div style="margin: 0;" class="columns is-vcentered">
              <div class="column is-full-mobile">
                <section class="panel">
                  <p class="has-text-centered panel-heading">Destinos populares</p>
                  <div class="panel-block">
                    <table class="table table is-fullwidth">
                    <thead>
                      <tr style="background-color: white;">
                        <th>Origen - Destino</th>
                        <th>Reserva</th>
                      </tr>
                    </thead>
                      <tbody>
                        <tr>
                          <form action="confirmacion.php">
                          <td class="destinos-populares">
                          <div class="columns is-vcentered">
                            <div class="column"><input class="input input-traslado" readonly name="origen" value="Cancún" /></div>
                            <div class="column is-1"> - </div>
                            <div class="column"><input class="input input-traslado" readonly name="destino" value="Zona Hotelera Tulum" /></div>
                          </div>
                          </td>
                          <td><button class="button is-white" type="submit"><img class="reserva-icon" src="img/reserva-icon.svg" alt=""></span></button><span></td>
                          </form>
                        </tr>
                        <tr>
                          <form action="confirmacion.php">
                          <td class="destinos-populares">
                          <div class="columns is-vcentered">
                            <div class="column"><input class="input input-traslado" readonly name="origen" value="Cancún" /></div>
                            <div class="column is-1"> - </div>
                            <div class="column"><input class="input input-traslado" readonly name="destino" value="Playa del Carmen" /></div>
                          </div>
                          </td>
                          <td><button class="button is-white" type="submit"><img class="reserva-icon" src="img/reserva-icon.svg" alt=""></span></button><span></td>
                          </form>
                        </tr>
                        <tr>
                          <form action="confirmacion.php">
                          <td class="destinos-populares">
                          <div class="columns is-vcentered">
                            <div class="column"><input class="input input-traslado" readonly name="origen" value="Origen 1" /></div>
                            <div class="column is-1"> - </div>
                            <div class="column"><input class="input input-traslado" readonly name="destino" value="Destino 3" /></div>
                          </div>
                          </td>
                          <td><button class="button is-white" type="submit"><img class="reserva-icon" src="img/reserva-icon.svg" alt=""></span></button><span></td>
                          </form>
                        </tr>
                        <tr>
                          <form action="confirmacion.php">
                          <td class="destinos-populares">
                          <div class="columns is-vcentered">
                            <div class="column"><input class="input input-traslado" readonly name="origen" value="Origen 3" /></div>
                            <div class="column is-1"> - </div>
                            <div class="column"><input class="input input-traslado" readonly name="destino" value="Destino 4" /></div>
                          </div>
                          </td>
                          <td><button class="button is-white" type="submit"><img class="reserva-icon" src="img/reserva-icon.svg" alt=""></span></button><span></td>
                          </form>
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


    </section>

    <?php include 'footer.php'; ?>


    <script language="javascript">
      $(document).ready(function () {
         $(".datepicker").datepicker({
            minDate: 0
        });
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/bulma.js"></script>
</body>

</html>
