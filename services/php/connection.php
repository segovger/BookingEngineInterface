<?php

    $servername = "localhost:3306";
    $username = "booking";
    $password = "password123";
    $dbname = "bookingEngine";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>