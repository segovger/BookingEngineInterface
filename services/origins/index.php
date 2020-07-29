<?php

// Retrieve all destinations
include '../php/connection.php';

$sql = "SELECT * FROM bookingEngine.origen;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>".$row["origen"]."<option>";
    }
} else {
    echo "<option>No Destinations Available</option>";
}


?>