
<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["pword"]);
   
   header('Refresh: 2; URL = index.php');
?>