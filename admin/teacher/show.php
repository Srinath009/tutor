<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];

		$q = "SELECT * FROM teacher WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($result=mysqli_fetch_assoc($run)) {
			$id = $result['id'];
			$pic = $result['pic'];
			$doc = $result['doc'];
			$username = $result['username'];
			$email = $result['email'];
			$password = $result['password'];
			$phone = $result['phone'];
		    $address = $result['address'];
		    $gender = $result['gender'];
		    $cnic = $result['cnic'];
		    $qf = $result['qualification'];
		    $price = $result['price'];
			$batch = $result['batch'];
			$ranks = $result['ranks'];
			$date = $result['created_at'];
		    $s_id = $result['s_id'];

			$subject_query = "SELECT * FROM subject WHERE id='$s_id'";
			$value = mysqli_query($con, $subject_query);
			$subject=mysqli_fetch_assoc($value);
			$subject_name = $subject['name'];
		}else {
			echo "error in data editing";
		}
	}


?>

<?php include_once('../partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-muted"></h3>
                <div class="panel panel-default">
				  <div class="panel-heading"><b>Teacher Record</b></div>
				  <div class="panel-body">
				  	<div class="row">
				  		<div class="col-md-9">
						  Name: <b><?=ucwords($username)?></b><br><br>
						  <?php if(!empty($_SESSION['tid'])): ?>
						  	Document: <b>
						  	<a href="<?= 'http://localhost/tutor/admin/document/'.$doc ?>" target="_blank" ><?= $doc ?></a>
						  	</b><br><br>
						  <?php endif; ?>
						  Email: <b> <?= $email?></b><br><br>
						  Phone: <b> <?= $phone?></b><br><br>
						  Address: <b> <?= $address?></b><br><br>
						  Gender: <b> <?= ($gender=='M')?'Male':'Female';?></b><br><br>
						  CNIC: <b> <?= $cnic?></b><br><br>
						  Qualification: <b> <?= $qf?></b><br><br>
						  Subject: <b> <?= ucwords($subject_name)?></b><br><br>
						  Price: <b> <?= $price?></b><br><br>
						  Batch: <b> <?= ($batch=='M')?'Morning':'Evening';?></b><br><br>
						  Ranks: <b> <?= ($ranks!='')?$ranks:'0';?></b><br><br>
						  Date: <b> <?= $date?></b><br><br>

						  <?php if(!empty($_SESSION['tid']) || !empty($_SESSION['aid'])): ?>
							<a href="http://localhost/tutor/admin/teacher/update.php?id=<?= $id?>" class="btn btn-success btn-sm">Edit</a>
						  <?php endif ?>

				  		</div>
				  		<div class="col-md-3">
				  			<img src="http://localhost/tutor/admin/upload/<?=$pic?>" alt="no-pic" class="img-thumbnail" width="200px" height="200px">
				  		</div>
				  	</div>
					
				  </div>
				</div>
				
            </div>
        </div>
    </div>
</div>

<?php include_once('../partials/footer.php'); ?>


<?php endif; ?>