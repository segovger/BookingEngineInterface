<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<body>
    <section class="hero is-fullheight is-default is-bold">
        <div class="hero-head">

        </div>
        
        <!--HERO-->

        <section class="hero home-hero-section">
            <div class="overlay"></div>
            <div class="hero-body">
              <div class="container">
                  <h1 class="title has-text-centered">
                    Encuentra tu traslado ideal
                  </h1>
                  <h2 class="subtitle has-text-centered">
                    Calidad y servicio...lorem...
                  </h2>
                  <br />
                  <form name="homeForm" action="checkout.php">
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
                          <input name="fechaTraslado" class="input" id="datepicker" type="text" value="Fecha de traslado">
                          <p id="fechaValidator" class="help is-danger"></p>
                          <span class="icon is-small is-left">
                            <i class="form-icons fa fa-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="column is-1">
                      <div class="field">
                        <button onclick="validateForm()"class="button btn-green">Reserva</button>
                      </div>
                    </div>
                  </div>
                  </form>
              </div>
            </div>
        </section>


        <!--MENSAJE INICIAL-->

        <section class="hero height500">
            <div class="hero-body">
              <div class="container has-text-centered">
                <h1 class="title">
                  Visita los mejores destinos turisticos de Cancún
                </h1>
                <h2 class="subtitle pt">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe modi quidem odio rerum nulla nihil asperiores adipisci porro voluptatum et, voluptate soluta quasi, doloremque reprehenderit, obcaecati tempora maiores minus est.
                </h2>
              </div>
            </div>
        </section>



        <!--CARDS-->

       

        <section class="home-cards">
          <div class="container">
            <div style="margin: 0;" class="columns is-vcentered">

           

              <!--CARD 1-->

            

              <div class="column">
                <div class="card home-card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="img/markus-winkler-3vlGNkDep4E-unsplash.jpg" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4">Aeropuerto - Hospedaje</p>
                      </div>
                    </div>
                
                    <div class="content">
                      <a class="card-cta" href="booking.php">Agenda tu traslado</a>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

         

              <!--CARD 2-->

            
              <div class="column">
                <div class="card home-card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="img/4.jpg" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4">Destinos Turisticos</p>
                      </div>
                    </div>
                
                    <div class="content">
                      <a class="card-cta" href="booking.php">Agenda tu traslado</a>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

            

              <!--CARD 3-->

              
              <div class="column">
                <div class="card home-card">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="img/jezael-melgoza-2ktKz6CnNk0-unsplash.jpg" alt="Placeholder image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title is-4">Sitios Arqueologicos</p>
                      </div>
                    </div>
                
                    <div class="content">
                      <a class="card-cta" href="booking.php">Agenda tu traslado</a>
                      <br>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
      </section>

      <div class="spacer"></div>

   


        <!--PROPUESTA DE VALOR 2-->

       

        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column is-6">
                        <h1 class="title is-2">
                            Servicio de excelencia
                        </h1>
                        <h2 class="subtitle is-6 pt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem pariatur architecto odio beatae dolor rerum esse non.
                        </h2>
                        <div class="buttons">
                          <a href="nosotros.php"><button class="button btn-green">Conoce más de nosotros</button></a>
                        </div>
                        <div class="small-spacer"></div>
                    </div>
                    <div class="column is-4 is-offset-1">
                      <figure class="image is-4by5">
                        <img src="img/4-mobile.jpg" alt="Description">
                      </figure>
                    </div>
                    <div class="column-is-1 desktop-only">
                      <figure class="image is-128x128">
                        <img src="img/128-1.png">
                      </figure>
                      <br />
                      <figure class="image is-128x128">
                        <img src="img/128-2.png">
                      </figure>
                      <br />
                      <figure class="image is-128x128">
                        <img src="img/128-3.png">
                      </figure>
                    </div>
                </div>
            </div>
        </div>

     


        <!--MENSAJE 2-->

      

        <section class="hero height500">
            <div class="hero-body">
              <div class="container has-text-centered">
                <h1 class="title">
                  Visita los mejores destinos turisticos de Cancún
                </h1>
                <h2 class="subtitle pt">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe modi quidem odio rerum nulla nihil asperiores adipisci porro voluptatum et, voluptate soluta quasi, doloremque reprehenderit, obcaecati tempora maiores minus est.
                </h2>
              </div>
            </div>
        </section>

      

        <!--POPULAR TRIPS-->

     

        <section class="popular-trips-table">
          <div class="container">
            <div style="margin: 0;" class="columns is-vcentered">
              <div class="column is-full-mobile">
                <section class="panel">
                  <p class="has-text-centered panel-heading">Destinos populares</p>
                  <div class="panel-block">
                    <table class="table table is-fullwidth">
                      <tbody>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares">Destino de origen - Destino 2</td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares">Destino de origen - Destino 2</td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td class="destinos-populares">Destino de origen - Destino 2</td>
                        </tr>
                        <tr>
                          <td><span><img class="minivan-icon" src="img/minivan.png" alt=""></span></td>
                          <td><a class="red-link" href="traslados.php">Los destinos más recurridos</a></td>
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


    <!--AREA DE FOOTER-->
    <?php include 'footer.php'; ?>


    </section>
    <script language="javascript">
      $(document).ready(function () {
         $("#datepicker").datepicker({
            minDate: 0
        });
      });

      function validateForm() {

      if (document.homeForm.origen.value == "Selecciona el origen"){
        document.homeForm.origen.focus();
        document.getElementById('origenValidator').innerHTML ="Required Field"
        event.preventDefault();
        return false;
        }
      
        if (document.homeForm.destino.value == "Selecciona el destino"){
        document.homeForm.destino.focus();
        document.getElementById('destinoValidator').innerHTML ="Required Field"
        event.preventDefault();
        return false;
        }

        if (document.homeForm.fechaTraslado.value == "Fecha de traslado"){
        document.homeForm.fechaTraslado.focus();
        document.getElementById('fechaValidator').innerHTML ="Required Field"
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