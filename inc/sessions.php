<?php
# Verify the sessions, if there is no sessions, redirect to login page
session_start();

$first_name = $_SESSION["f_name"]; 
$last_name = $_SESSION["l_name"]; 
$email = $_SESSION["email"]; 
$passw = $_SESSION["pword"]; 



?>