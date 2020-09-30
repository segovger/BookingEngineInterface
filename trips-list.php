<?php 

    include 'header.php';
    include 'lang.php';
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .active{
        font-weight: bold;
        font-size: 1.2em;
    }
    .active a{
        background: #399F9D;
        color: white;
    }
</style>
</head>
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

<div class="container">
  <h2 class="title is-2">Viajes Cancun Travelers</h2>
  <h2 class="subtitle is-5">Origen - Destino & Precios</h2>
<div class="table-container">
<table class="table is-bordered is-hoverable is-fullwidth">
<thead>
<tr><th title="Field #1">Origen</th>
<th title="Field #2">Destino</th>
<th title="Field #3">Precio</th>
<th title="Field #4">Precio XL</th>
</tr>
</thead>
    <tbody><tr>
    <td>Chiquilá</td>
    <td>Akumal</td>
    <td>3100</td>
    <td>3600</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Cancún</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Cobá</td>
    <td>3200</td>
    <td>3700</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Costa Mujeres</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Playa del Carmen</td>
    <td>2390</td>
    <td>2640</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Puerto Aventuras</td>
    <td>3100</td>
    <td>3600</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Puerto Juárez</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Puerto Morelos</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Punta Maroma</td>
    <td>2390</td>
    <td>2640</td>
    </tr>
    <tr>
    <td>Chiquilá</td>
    <td>Tulum</td>
    <td>3100</td>
    <td>3600</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Cancún</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Chiquilá</td>
    <td>3100</td>
    <td>3600</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Costa Mujeres</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Playa del Carmen</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Puerto Aventuras</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Puerto Juárez</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Puerto Morelos</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Punta Maroma</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Akumal</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Akumal</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Cancún</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Cobá</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Costa Mujeres</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Playa del Carmen</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Puerto Aventuras</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Puerto Juárez</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Puerto Morelos</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Punta Maroma</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Bacalar</td>
    <td>Tulum</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Cancún</td>
    <td>600</td>
    <td>700</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Chiquilá</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Costa Mujeres</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Playa del Carmen</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Puerto Juárez</td>
    <td>600</td>
    <td>700</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Puerto Morelos</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Punta Maroma</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Cancún</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Akumal</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Cancún</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Chiquilá</td>
    <td>3200</td>
    <td>3700</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Costa Mujeres</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Playa del Carmen</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Puerto Aventuras</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Puerto Juárez</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Puerto Morelos</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Punta Maroma</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Cobá</td>
    <td>Tulum</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Cancún</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Chiquilá</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Costa Mujeres</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Playa del Carmen</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Puerto Juárez</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Puerto Morelos</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Punta Maroma</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Costa Mujeres</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Akumal</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Bacalar</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Cancún</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Cobá</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Costa Mujeres</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Playa del Carmen</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Puerto Aventuras</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Puerto Juárez</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Puerto Morelos</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Punta Maroma</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Mahahual</td>
    <td>Tulum</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Cancún</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Chiquilá</td>
    <td>2390</td>
    <td>2640</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Costa Mujeres</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Playa del Carmen</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Puerto Juárez</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Puerto Morelos</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Punta Maroma</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Playa del Carmen</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Cancún</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Chiquilá</td>
    <td>3100</td>
    <td>3600</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Costa Mujeres</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Playa del Carmen</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Puerto Juárez</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Puerto Morelos</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Punta Maroma</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Aventuras</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Cancún</td>
    <td>600</td>
    <td>700</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Chiquilá</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Costa Mujeres</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Playa del Carmen</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Puerto Juárez</td>
    <td>600</td>
    <td>700</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Puerto Morelos</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Punta Maroma</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Puerto Juárez</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Cancún</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Chiquilá</td>
    <td>2250</td>
    <td>2500</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Costa Mujeres</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Playa del Carmen</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Puerto Juárez</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Puerto Morelos</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Punta Maroma</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Puerto Morelos</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Akumal</td>
    <td>1400</td>
    <td>1650</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Cancún</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Chiquilá</td>
    <td>2390</td>
    <td>2640</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Costa Mujeres</td>
    <td>800</td>
    <td>900</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Playa del Carmen</td>
    <td>1000</td>
    <td>1150</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Puerto Aventuras</td>
    <td>1150</td>
    <td>1300</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Puerto Juárez</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Puerto Morelos</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Punta Maroma</td>
    <td>780</td>
    <td>880</td>
    </tr>
    <tr>
    <td>Punta Maroma</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Akumal</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Bacalar</td>
    <td>5000</td>
    <td>5500</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Cancún</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Chiquilá</td>
    <td>3100</td>
    <td>3600</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Cobá</td>
    <td>2500</td>
    <td>2750</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Costa Mujeres</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Mahahual</td>
    <td>5900</td>
    <td>6400</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Playa del Carmen</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Puerto Aventuras</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Puerto Juárez</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Puerto Morelos</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Punta Maroma</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    <tr>
    <td>Tulum</td>
    <td>Tulum</td>
    <td>1700</td>
    <td>1950</td>
    </tr>
    </tbody>
</table>
</div>

    <div class="spacer"></div>

    <?php include 'footer.php'; ?>

</body>
</html>