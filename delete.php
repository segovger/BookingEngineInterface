<?php 

    require_once('transactions/transactionsDb/db.php');

    $id = $_GET['id'];

    $sql = 'DELETE FROM transactions WHERE id= :id';

    $statement = $conn->prepare($sql);

    if($statement->execute([':id' => $id])){

        header("Location: transaction-records.php");
    }
?>