<?php 
include 'conn.php';

session_start();

function test($data)
{	$data =htmlspecialchars($data);
	$data =trim($data);
	$data =stripcslashes($data);
	return $data;
}
if(isset($_POST['signin'])):
	$u=test($_POST['username']);
	$p=test($_POST['password']);

	$q1="SELECT * FROM admins WHERE `username` = '$u' AND `password` = '$p'";
	$q2="SELECT * FROM teacher WHERE `username` = '$u' AND `password` = '$p'";
	$q3="SELECT * FROM student WHERE `username` = '$u' AND `password` = '$p'";

	$result1=mysqli_query($con,$q1);
	$result2=mysqli_query($con,$q2);
	$result3=mysqli_query($con,$q3);
	
	if($value1=mysqli_fetch_assoc($result1)){
		$_SESSION['aid']=$value1['id'];
		$_SESSION['username']=$value1['username'];
		$_SESSION['role_id']=$value1['role_id'];
		header('location: dashboard.php');

	}elseif ($value2=mysqli_fetch_assoc($result2)) {
		$_SESSION['tid']=$value2['id'];
		$_SESSION['username']=$value2['username'];
		$_SESSION['role_id']=$value2['role_id'];
		header('location: dashboard.php');

	}elseif ($value3=mysqli_fetch_assoc($result3)) {
		$_SESSION['sid']=$value3['id'];
		$_SESSION['username']=$value3['username'];
		$_SESSION['role_id']=$value3['role_id'];
		header('location: dashboard.php');

	}else{
		$error = 'Invalid Username/Password';
        $username = "";
        $password = "";
        header('refresh:1, http:login.php');
	}

endif;

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tutor || Login</title>
 	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
 </head>
 <body style="background-image:url('partials/asset/img/bgs.jpg');background-size:cover; ">
    <div class="container" style="margin-top:10%;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading text-center">
                        <b><a href="http://localhost/tutor/index.php" class="panel-title">Tutor</a></b>
                    </div>
                    <div class="panel-body">
                    	<form action="" method="POST" class="form">
						 	<fieldset>
						 		<p class="text-muted text-center">Sign in to start your session</p>
						 		<?php if (!empty($error)): ?>
			                        <p class="text-center text-danger"><?= $error ?></p>
			                    <?php endif ?>
						 		<div class="form-group">
							 		<input type="text" class="form-control" name="username" placeholder="username...">
						 		</div>
						 		<div class="form-group">				 		
						 			<input type="password" class="form-control" name="password" placeholder="password...">
						 		</div>
						 		<div class="form-group">
							 		<input type="submit" class="btn btn-success btn-lg btn-block" name="signin" value="signin">
						 		</div>
						 		<div>
							 		<a href="registerS.php" class="text-info">Register as Student</a><br>
							 		<a href="registerT.php" class="text-info">Register as Teacher</a>
							 	</div>
						 	</fieldset>
						</form>
			 		</div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="partials/asset/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="partials/asset/js/getbootstrap.min.js"></script>
</body>
</html>