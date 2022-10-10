<?php
//exam.php
 if(!isset($_SESSION['role'])){
		header("location:login.php");
}
include('header.php');
?>
<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-heading">
		  <h3>
		  Manage Questions
		  <a class="btn btn-success pull-right" href="add.php">Add Question</a>
		  </h3>
		</div>
		<div class="panel-body">
		   <div class="col-sm-12 table-responsive">
	    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
				<th>Question Number</th>
				<th>Title</th>
				<th>Module Code</th>
				<!--<th>Number Of Question</th>
				<th>Module Code</th>
				<th>Status</th>-->
                <th>Action</th>		
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
				<th>Question Number</th>
				<th>Title</th>
				<th>Module Code</th>
                <th>Action</th>				
            </tr>
        </tfoot>
    </table>
	<!--Create modal for displaying detail info-->
		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
			   <div id="content-data"></div>
			</div>
		</div>
		</div>
	</div>
	</div>
	<script>
	   $(document).ready(function(){
	       var dataTable = $('#example').DataTable({
		       "processing": true,
			   "serverSide": true,
			   "ajax":{
				   url:"get_questions.php",
				   type:"post"
			   }
		   });
		   
	   });
	</script>
	<!--Script js for editing client data-->
    <script>
	    $(document).on('click', '#getEdit', function(e){
			e.preventDefault();
			var per_id=$(this).data('id');
			$('#content-data').html('');
			$.ajax({
				url:"update_question.php",
				type:"post",
				data:"id="+per_id,
				dataType:"html"
			}).done(function(data){
				$('#content-data').html('');
				$('#content-data').html(data);
			}).fial(function(){
				$('#content-data').html('<p>Error</p>');
			});
		});
	</script>
<?php
    //database connection
    $conn = mysqli_connect('localhost', 'root', '', 'exam')or die('Connection failed'. mysql_error());
	//Check if the save button is clicked
    if(isset($_POST['btnEdit'])){
		$exam_id = mysqli_real_escape_string($conn, $_POST['exam_id']);
		$exam_date = mysqli_real_escape_string($conn, $_POST['exam_date']);
		$start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
		$end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
		$num_questions = mysqli_real_escape_string($conn, $_POST['num_questions']);
		$module_code = mysqli_real_escape_string($conn, $_POST['module_code']);
		$sql_update = "UPDATE tbl_exam SET Exam_date ='$exam_date',Start_time='$start_time',Complete_time='$end_time',Number_of_question='$num_questions',Module_code='$module_code' WHERE ExamId='$exam_id'";
		
		$result_update = mysqli_query($conn, $sql_update);
		if($result_update){
			echo "<script>window.location.href='question_list.php'</script>";
		}else{
			echo "<script>alert('Update failed!')</script>";
		}
	}
?>
