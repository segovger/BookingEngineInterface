<?php 

    require_once('transactions/transactionsDb/db.php');

    $id = $_GET['grupo_id'];

    $sql = 'DELETE FROM viajes_grupales WHERE grupo_id= :grupo_id';

    $statement = $conn->prepare($sql);

    if($statement->execute([':grupo_id' => $id])){

        header("Location: grupos-records.php");
    }
?>