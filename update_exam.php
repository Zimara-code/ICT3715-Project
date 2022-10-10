<?php
  //for displaying full info and edit data
  $conn = mysqli_connect('localhost', 'root', '', 'exam')or die('Connection failed'. mysql_error());
  if(isset($_REQUEST['id'])){
	 $id = intval($_REQUEST['id']); 
	 $sql = "SELECT * FROM tbl_exam WHERE ExamId=$id";
	 $run = mysqli_query($conn, $sql);
	 while($row=mysqli_fetch_array($run)){
		$per_id=$row[0];
        $exam_date=$row[1]; 
        $start_time=$row[2]; 
        $end_time=$row[3]; 
		$num_questions=$row[4];
        $module_code=$row[5]; 
        $status=$row[6];		
	 }
	 ?>
	 <form class="form-horizontal" method="post">
	     <div class="modal-content">
		    <div class="modal-head">
			   <button type="button" class="close" data-dismiss="modal">&times;</button>
			   <h4 class="modal-title">Edit Exam Schedule</h4>
			   <div class="modal-body">
			      <form class="form-horizontal">
				     <div class="box-body">
					    <div class="form-group">
						  <label class="clo-sm-4 control-label" for="exam_id"></label>
						   <div class="col-sm-6">
						      <input type="text" class="form-control" id="exam_id" name="exam_id" value="<?php echo $per_id; ?>" readonly>
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="exam_date">Exam Date</label>
						   <div class="col-sm-6">
						      <input type="date" class="form-control" id="exam_date" name="exam_date" value="<?php echo $exam_date; ?>">
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="start_time">Start Time</label>
						   <div class="col-sm-6">
						      <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $start_time; ?>">
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="end_time">Complete Time</label>
						   <div class="col-sm-6">
						      <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $end_time; ?>" >
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="num_questions">Number Of Questions</label>
						   <div class="col-sm-6">
						      <input type="number" class="form-control" id="num_questions" name="num_questions" value="<?php echo $num_questions; ?>" >
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="address">Module</label>
						   <div class="col-sm-6">
						      <input type="text" class="form-control" id="module_code" name="module_code" value="<?php echo $module_code; ?>">
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="status">Status</label>
						   <div class="col-sm-6">
						      <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" readonly>
						   </div>
						</div>
					 </div>
				  </form>
			   </div>
			</div>
			<div class="modal-footer">
			    <a href="exam_list.php"><button type="button" class="btn btn-danger">Cancel</button></a>
			    <button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
			</div>
		 </div>
	 </form>
	 <?php
  }
?>