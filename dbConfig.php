<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "remarg8r_clkze";
$dbPassword = "HAcKZ882@";
$dbName     = "remarg8r_clkze";

// Create database connection
try{
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}