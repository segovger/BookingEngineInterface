<?php 

    include 'header.php';
    include 'lang.php';
    
    session_start();

    if(!isset($_SESSION['user_id']) ){
    header("Location: login.php");
    }

    
    require_once('transactions/transactionsDb/db.php');
    require_once('lib/pdo_db.php');
    require_once('transactions/transaction_models/Grupos.php');

    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'booking_transactions';
    
    $limit = 10;
    
    $db = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $s = $db->prepare("SELECT * FROM group_trips");
    $s->execute();
    $allResp = $s->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($allResp);
    $total_results = $s->rowCount();
    $total_pages = ceil($total_results/$limit);
    
    if (!isset($_GET['page'])) {
        $page = 1;
    } else{
        $page = $_GET['page'];
    }

    if($page < 1){
        header('Location: grupos-records.php');
    }


    $start = ($page-1)*$limit;

    $stmt = $db->prepare("SELECT * FROM group_trips ORDER BY transaction_time DESC LIMIT $start, $limit");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    
    $results = $stmt->fetchAll();
       
    $conn = null;
    
    // var_dump($results);
    
    $no = $page > 1 ? $start+1 : 1;



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
  <h2 class="title is-2">Viajes grupales <span class="tag is-link">Total: <?= $total_results; ?></span></h2>

  <div class="table-container">
    <table class="table is-bordered is-hoverable">
        <thead>
            <tr>
                <th>ID de grupo</th>
                <th>Nombre de representante</th>
                <th>Nombre de evento</th>
                <th>Motivo del evento</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Servicios requeridos</th>
                <th>Punto de partida</th>
                <th>Fecha del viaje</th>
                <th>Destino</th>
                <th>Fecha llegada</th>
                <th>Número de personas</th>
                <th>Detalles</th>
                <th>Fecha de solicitud</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($results as $result){?>
            <tr>
                <td><?php echo $result->grupo_id; ?></td>
                <td><?php echo $result->nombre_representante; ?></td>
                <td><?php echo $result->nombre_evento; ?></td>
                <td><?php echo $result->motivo_evento; ?></td>
                <td><?php echo $result->email; ?></td>
                <td><?php echo $result->telefono; ?></td>
                <td><?php echo $result->servicios_requeridos; ?></td>
                <td><?php echo $result->punto_partida; ?></td>
                <td><?php echo $result->fecha_partida; ?></td>
                <td><?php echo $result->lugar_destino; ?></td>
                <td><?php echo $result->fecha_llegada; ?></td>
                <td><?php echo $result->numero_personas; ?></td>
                <td><?php echo $result->detalles; ?></td>
                <td><?php echo $result->transaction_time; ?></td>
                <td><a onclick="return confirm('¿Seguro que quiere borrar el registro?')" class="button is-danger" href="delete-group.php?grupo_id=<?= $result->grupo_id ?>">Borrar</a></td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
  </div>

  <nav class="pagination" role="navigation" aria-label="pagination">
  <a href="?page=1" class="pagination-previous" class="pagination-link" aria-label="Goto page 1">Primera página</a>
  <a class="pagination-next" href="?page=<?= $total_pages; ?>">Última página</a>
  <ul class="pagination-list">
    <li>
      <a class="pagination-previous" href="?page=<?= $page - 1 ?>">Anterior</a>
    </li>
    <?php for($p=1; $p<=$total_pages; $p++){?>    
        <li class="<?= $page == $p ? 'active' : ''; ?>"><a class="pagination-link" href="<?= '?page='.$p; ?>"><?= $p; ?></a></li>
    <?php }?>
    <li>
        <a class="pagination-next" href="?page=<?= $page + 1 ?>">Siguiente</a>
    </li>
  </ul>
  </nav>
</div>

    <div class="spacer"></div>

    <?php include 'footer.php'; ?>

</body>
</html>