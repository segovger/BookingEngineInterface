<?php

// Retrieve all destinations
include '../php/connection.php';

$sql = "SELECT * FROM bookingEngine.destino;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>".$row["destino"]."<option>";
    }
} else {
    echo "<option>No Destinations Available</option>";
}


?>