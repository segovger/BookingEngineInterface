<?php 

    include 'header.php';
    
    session_start();

    if(!isset($_SESSION['user_id']) ){
    header("Location: login.php");
    }

    
    require_once('transactions/transactionsDb/db.php');
    require_once('lib/pdo_db.php');
    require_once('transactions/transaction_models/Customer.php');

    /*
    //Instanciar Customer
    $customer = new Customer();

    //Obtener Customer
    $customers = $customer->getCustomers();
    */
    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'booking_transactions';
    
    $limit = 10;
    
    $db = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $s = $db->prepare("SELECT * FROM clients");
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
        header('Location: cust.php');
    }


    $start = ($page-1)*$limit;

    $stmt = $db->prepare("SELECT * FROM clients ORDER BY id DESC LIMIT $start, $limit");
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
<div class="container">
  <h2 class="title is-2">Clientes <span class="tag is-link">Total: <?= $total_results; ?></span></h2>

  <table class="table is-bordered is-hoverable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Monto reserva (MXN)</th>
            <th>Fecha</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($results as $result){?>
        <tr>
            <td><?php echo $result->id; ?></td>
            <td><?php echo $result->first_name; ?> <?php echo $result->last_name; ?></td>
            <td><?php echo $result->email; ?></td>
            <td><?php echo sprintf('%.2f', $result->amount / 100) ?></td>
            <td><?php echo $result->transaction_time; ?></td>
            <td><a onclick="return confirm('¿Seguro que quiere borrar el registro?')" class="button is-danger" href="delete.php?id=<?= $result->id ?>">Delete</a></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
  </table>
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