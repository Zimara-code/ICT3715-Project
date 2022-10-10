<?php
    //index
	include('database_connection.php');
	session_start();
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
	include('header.php');
?>
<html lang="en">
  
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	     <p>tHANK YOU. You have completed your exam <?php echo $_SESSION['score'];?></p>
		   <a href="exam.php?n=1" class="start">Start</a>
	     </div>
	  </div>
	  </div>
	</div>
  </body>
</html>