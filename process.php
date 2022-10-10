<?php
    //index
	include('database_connection.php');
	//include('get_exam_id.php');
	//check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	
	if($_POST){
		$number = $_POST['number'];
		$stu_number = $_POST['stu_number'];
		$examId = $_POST['examId'];
		$q_id = $_POST['q_Id'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;
		echo $selected_choice;
		
		//Get the total number of questions
	    $query = "SELECT * FROM questions WHERE ExamId = $examId";
	    //Get results
	    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	    $total = $result->num_rows;
		$res_row = $result->fetch_assoc();
		
		//Get the correct answer
		$query = "SELECT * FROM choices WHERE Question_number = $number AND is_correct = 1";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$row = $result->fetch_assoc();
		$correct_choice = $row['Id'];
		
		//try to insert
		$c_query = "SELECT * FROM choices WHERE Id = $selected_choice";
		$c_result = $mysqli->query($c_query) or die($mysqli->error.__LINE__);
		$c_row = $c_result->fetch_assoc();
		$n_row = $c_result->num_rows;
		if($n_row > 0){
			//$ans = $c_row['title'];
			//$insert_row = "INSERT INTO `answer`(`Q_Id`, `Question_number`, `Answer`, `Student_number`) VALUES ('$q_id', '$number', '$ans', '$stu_number')";
		    //$stmt = $mysqli->query($insert_row) or die($mysqli->error.__LINE__);
	    }
		
		if($correct_choice == $selected_choice){
			echo $correct_choice;
			echo $selected_choice;
			$_SESSION['score']++;
		}
		echo $_SESSION['score'];
		if($number == $total){
			$score = $_SESSION['score'];
			//$insert_score = "INSERT INTO `student_score`(`ExamId`, `Student_number`, `Score`) VALUES ('$examId', '$stu_number', '$score')";
			//$stmt = $mysqli->query($insert_score) or die($mysqli->error.__LINE__);
			header('Location: final.php');
			exit();
		}else{
			header('Location: exam.php?n='.$next);
		}
	}
	
	//retrieve questions from question table
	if(isset($_POST['submit'])){
		//Get the total number of questions
	    $query = "SELECT * FROM questions";
	      //Get results
	      $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	      $total = $result->num_rows;
	}
?>
