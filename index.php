<?php
    //index
	include('database_connection.php');
	include('get_exam_id.php');
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
	include('header.php');
	
	//Get the total number of questions
	$query = "SELECT * FROM questions WHERE ExamId = ".$_SESSION['examId'];
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
	
	//Get the module code
	$module_query = "SELECT * FROM tbl_exam WHERE ExamId = ".$_SESSION['examId'];
	$module_results = $mysqli->query($module_query) or die($mysqli->error.__LINE__);
	$module_row = $module_results->fetch_assoc();
	$exam_date = $module_row['Exam_date'];
	$start_time = $module_row['Start_time'];
	$end_time = $module_row['Complete_time'];
	list($year, $month, $day) = explode('-', $exam_date);
	//$duration = date_diff($start_time, $end_time);
	//echo $duration->h;
?>
<html lang="en">
  
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3><?php echo $module_row['Module_code']; ?> Exam Questions</h3>
		</div>
		<div class="panel-body">
		<div id="timer"></div>
		   <script>
		       // Set the date we're counting down to
                var countDownDate = new Date("<?php echo $month.' '.$day; ?>, <?php echo $year.' '.$end_time;?>").getTime();
                
                // Update the count down every 1 second
                var x = setInterval(function() {
                
                  // Get today's date and time
                  var now = new Date().getTime();
				  
                    
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
		   <ul>
		      <li><strong>Number of questions:</strong> <?php echo $total; ?></li>
			  <li><strong>Type:</strong> Multiple Choice(MCQ)</li>
			  <li><strong>Duration:</strong> 1h30</li>
		   </ul>
		   <a href="exam.php?n=1" class="start">Start</a>
	     </div>
	  </div>
	  </div>
	</div>
  </body>
</html>