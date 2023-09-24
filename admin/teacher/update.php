<?php include('../conn.php');

session_start();

function test_input($data) {
	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tuto/admin/login.php');
else:

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];

		$q = "SELECT * FROM teacher WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($result=mysqli_fetch_assoc($run)) {
			$id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			$password = $result['password'];
			$phone = $result['phone'];
      $address = $result['address'];
      $gender = $result['gender'];
      $cnic = $result['cnic'];
      $qf = $result['qualification'];
      $s_id = $result['s_id'];
      $price = $result['price'];
			$batch = $result['batch'];
		}else {
			echo "error in data editing";
		}
	}

	if(isset($_POST['update'])) {

	  $v_username = $v_email = $v_password = $v_phone = $v_address = $v_cnic = $v_qf = $v_price="";

		$v_username = test_input($_POST['username']);
		$v_email = test_input($_POST['email']);
		$v_password = test_input($_POST['password']);
		$v_phone = test_input($_POST['phone']);
    $v_address = test_input($_POST['address']);
    $gender = $_POST['gender'];
    $v_cnic = test_input($_POST['cnic']);
    $v_qf = test_input($_POST['qf']);
    $s_id = $_POST['s_id'];
    $v_price = test_input($_POST['price']);
    $batch = $_POST['batch'];
		
		if(!empty($v_username)&& !empty($v_email)&& !empty($v_password)&& !empty($v_phone)&& !empty($v_address)&& !empty($v_cnic)){
			$q = "UPDATE teacher SET `username`='$v_username',`email`='$v_email',`password`='$v_password',`phone`='$v_phone',`address`='$v_address',`gender`='$gender',`cnic`='$v_cnic',`qualification`='$v_qf',`s_id`='$s_id',`price`='$v_price',`batch`='$batch' WHERE `id`='$id'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/logout.php');
			}else {
				echo "error in data updating";
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
        <h3 class="page-header">Edit Teacher Record</h3>
        <form action="" method="POST" class="form">
		  <input type="hidden" name="id" value="<?= $id?>">
          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="username" placeholder="name..." class="form-control" required="" autocomplete="off" value="<?= $username?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Email:</label>
        		<input type="email" name="email" placeholder="email..." class="form-control" required="" autocomplete="off" value="<?= $email?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Password:</label>
        		<input type="text" name="password" placeholder="password..." class="form-control" required="" autocomplete="off" value="<?= $password?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Phone:</label>
        		<input type="text" name="phone" placeholder="phone..." class="form-control" required="" autocomplete="off" value="<?= $phone?>">
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Address:</label>
        		<textarea name="address" cols="10" rows="5" placeholder="address..." class="form-control" required=""><?= $address?></textarea>
	          </div>	
          	</div>
          	<div class="col-md-6"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Gender: </label><br>
                <label for="">
                  Male <input type="radio" name="gender" value="M" required="" <?= ($gender=='M')?'checked':'';?> >
                </label>
                <label for="">
                  Female <input type="radio" name="gender" value="F" required="" <?= ($gender=='F')?'checked':'';?> >
                </label>
              </div>  
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label for="">CNIC:</label>
            <input type="text" name="cnic" placeholder="cnic..." class="form-control" required="" autocomplete="off" value="<?= $cnic?>">
            </div>  
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label for="">Qualification:</label>
            <input type="text" name="qf" placeholder="qualification..." class="form-control" required="" autocomplete="off" value="<?= $qf?>">
            </div>  
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label for="">Subject:</label>
            <select name="s_id" class="form-control" required="" autocomplete="off">
              <option>select subject</option>
            <?php 
              $q="SELECT * FROM subject";
              $result = mysqli_query($con, $q);
              while($row=mysqli_fetch_assoc($result)):
             ?>
              <option value="<?= $row['id'] ?>" <?= ($s_id==$row['id'])?'selected':'';?> ><?= $row['name'] ?></option>
            <?php 
              endwhile;
             ?>
            </select>
            </div>  
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label for="">fee price:</label>
            <input type="text" name="price" placeholder="price..." class="form-control" required="" autocomplete="off" value="<?= $price?>">
            </div>  
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Timing: </label><br>
                <label for="">
                  Morning <input type="radio" name="batch" value="M" required="" <?= ($batch=='M')?'checked':'';?> >
                </label>
                <label for="">
                  Evening <input type="radio" name="batch" value="E" required="" <?= ($batch=='E')?'checked':'';?> >
                </label>
              </div>  
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="row">
          	<div class="col-md-6 col-md-offset-4">
	          <button type="submit" name="update" class="btn btn-success">Update</button>
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