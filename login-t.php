<?php
    include('connection.php');
	if(isset($_SESSION['role'])){
	   header("location:student_site.php");
	}
	$message = "";
	if(isset($_POST['student-login'])){
		$query = "SELECT * FROM users WHERE Email = :email";
		$stmt = $conn->prepare($query);
		$stmt->execute(
		      array('email' => $_POST['uname'])
		);
		$count = $stmt->rowCount();
		if($count > 0){
			$results = $stmt->fetchAll();
			foreach($results as $result){
				if($result['Password'] == $_POST['student-password']){
					$_SESSION['role'] = $result["Role"];
					$_SESSION['username'] = $result["Username"];
					$_SESSION['user_id'] = $result["id"];
					echo $_SESSION['role'];
				    header("location: student_site.php");
					
				}else{
					$message = "<label>Wrong Password</label>";
				}
			}
		}else{
			$message = "<label>Wrong email address</label>";
		}
		
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  </head>
  <body>
    <div class="jumbotron text-center" style="margin-bottom:0; padding:1rem 1rem;">
	    <img src="online-1595890229.jpg" class="img-fluid" width="300">
	</div>
	<div class="container">
	   <div class="row">
	       <div class="col-md-3">
		       <?php
			        echo $message;
			   ?>
		   </div>
		   <div class="col-md-6" style="margin-top:24px;">
		      <span id="message"></span>
			  <div class="card">
		     <div class="card-header">LOGIN</div>
			 <div>
			 
			 </div>
	        <div class="card-body">
	            <form method="post" id="student-login-form" action="login.php">
				 <?php echo $message; ?>
		           <div class="form-group">
			       <label for="c_id">Enter Email</label>
			       <input type="text" name="uname" class="form-control" id="student-email-address" data-parsley-checkemail data-parsley-checkemail-message="Email address already exists"></br>
			       </div>
			       <div class="form-group">
			       <label for="c_name">Enter Password</label>
			       <input type="password" name="student-password" class="form-control" id="student-password"></br>
			       </div>
				   <div class="form-group">
				    <input type="hidden" name="page" class="form-control" value="login"></br>
				    <input type="hidden" name="action" class="form-control" value="login"></br>
					<input type="submit" name="student-login" class="btn btn-info" value="LOGIN">
			       </div>
		         </form>
		   </div>
	       </div>
		   </div>
	   </div>
	</div>
 
  </body>
  </html>
  <script>
     $(document).ready(function (){
		 $('#student-login-form').parsley();
		 $('#student-login-form').on('submit', function event(){
			event.preventDefault();
            $('#student-email-address').attr('required', 'required');
            $('#student-password').attr('required', 'required');
            if($('#student-login-form').parsley().validate()){
               $.ajax({
				   url:'ajax_action.php',
				   method:'POST',
				   data:$(this).serialize(),
				   dataType:'json',
				   beforeSend:function(){
					  $('#student-login').attr('disabled', 'disabled');
					  $('#student-login').val('Please wait...');
				   },
				   success:function(data){
					   if(data.success){
						   location.href='index.php';
					   }else{
						   $('#message').html('<div class="alert alert-danger">'+data.error+'>/div>')
					   }
					   $('#student-login').attr('disabled', false);
					   $('#student-login').val('LOGIN');
				   }
			   });
			}				
		 });
	 });
  </script>
