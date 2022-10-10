<?php
    //index
	include('database_connection.php');
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
	include('header.php');
	include('process_exam_schedule.php');
	
	$result = $mysqli->query("SELECT * FROM tbl_students");
?>
<html lang="en">
  
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Schedule Exam</h3>
		<?php 
		    if(isset($msg)){
		       echo '<p>'.$message.'</p>';
			}
		?>
		</div>
		<div class="panel-body">
		   <form method="post" action="add_exam.php">
		      <div class="form-group">
			  <label for="exam_date">Exam Date</label>
			  <input type="date" name="exam_date" class="form-control" id="exam_date"></br>
			  </div>
			  <div class="form-group">
			  <label for="start_time">Start Time</label>
			  <input type="time" name="start_time" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="complete_time">Complete Time</label>
			  <input type="time" name="complete_time" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="num_question">Number Of Question</label>
			  <input type="number" name="num_question" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="module_code">Module Code</label>
			  <input type="text" name="module_code" class="form-control"></br>
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