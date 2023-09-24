<?php include('conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: login.php');
else:



 ?>
<?php include_once('partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-success">Dashboard</h3>

                <?php $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM subject");
					$data=mysqli_fetch_assoc($result); ?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3 class="text-primary"> Total Subjects <span class="label label-primary pull-right"><?= $data['total']?></span></h3><br>
				        <p>All defined Subjects </p>
				      </div>
				    </div>
				  </div>
	
				<?php $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM student");
					$data=mysqli_fetch_assoc($result); ?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3 class="text-success"> Total Students <span class="label label-success pull-right"><?= $data['total']?></span></h3><br>
				        <p>Registered students in app </p>
				      </div>
				    </div>
				  </div>
				
				<?php $result = mysqli_query($con, "SELECT COUNT(*) AS 'total' FROM teacher");
					$data=mysqli_fetch_assoc($result); ?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3 class="text-info"> Total Teachers <span class="label label-info pull-right"><?= $data['total']?></span></h3><br>
				        <p>Registered teachers in app </p>
				      </div>
				    </div>
				  </div>

				</div>
            </div>
        </div>
    </div>
</div>

<?php include_once('partials/footer.php'); ?>


<?php endif; ?>