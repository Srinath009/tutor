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

	  $name = $created_at = "";
	  $v_name = "";
	  $error_name = "";

		$name = test_input($_POST['username']);

		if(empty($name)) {
			$error_name = 'Name field require some value';
			$name = "";
		} else {
			$v_name = $name;
		}

		$created_at=date('Y-m-d');

		if(!empty($v_name)){
			$q = "INSERT INTO subject(`name`,`created_at`) VALUES('$v_name','$created_at')";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/subject/index.php');
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
        <h3 class="page-header">Create Subject Record</h3>
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