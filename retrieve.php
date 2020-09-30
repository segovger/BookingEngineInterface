<?php 

    require_once('transactions/transactionsDb/db.php');
    require_once('lib/pdo_db.php');

    if(!empty($_GET['origen'] && !empty($_GET['destino'] && !empty($_GET['fechaTraslado'] && !empty($_GET['num_pasajeros']))))){
      $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
  
      $origen = $GET['origen'];
      $destino = $GET['destino'];
      $fecha = $GET['fechaTraslado'];
      $pasajeros = $GET['num_pasajeros'];
  
    }else {
      header('Location: booking.php');
    }
    
    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'booking_transactions';
    
    $limit = 10;
    
    $db = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $s = $db->prepare("SELECT * FROM trips_price");
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
        header('Location: retrieve.php');
    }


    $start = ($page-1)*$limit;

    $stmt = $db->prepare("SELECT * FROM price_table WHERE origen LIKE '$origen' AND destino LIKE '$destino' LIMIT $start, $limit");

    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    
    $results = $stmt->fetchAll();

    //print_r($results);
       
    $conn = null;
    
    // var_dump($results);
    
    $no = $page > 1 ? $start+1 : 1;

    foreach($results as $result){
      $tier = $result->tier; 
      $precioTotal = $result->precio; 
      $precioTotalXL = $result->precio_xl;
    }

    if ($tier == "1"){
      $precioReserva = 20000;
    }else if ($tier == "2"){
      $precioReserva = 30000;
    } else if ($tier == "3"){
      $precioReserva =  50000;
    }else if ($tier == "4"){
      $precioReserva = 80000;
    }

    //Precio de la reserva a 2 decimales
    $precioReservaDec = $precioReserva/100;
 

?>


