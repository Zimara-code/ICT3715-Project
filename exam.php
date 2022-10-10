<?php
     include('database_connection.php');
	 if(!isset($_SESSION['role'])){
		header("location:login.php");
	 }
     include('header.php');
	 include('process.php');
	 include('get_exam_id.php');
	 
	 //set the question number
	 $number = (int) $_GET['n'];
	 //Get the total number of questions
	$query = "SELECT * FROM questions WHERE ExamId = ".$_SESSION['examId'];
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
	 
	 //Get the questions
	 $query = "SELECT * FROM questions WHERE Question_number = $number AND ExamId = ".$_SESSION['examId'];
	 //Get the results
	 $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	 $question = $results->fetch_assoc();
	 
	 //Get the questions
	 $query = "SELECT * FROM choices WHERE Question_number = $number AND ExamId = ".$_SESSION['examId'];
	 //Get the results
	 $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	 
	 //Get the module code
	$module_query = "SELECT * FROM tbl_exam WHERE ExamId = ".$_SESSION['examId'];
	$module_results = $mysqli->query($module_query) or die($mysqli->error.__LINE__);
	$module_row = $module_results->fetch_assoc();
	$exam_date = $module_row['Exam_date'];
	$start_time = $module_row['Start_time'];
	$end_time = $module_row['Complete_time'];
	list($year, $month, $day) = explode('-', $exam_date);
	 
?>
<!DOCTYPE html>
<html lang="en">
  
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>PHP Exam Questions</h3>
		</div>
		<div class="panel-body">
		   <div id="timer"></div>
		   <script>
		       // Set the date we're counting down to
                var countDownDate = new Date("<?php echo $month.' '.$day; ?>, <?php echo $year.' '.$end_time;?>").getTime();
                
                // Update the count down every 1 second
                var x = setInterval(function() {
                
                  // Get today's date and time
                  var now = new Date("<?php echo exam_date; ?>").getTime("<?php echo exam_date; ?>");
                    
                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;
                    
                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                  // Output the result in an element with id="demo"
                  document.getElementById("timer").innerHTML = hours + "h: " + minutes + "m: " + seconds + "s ";
                    
                  // If the count down is over, write some text 
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = '<span lass="badge badge-warning">EXPIRED</span>';
					window.open('timeout.php','_self');
                  }
                }, 1000);
		   </script>
		   <div class="current">Question <?php echo $question['Question_number']; ?> of <?php echo $total; ?></div>
		   <p class="questions"><?php echo $question['Question_title']; ?></p>
		   <form action="process.php" method="post">
		       <ol class="choices">
			       <?php while($row = $choices->fetch_assoc()): ?>
				      <li><input type="radio" name="choice" value="<?php echo $row['Id']; ?>"><?php echo $row['title']; ?></li>
				   <?php endwhile; ?>
			   </ol>
			   <input type="submit" name="submit" value="Next">
			   <input type="hidden" name="number" value="<?php echo $number; ?>">
			   <input type="hidden" name="examId" value="<?php echo $_SESSION['examId']; ?>">
			   <input type="hidden" name="stu_number" value="<?php echo $_SESSION['stuNum']; ?>">
			   <input type="hidden" name="q_Id" value="<?php echo $question['Q_id']; ?>">
		   </form>
	     </div>
	  </div>
	  </div>
	</div>
  </body>
</html>
