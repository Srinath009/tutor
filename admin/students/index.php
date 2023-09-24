<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id'])) {
		$st_id = $_GET['id'];
		$t_id = $_SESSION['tid'];
		$q = "DELETE FROM apply WHERE st_id='$st_id' AND t_id='$t_id'";
		$run = mysqli_query($con, $q);
		if($run) {
			$var = 'Applied Record Deleted Successfully';
			header('refresh:1; url= index.php');
		}else {
			echo "error in data deletion";
		}
	}


?>

<?php include_once('../partials/header.php'); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header text-muted">Students Applied for Tutor</h3>
                <!-- <a href="http://localhost/tutor/admin/apply/create.php" class="btn btn-success btn-xs pull-right">Add Admin</a> <br><br> -->
                <table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>No</th>
							<th>Pic</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Date</th>
							<?php if(!empty($_SESSION['tid'])):?>
							<th>Permission</th>
							<?php endif; ?>
							<?php if(!empty($_SESSION['tid'])):?>
							<th>Course</th>
							<?php endif; ?>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0;

						if(!empty($_SESSION['tid'])){
						  $q="SELECT `st_id` FROM apply WHERE `t_id`='".$_SESSION["tid"]."'";
						}else{
						  $q="SELECT `st_id` FROM apply ";
						}
						$result = mysqli_query($con, $q);
						$a = array();
						
						while($row = mysqli_fetch_assoc($result)):
							$a[] = $row['st_id'];
						endwhile;

						$ids = join("','",$a);
						$q="SELECT * FROM  student WHERE id IN ('$ids') order by created_at";
						
						$result = mysqli_query($con, $q);
						if(mysqli_num_rows($result)>0):
							while($row = mysqli_fetch_assoc($result)): ?>
							<tr>
								<td><?= ++$count?></td>
								<td><img src="http://localhost/tutor/admin/upload/<?=$row['pic']?>" alt="no-pic" class="img-thumbnail" width="80px" height="80px"></td>
								<td><?= $row['username']?></td>
								<td><?= $row['email']?></td>
								<td><?= $row['phone']?></td>
								<td><?= $row['address']?></td>
								<td><?= ($row['gender']=='M')?'Male':'Female';?></td>
								<td><?= substr($row['created_at'],0,11)?></td>

							  <?php if(!empty($_SESSION['tid'])):
									  $q1="SELECT * FROM apply WHERE `t_id`='".$_SESSION["tid"]."' AND `st_id`='".$row['id']."'";
									  $result1 = mysqli_query($con, $q1);
									  $row1 = mysqli_fetch_assoc($result1);?>
								<td>
									<?php if($row1['request']=='A'): echo 'Acitve';
										else: ?>
											<a href="http://localhost/tutor/admin/permission/create.php?id=<?= $row['id']?>" class="btn btn-success btn-sm">Accept</a>
										<?php endif; ?>
								</td>
								<?php if($row1['request']=='A'): ?>
								<td>
									<?php if($row1['status']=='A'): echo 'End';
										else: ?>
											<a href="http://localhost/tutor/admin/permission/create.php?cid=<?= $row['id']?>" class="btn btn-danger btn-sm">Continue</a>
										<?php endif; ?>
								</td>
								<?php else: ?>
								  <td>N/A</td>
								<?php endif; ?>
							  <?php endif; ?>
								<td><a href="?id=<?= $row['id']?>" class="btn btn-danger btn-sm">Reject</a></td>
							</tr>
					<?php endwhile;
						else: ?>
						<tr>
							<td colspan="7">
								<h3>Not Any Data Found.</h3>
							</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../partials/footer.php'); ?>


<?php endif; ?>