<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = "SELECT ranks FROM teacher WHERE id='$id'";
		$run = mysqli_query($con, $q);
		$result=mysqli_fetch_assoc($run);
		$n = $result['ranks'];
	}

	if(isset($_POST['submit'])) {
		if(isset($_POST['ranks'])){
			$ranks = $_POST['ranks'];
			$count = count($ranks);

			$n = $n+$count;

			$q = "UPDATE teacher SET `ranks`='$n' WHERE `id`='$id'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/apply/index.php');
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
                <h3 class="page-header text-success">Give Ranks for Tutor</h3>
                <form action="" method="POST" class="form">

		          <div class="row">
		          	<div class="col-md-6">
			          <div class="form-group">
		        		<label for="">Ranks:</label><br><br>
		        		<input type="checkbox" name="ranks[]">
		        		<input type="checkbox" name="ranks[]">
		        		<input type="checkbox" name="ranks[]">
		        		<input type="checkbox" name="ranks[]">
		        		<input type="checkbox" name="ranks[]">
			          </div>	
		          	</div>
		          	<div class="col-md-6"></div>
		          </div><br>
		          <div class="row">
		          	<div class="col-md-6">
			          <button type="submit" name="submit" class="btn btn-success">Submit</button>
		          	</div>
		          </div>
		        </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('../partials/footer.php'); ?>


<?php endif; ?>