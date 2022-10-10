<?php
//exam.php
include('get_exam_id.php');
	if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
	include('header.php');
	$mysqli = NEW MYSQLI('localhost', 'root', '', 'exam');
	 $examId = '';
	
	$result = $mysqli->query("SELECT e.ExamId, e.Module_code, s.id, s.Student_number 
	FROM tbl_exam e JOIN tbl_students s USING(ExamId) WHERE  e.ExamId = s.ExamId AND s.Student_number = ".$_SESSION['username']);
	
?>
<div class="container">
<div class="card">
    <div class="card-header">
	    <div class="row">
		    <div class="col-md-9">
			     <h3 class="panel-title">Student site</h3>
				 </div>
			</div>
		</div>
		<div class="card-body">
			  <form action="index.php" method="post">
			  <div class="col-md-3" align="right">
		       <div class="form-group">
			  <select class="form-control" name="module" id="module">
			     <option value="">Select Module</option>
				 <?php
					   while($row = $result->fetch_assoc()){
						  $module = $row['Module_code'];
						  $examId = $row['ExamId'];
						  echo "<option value='$examId'>$module</option>";
						  //$_SESSION['examId'] = $row['ExamId'];
					  }
				?>
				 </select>
				 </div>
				 </div>
			  <div class="form-group">
			  <input type="hidden" name="student_number"  value="<?php echo $_SESSION['username']; ?>">
			  <input type="submit" name="submit" class="btn btn-primary" value="CONTINUE">
			  </div>
		   </form> 
	     </div>
    </div>
</div>
</body>