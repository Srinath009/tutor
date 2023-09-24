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

	  $name = $email = $password = $phone = $address = $gender = $cnic = $created_at = "";
	  $v_name = $v_email = $v_password = $v_phone = $v_address = $v_cnic ="";
	  $error_name = $error_email = $error_password = $error_phone = $error_address = $error_cnic = $error_pic = "";

	  	$name = test_input($_POST['username']);
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);		
		$phone = test_input($_POST['phone']);		
		$address = test_input($_POST['address']);
		$gender = test_input($_POST['gender']);
		$cnic = test_input($_POST['cnic']);	

	  	$f_name=$_FILES['myfile']['name'];
		$f_tmp=$_FILES['myfile']['tmp_name'];
		$f_size=$_FILES['myfile']['size'];
		$f_ext=explode('.', $f_name);
		$f_exten=strtolower(end($f_ext));
		$f_new=uniqid().'.'.$f_exten;
		$store="../upload/".$f_new;
		if($f_exten=='jpg' || $f_exten=='png' ||$f_exten=='gif'){
			if($f_size>=1000000){
				$error_pic = 'file is heavy';
			}else{
				move_uploaded_file($f_tmp, $store);
			}
		}else{
			$error_pic = 'file should be jpg, png, gif';
		}

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

		if(empty($phone)) {
        $error_phone = 'Phone field require some value';
        $phone = "";
	    } else {
	        if(!is_numeric($phone)){
	            $error_phone = 'Phone field require numeric value';
	            $phone = "";
	        }else{
	            $v_phone = $phone;
	        }
	    }

		if(empty($address)) {
			$error_address = 'Address field require some value';
			$address = "";
		} else {
			$v_address = $address;
		}

		if(empty($cnic)) {
        $error_cnic = 'CNIC field require some value';
        $cnic = "";
	    } else {
	        if(!is_numeric($cnic)){
	            $error_cnic = 'CNIC field require numeric value';
	            $cnic = "";
	        }else{
	            $v_cnic = $cnic;
	        }
	    }

		$created_at=date('Y-m-d');

		if(!empty($v_name)&& !empty($f_new)&& !empty($v_email)&& !empty($v_password)&& !empty($v_phone)&& !empty($v_address)&& !empty($v_cnic)){
			$q = "INSERT INTO student(`username`,`pic`,`email`,`password`,`phone`,`address`,`gender`,`cnic`,`role_id`,`created_at`) VALUES('$v_name','$f_new','$v_email','$v_password','$v_phone','$v_address','$gender','$v_cnic','3','$created_at')";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/student/index.php');
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
        <h3 class="page-header">Create Student Record</h3>
        <form action="" method="POST" class="form" enctype="multipart/form-data">

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
        		<label for="">Picture:</label>
        		<input type="file" name="myfile" class="form-control" required="">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_pic)): ?>
					<span class="text-danger"><?= $error_pic ?></span>
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
        		<label for="">Phone:</label>
        		<input type="text" name="phone" placeholder="phone..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_phone)): ?>
					<span class="text-danger"><?= $error_phone ?></span>
				<?php endif ?>
          	</div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Gender: </label><br>
        		<label for="">
        			Male <input type="radio" name="gender" value="M" required="">
        		</label>
        		<label for="">
        			Female <input type="radio" name="gender" value="F" required="">
        		</label>
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">CNIC:</label>
        		<input type="text" name="cnic" placeholder="cnic..." class="form-control" required="" autocomplete="off">
	          </div>	
          	</div>
          	<div class="col-md-6">
          		<?php if (!empty($error_cnic)): ?>
					<span class="text-danger"><?= $error_cnic ?></span>
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