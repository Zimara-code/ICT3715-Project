<?php
  //for displaying full info and edit data
  $conn = mysqli_connect('localhost', 'root', '', 'exam')or die('Connection failed'. mysql_error());
  $exam_module = $conn->query("SELECT * FROM tbl_exam ");
  if(isset($_REQUEST['id'])){
	 $id = intval($_REQUEST['id']); 
	 $sql = "SELECT q.Q_id, q.Question_number, q.Question_title, q.ExamId, e.Module_code FROM questions q JOIN tbl_exam e USING(ExamId) WHERE q.ExamId = e.ExamId AND Q_id=$id";
	 $run = mysqli_query($conn, $sql);
	 while($row=mysqli_fetch_array($run)){
		$per_id=$row[0];
        $q_number=$row[1]; 
        $q_title=$row[2];
        $exam_id=$row[3];		
        $module_code=$row[4];		
	 }
	 
	 $choice_query = "SELECT * FROM choices WHERE Q_id = $id";
	 $choice_row = $conn->query($choice_query);
	 ?>
	 <form class="form-horizontal" method="post">
	     <div class="modal-content">
		    <div class="modal-head">
			   <button type="button" class="close" data-dismiss="modal">&times;</button>
			   <h4 class="modal-title">Update Questions</h4>
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
						  <label class="clo-sm-4 control-label" for="q_number">Questions Number</label>
						   <div class="col-sm-6">
						      <input type="number" class="form-control" id="q_number" name="q_number" value="<?php echo $q_number; ?>">
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="q_title">Module Code</label>
						   <div class="col-sm-6">
						      <select class="form-control" name="module" id="reference">
			                    <option value="<?php echo $exam_id; ?>"><?php echo $module_code; ?></option>
				                  <?php
					                  while($row = $exam_module->fetch_assoc()){
						                 $module = $row['Module_code'];
						                 $examId = $row['ExamId'];
						                 echo "<option value='$examId'>$module</option>";
					                  }
				                   ?>
				               </select>
						   </div>
						</div>
						<div class="form-group">
						  <label class="clo-sm-4 control-label" for="q_title">Questions Title</label>
						   <div class="col-sm-6">
						      <input type="text" class="form-control" id="q_title" name="q_title" value="<?php echo $q_title; ?>">
						   </div>
						</div>
					 </div>
				  </form>
			   </div>
			</div>
			<div class="modal-footer">
			    <a href="question_list.php"><button type="button" class="btn btn-danger">Cancel</button></a>
			    <button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
			</div>
		 </div>
	 </form>
	 <?php
  }
?>