<?php


// vier variablen um die Datenbank zu verbinden 
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "test";


//eine Datenbank verbindung herstellen
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);


?>