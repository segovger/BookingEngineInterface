<?php

include '../php/connection.php';

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if(clean($_GET['or']) == '' || clean($_GET['dest']) != ''){
    echo "0.00";
} else {

    $origin = $_GET['or'];
    $destination = $_GET['dest'];

    $sql = "SELECT * FROM bookingEngine.precio WHERE origen LIKE '".$origin."' and destino like '".$destination."';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["precio"];
        }
    } else {
        echo "0.00";
    }
}

?>