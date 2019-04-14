<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'dama15';
   $db='mizoshopdomain';
   $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
   if($conn->connect_error )
   {
     die('Could not connect: ' . $conn->connect_error);
   }
   
?>