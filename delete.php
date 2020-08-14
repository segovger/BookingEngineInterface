<?php 

    require_once('transactions/transactionsDb/db.php');

    $id = $_GET['id'];

    $sql = 'DELETE FROM clients WHERE id= :id';

    $statement = $conn->prepare($sql);

    if($statement->execute([':id' => $id])){

        header("Location: cust.php");
    }
?>