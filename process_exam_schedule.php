<?php
       //require('db.php');
	   $db = mysqli_connect('localhost', 'root', '', 'exam');
       //session_start();
       $exam_date = "";
	   $start_time = "";
	   $complete_time = "";
	   $student_number = "";
	   $module_code = "";
	   $id = 0;
	   $errors = array();
	   
	   $edit_state = false;
   
   if(isset($_POST['submit'])){
	   $exam_date = $_POST['exam_date'];
	   $start_time = $_POST['start_time'];
	   $complete_time = $_POST['complete_time'];
	   $num_questions = $_POST['num_question'];
	   $module_code = $_POST['module_code'];
	   $status = "Created";
	   
	  //try this hlee
       if(empty($exam_date)){
		   echo "<script>alert('Select exam date');</script>";
	   }
	    if(empty($start_time)){
		   echo "<script>alert('Select the start time');</script>";
	   }
	   if(empty($complete_time)){
          echo "<script>alert('Select the complete time');</script>";
	   }
	   if(empty($num_questions)){
		   echo "<script>alert('Enter the number of questions');</script>";
	   }
	   if(empty($module_code)){
		   echo "<script>alert('Enter the module code');</script>";
	   }
	   	   
		$sql = "INSERT INTO tbl_exam (`Exam_date`, `Start_time`, `Complete_time`, `Number_of_question`, `Module_code`, `Student_number`, `Status`)
		          VALUES ('$exam_date', '$start_time', '$complete_time', '$num_questions', '$module_code', '', '$status')";
	    mysqli_query($db, $sql);
	       
	    $message = "Exam added successfully";
			
	}
   ?>