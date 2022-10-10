<?php
    //index
	include('database_connection.php');
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
	include('header.php');
	$date = date('Y-m-d');
	$message = "";
	
	//$result = $mysqli->query("SELECT * FROM tbl_exam WHERE MONTH(Exam_date) = 9");
	$result = $mysqli->query("SELECT * FROM tbl_exam");
	
	//process student enrollment
	if(isset($_POST['submit'])){
	   $student_number = $_POST['student_number'];
	   $student_name = $_POST['student_name'];
	   $student_surname = $_POST['student_surname'];
	   $email = $_POST['email'];
	   $module = $_POST['module'];
	   
	  //try this hlee
       if(empty($student_number)){
		   echo "<script>alert('Select exam date');</script>";
	   }
	    if(empty($student_name)){
		   echo "<script>alert('Select the start time');</script>";
	   }
	   if(empty($student_surname)){
          echo "<script>alert('Select the complete time');</script>";
	   }
	   if(empty($email)){
		   echo "<script>alert('Enter the number of questions');</script>";
	   }
	   if(empty($module)){
		   echo "<script>alert('Enter the module code');</script>";
	   }
	   	   
		$sql = "INSERT INTO tbl_students (`Student_number`, `Student_name`, `Student_surname`, `Email`, `ExamId`)
		          VALUES ('$student_number', '$student_name', '$student_surname', '$email', '$module')";
	    mysqli_query($mysqli, $sql);
	       
	    $message = "Student has been enrolled successfully";
	}
?>
<html lang="en">
  
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Enroll</h3>
		<?php 
		    if(isset($message)){
		       echo '<p>'.$message.'</p> '.$date;
			}
		?>
		</div>
		<div class="panel-body">
		   <form method="post" action="enroll.php">
		      <div class="form-group">
			  <label for="student_number">Student Number</label>
			  <input type="number" name="student_number" class="form-control" id="student_number"></br>
			  </div>
			  <div class="form-group">
			  <label for="student_name">Student Name</label>
			  <input type="text" name="student_name" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="student_surname">Student Surname</label>
			  <input type="text" name="student_surname" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="email">Email(mylife email)</label>
			  <input type="text" name="email" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <div class="form-group">
			  <select class="form-control" name="module" id="reference">
			     <option value="">Select Module</option>
				 <?php
					   while($row = $result->fetch_assoc()){
						  $module = $row['Module_code'];
						  $examId = $row['ExamId'];
						  echo "<option value='$examId'>$module</option>";
					  }
				?>
				 </select>
				 </div>
			  </div>
			  <div class="form-group">
			  <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
			  </div>
		   </form>
	     </div>
	  </div>
	  </div>
	</div>
  </body>
</html>