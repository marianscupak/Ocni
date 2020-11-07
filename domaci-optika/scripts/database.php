<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    $conn = new mysqli($servername, $username, $password, "domaci-optika");
    if ($conn->connect_error) {
        die("Chyba databáze: " . $conn->connect_error);
    }
?>