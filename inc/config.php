<?php

# Information about MySQL Database configuration
   session_start();
   $host = "localhost"; 
   $user = "root"; 
   $password = "Qwerty123"; 
   $dbname = "vrk";
   
# Create a connection / MySQLi Object-Oriented
   $conn = new mysqli($host, $user, $password, $dbname);

# Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

?>