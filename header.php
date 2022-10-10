<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Inventory Management System</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
	  <!--Database-->
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	  <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
	   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	   <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	  <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
	  <script type="text/javascript" src="order.js"></script>
  </head>
  <body>
    
	<div class="container">
	   <h2 align="center">
		 Makh_Mol <span>Health Care</span>
	   </h2>
	   <nav class="navbar navbar-inverse">
	       <div class="container-fluid">
		      <div class="navbar-header">
                          <?php
				   if($_SESSION['role'] == "Student"){
					  
                 ?>
			     <a href="student_site.php" class="navbar-brand">Home</a>
				 <a href="enroll.php" class="navbar-brand">Clients</a>
                          <?php
}
?>
			  </div>
			  <ul class="nav navbar-nav">
			    <?php
				   if($_SESSION['role'] == "Admin"){
					  
                 ?>
			       <li><a href="exam_list.php"><span>Daily Reports</span></a></li>
				   <li><a href="question_list.php"><span>Mis Reports</span></a></li>
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
	</div>
  <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->
  </body>
