<?php
    include('connection.php');
	if(isset($_SESSION['role'])){
		header("location:student_site.php");
	}
	$message = "";
	if(isset($_POST['login'])){
		$query = "SELECT * FROM users WHERE Email = :email";
		$stmt = $conn->prepare($query);
		$stmt->execute(
		      array('email' => $_POST['uname'])
		);
		$count = $stmt->rowCount();
		if($count > 0){
			$results = $stmt->fetchAll();
			foreach($results as $result){
				if($result['Password'] == $_POST['password']){
					$_SESSION['role'] = $result["Role"];
					$_SESSION['username'] = $result["Username"];
					$_SESSION['user_id'] = $result["id"];
					header("location: index.php");
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
      <link rel="stylesheet" href="indestyle.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="jquery-3.5.1.min.js"></script>
      <script src="bootstrap.min.js"></script>
  </head>
  <body>
    
	<div class="container">
	   <h2 align="center">
		  Makh_Mol <span>Health Care</span>
	   </h2>
	   <div class="panel-default">
		     <div class="panel-heading">
		      <h2>
			    LOGIN
			  </h2>
			 </div>
			 <div>
			 
			 </div>
	   <div class="panel-body">
	       <form action="login.php" method="post">
		    <?php echo $message; ?>
		   <div class="form-group">
			  <label for="c_id">Enter Username</label>
			  <input type="text" name="uname"  class="form-control"></br>
			  </div>
			  <div class="form-group">
			  <label for="c_name">Enter Password</label>
			  <input type="password" name="password" class="form-control" ></br>
			  </div>
			  <div class="form-group">
			  <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
			  </div>
			  <p>
			    Not yet a member? <a href="register.php">Register</a>
			  </p>
		   </form>
		   </div>
	   </div>
	</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
