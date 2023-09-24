<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = "DELETE FROM student WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($run) {
			$var = 'Student Deleted Successfully';
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
                <h3 class="page-header text-success">Student</h3>
                <?php if (isset($var)): ?>
					<span class="text-success"><?= $var?></span> <br>
				<?php endif ?>
                <a href="http://localhost/tutor/admin/student/create.php" class="btn btn-success btn-xs pull-right">Add student</a> <br><br>
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
							<th>Unique Id</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0;
						$q = "SELECT * FROM student";
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
								<td><?= $row['cnic']?></td>
								<td><?= substr($row['created_at'],0,11)?></td>
								<td>
									<a href="http://localhost/tutor/admin/student/edit.php?id=<?= $row['id']?>" class="btn btn-success btn-sm">edit</a> | 
									<a href="?id=<?= $row['id']?>" class="btn btn-default btn-sm">delete</a>
								</td>
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