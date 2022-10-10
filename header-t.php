<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Online Examination</title>
	  <link rel="stylesheet" href="style.css" type="text/css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="jumbotron text-center" style="margin-bottom:0; padding:1rem 1rem;">
	    <img src="online-1595890229.jpg" class="img-fluid" width="300">
	</div>
	<nav class="navbar navbar-inverse">
	       <div class="container-fluid">
		      <div class="navbar-header">
			   <?php
				   if($_SESSION['role'] == "Student"){  
                 ?>
			      <a href="student_site.php"><i class="fa fa-desktop" aria-hidden="true"></i><span>Students</span></a>
			      <a href="enroll.php"><i class="fa fa-plus" aria-hidden="true"></i><span>Enroll</span></a>
			        <?php
				   }
				   ?>
			  </div>
			  <ul class="nav navbar-nav">
				   <?php
				   if($_SESSION['role'] == "Admin"){
					  
                 ?>
				   <li><a href="reports.php"><i class="fa fa-plus" aria-hidden="true"></i><span>Reports</span></a></li>
				   <li><a href="exam_list.php"><i class="fa fa-eye" aria-hidden="true"></i><span>Exam</span></a></li>
				   <li><a href="add.php"><i class="fa fa-eye" aria-hidden="true"></i><span>Questions</span></a></li>
				   <?php				 
				   }
				?>
				<li><a href="logout.php">Logout</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			        <li class="dropdown">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="label label-pill label-danger count"><?php echo $_SESSION['username']; ?></span></a>
					   <ul class="dropdown-menu">
					     <li><a href="profile.php">Profile</a></li>
			             <li><a href="logout.php">Logout</a></li>
					   </ul>
					</li>
					
			  </ul>
		   </div>
	   </nav>
	
	   
	
  
  
