<?php
   $db_host = "localhost";
   $db_name = "exam";
   $username = "root";
   $password = "";
   $mysqli = new mysqli($db_host, $username, $password, $db_name);
   
   //create error handler
   if($mysqli->connect_error){
	   printf("Connection failed: %s\n", $mysqli->connect_error);
	   exit();
   }
   //session_start();
?>