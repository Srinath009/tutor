<?php include('../conn.php');

session_start();

function test_input($data) {
	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_POST['submit'])) {

	  $name = $email = $password = $address = $created_at = "";
	  $v_name = $v_email = $v_password = $v_address ="";
	  $error_name = $error_email = $error_password = $error_address = "";

		$name = test_input($_POST['username']);
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);	
		$address = test_input($_POST['address']);		

		if(empty($name)) {
			$error_name = 'Name field require some value';
			$name = "";
		} else {
			$v_name = $name;
		}

		if(empty($email)) {
			$error_email = 'Email field require some value';
			$email = "";
		} else {
			$v_email = $email;
		}

		if(empty($password)) {
			$error_password = 'Password field require some value';
			$password = "";
		} else {
			$v_password = $password;
		}

		if(empty($address)) {
			$error_address = 'Address field require some value';
			$address = "";
		} else {
			$v_address = $address;
		}

		$created_at=date('Y-m-d');

		if(!empty($v_name)&& !empty($v_email)&& !empty($v_password)&& !empty($v_address)){
			$q = "INSERT INTO admins(`username`,`email`,`password`,`address`,`role_id`,`created_at`) VALUES('$v_name','$v_email','$v_password','$v_address','1','$created_at')";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/admins/index.php');
			}else {
				echo "error in data insertion";
			}
		}
	}

?>

<?php include_once('../partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">Create New Admin Record</h3>
        <form action="" method="POST" class="form">

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="username" placeholder="name..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_name)): ?>
					<span class="text-danger"><?= $error_name ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Email:</label>
        		<input type="email" name="email" placeholder="email..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_email)): ?>
					<span class="text-danger"><?= $error_email ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Password:</label>
        		<input type="text" name="password" placeholder="password..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_password)): ?>
					<span class="text-danger"><?= $error_password ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Address:</label>
        		<textarea name="address" cols="10" rows="5" placeholder="address..." class="form-control" required=""></textarea>
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_address)): ?>
					<span class="text-danger"><?= $error_address ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6 col-md-offset-4">
	          <button type="reset" class="btn btn-default">Cancel</button>
	          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          	</div>
          </div>

        </form>
        <br><br>
      </div>
    </div>
  </div>
</div>

<?php include_once('../partials/footer.php'); ?>

<?php endif; ?>