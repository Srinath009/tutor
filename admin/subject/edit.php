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

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];

		$q = "SELECT * FROM subject WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($result=mysqli_fetch_assoc($run)) {
			$id = $result['id'];
			$name = $result['name'];
		}else {
			echo "error in data editing";
		}
	}

	if(isset($_POST['update'])) {

	  $v_name = "";

		$v_name = test_input($_POST['name']);
		
		if(!empty($v_name)){
			$q = "UPDATE subject SET `name`='$v_name' WHERE `id`='$id'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/subject/index.php');
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
        <h3 class="page-header">Edit Admin Record</h3>
        <form action="" method="POST" class="form">
		  <input type="hidden" name="id" value="<?= $id?>">
          <div class="row">
          	<div class="col-md-6">
	          <div class="form-group">
        		<label for="">Name:</label>
        		<input type="text" name="name" placeholder="name..." class="form-control" required="" autocomplete="off" value="<?= $name?>">
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