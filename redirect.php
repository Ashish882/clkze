<?php
session_start();
 // Include database configuration file
require_once 'dbConfig.php';

// Include URL Shortener library file
require_once 'Shortener.class.php';

// Initialize Shortener class and pass PDO object
$shortener = new Shortener($db);

// Retrieve short code from URL
$shortCode = $_GET["c"];



try{
    // Get URL by short code
 $url = $shortener->shortCodeToUrl($shortCode);

 
if(isset($_SESSION['views']))
 
     $_SESSION['views'] = $_SESSION['views']+1;
else
    $_SESSION['views']=1;
    echo"views = ".$_SESSION['views'];


    
    // Redirect to the original URL
    header("Location: ".$url);
    exit;
}catch(Exception $e){
    // Display error
    echo $e->getMessage();
}

