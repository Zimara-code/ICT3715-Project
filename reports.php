<?php
    if(!isset($_SESSION['role'])){
		header("location:login.php");
	}
     include('header.php');
	 $connect = mysqli_connect('localhost', 'root', '', 'exam')or die('Connection failed'. mysql_error());
	 include('reports_function.php');
	 
	 $result = $connect->query("SELECT * FROM `tbl_exam`");
	 $moduleresult = $connect->query("SELECT * FROM `tbl_exam`");
	 $trendresult = $connect->query("SELECT DISTINCT Exam_date FROM `tbl_exam`");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Mis Reports</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="indestyle.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
	  
	  <!--Database-->
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	  <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
	<div class="overlay"><div class="loader"></div></div>
	<div class="container">
    <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Summary Reports 1 (January/February Exam Submission)</h3>
		</div>
		<div class="panel-body">
		   <div class="col-md-3" align="right">
		      <form method="post">
			       <div class="form-group">
			       <select class="form-control" name="exam_date" id="module">
			       <option value="">Select Exam Date</option>
				 <?php
					   while($row = $result->fetch_assoc()){
						  $exam_date = $row['Exam_date'];
						  echo "<option value='$exam_date'>$exam_date</option>";
					  }
				  ?>
				 </select>
				 </div>
				 </div>
				 <input type="submit" name="viewreport1" class="btn btn-primary" value="VIEW REPORT">
			  </form>
		   <div class="col-sm-12 table-responsive">
		       <table id="data-table" class="table table-bordered table-striped">
	       <thead>
		     <tr>
			 <th>Exam Date</th>
			 <th>Number of Student</th>
			 </tr>
		   </thead>
		   <?php
		      if($totRows > 0){
				  foreach($results as $result){
					  echo '
					     <tr>
						    <td>'.$result["Exam Date"].'</td>
							<td>'.$result["Number of Student"].'</td>
						 </tr>
					  ';
				  }
			  }
		   ?>
	   </table>
		   </div>
	     </div>
	  </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Summary Reports 2 (January/February Exam Submission)</h3>
		</div>
		<div class="panel-body">
		<div class="col-md-3" align="right">
		      <form method="post">
			       <div class="form-group">
			       <select class="form-control" name="module" id="module">
			       <option value="">Select module</option>
				 <?php
					   while($row = $moduleresult->fetch_assoc()){
						  $module = $row['Module_code'];
						  $examId = $row['ExamId'];
						  echo "<option value='$examId'>$module</option>";
					  }
				  ?>
				 </select>
				 </div>
		</div>
		<input type="submit" name="viewreport2" class="btn btn-primary" value="VIEW REPORT">
		</form>
		   <div class="col-sm-12 table-responsive">
		    <table id="data-table" class="table table-bordered table-striped">
	       <thead>
		     <tr>
			 <th>Module Code</th>
			 <th>Number Of Students</th>
			 </tr>
		   </thead>
		   <?php
		      if($totRows1 > 0){
				  foreach($results1 as $result1){
					  echo '
					     <tr>
						    <td>'.$result1["Module Code"].'</td>
							<td>'.$result1["Number of Student"].'</td>
						 </tr>
					  ';
				  }
			  }
		   ?>
	   </table>
		   </div>
	     </div>
	  </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Trend Report</h3>
		</div>
		<div class="panel-body">
		   <div class="col-sm-12 table-responsive">
		    <table id="data-table" class="table table-bordered table-striped">
	       <thead>
		     <tr>
			 <th>Module Code</th>
			 <th>Weeks</th>
			 </tr>
		   </thead>
		   <?php
		      if($totRows1 > 0){
				  foreach($results2 as $result2){
					  echo '
					     <tr>
						    <td>'.$result2["Module_code"].'</td>
							<td>'.date('Y-m-d').'</td>
						 </tr>
					  ';
				  }
			  }
		   ?>
	   </table>
		   </div>
	     </div>
	  </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel panel-default">
	    <div class="panel panel-heading">
		<h3>Prediction Report</h3>
		</div>
		<div class="panel-body">
		   <div class="col-sm-12 table-responsive">
		    <table id="data-table" class="table table-bordered table-striped">
	       <thead>
		     <tr>
			 <th>Year</th>
			 <th>Number Of Students</th>
			 </tr>
		   </thead>
		   <?php
		      if($tot_ord > 0){
				  foreach($ord_results as $ord_result){
					  echo '
					     <tr>
						    <td>'.$ord_result["YEAR"].'</td>
							<td>'.$ord_result["NUMBER OF STUDENTS"].'</td>
						 </tr>
					  ';
				  }
			  }
		   ?>
	   </table>
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
				   url:"fetch_orders.php",
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
				url:"edit_suppliers.php",
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
		 $(document).on('click', '#getEdit', function(e){
			e.preventDefault();
			var per_id=$(this).data('id');
			$('#content-data').html('');
			$.ajax({
				url:"edit_suppliers.php",
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
  </body>
</html>
