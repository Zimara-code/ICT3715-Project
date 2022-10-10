<?php
   include('connection.php');
   
   if(isset($_POST['submit'])){
		$_SESSION['examId'] = $_POST['module'];
		$_SESSION['stuNum'] = $_POST['student_number'];
	}
	
?>