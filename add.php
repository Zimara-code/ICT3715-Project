<?php
    //index
	include('database_connection.php');
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
	include('header.php');
	
	if(isset($_POST['submit'])){
		$question_number = $_POST['question_number'];
		$question_id = $_POST['question_id'];
		$question_title = $_POST['question_title'];
		$examId = $_POST['module'];
		$correct_choice = $_POST['correct_choice'];
		
		//choices array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];
		
	    //$row = $result->fetch_assoc();
		$q_id = "";
		
		//questions query
		$question_query = "INSERT INTO `questions`(`Question_number`, `Question_title`, `ExamId`) VALUES('$question_number', '$question_title', $examId) ";
		$insert_row = $mysqli->query($question_query) or die($mysqli->error.__LINE__);
		
		//Get the question_id
		$query = "SELECT * FROM `questions`";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		while($row = $result->fetch_assoc()){
			 $q_id = $row['Q_id'];			  
		}
		//validate the insert
		if($insert_row){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct  = 1;
					}else{
						$is_correct  = 0;
					}
					//Choice query
					$choice_query = "INSERT INTO `choices`(`Q_id`, `ExamId`,`Question_number`, `is_correct`, `title`) VALUES('$q_id', '$examId', '$question_number', '$is_correct', '$value')";
					$insert_row = $mysqli->query($choice_query) or die($mysqli->error.__LINE__);
					//validate the insert
					if($insert_row){
						continue;
					}else{
						die('Error: ('.$mysqli->errno.') '.$mysqli->error);
					}
				}
			}
			$msg = "Question has been added successfully";
		}
	}
	//Get the total number of questions
	$query = "SELECT * FROM questions";
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
	$next = $total + 1;
	
	$exam_module = $mysqli->query("SELECT * FROM tbl_exam ");
?>
<html lang="en">
  
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Add Questions</h3>
		<?php 
		    if(isset($msg)){
		       echo '<p>'.$msg.'</p>';
			}
		?>
		</div>
		<div class="panel-body">
		   <form method="post" action="add.php">
		      <div class="form-group">
			  <label for="supplement_id">Question Number</label>
			  <input type="number" name="question_number" class="form-control"></br>
			  <input type="hidden" name="question_id" class="form-control" value="<?php echo $q_id; ?>"></br>
			  </div>
			  <div class="form-group">
			  <select class="form-control" name="module" id="reference">
			     <option value="">Select Module</option>
				 <?php
					   while($row = $exam_module->fetch_assoc()){
						  $module = $row['Module_code'];
						  $examId = $row['ExamId'];
						  echo "<option value='$examId'>$module</option>";
					  }
				?>
				 </select>
				 </div>
			  <div class="form-group">
			  <label for="description">Question Title</label>
			  <input type="text" name="question_title" class="form-control" ></br>
			  </div>
			  <div class="form-group">
			  <label for="current_stock">Choice #1</label>
			  <input type="text" name="choice1" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="current_stock">Choice #2</label>
			  <input type="text" name="choice2" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="current_stock">Choice #3</label>
			  <input type="text" name="choice3" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="current_stock">Choice #4</label>
			  <input type="text" name="choice4" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="current_stock">Choice #5</label>
			  <input type="text" name="choice5" class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="supplement_id">Correct Choice Number</label>
			  <input type="number" name="correct_choice" class="form-control"></br>
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