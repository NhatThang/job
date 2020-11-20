<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$serverName;dbname=admin", $userName, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>