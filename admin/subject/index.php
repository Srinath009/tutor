<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = "DELETE FROM subject WHERE id='$id'";
		$run = mysqli_query($con, $q);
		if($run) {
			$var = 'Subject Deleted Successfully';
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
                <h3 class="page-header text-success">subject</h3>
                <?php if (isset($var)): ?>
					<span class="text-success"><?= $var?></span> <br>
				<?php endif ?>
                <a href="http://localhost/tutor/admin/subject/create.php" class="btn btn-success btn-xs pull-right">Add Subject</a> <br><br>
                <table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0;
						$q = "SELECT * FROM subject";
						$result = mysqli_query($con, $q);
						if(mysqli_num_rows($result)>0):
							while($row = mysqli_fetch_assoc($result)): ?>
							<tr>
								<td><?= ++$count?></td>
								<td><?= $row['name']?></td>
								<td><?= substr($row['created_at'],0,11)?></td>
								<td>
									<a href="http://localhost/tutor/admin/subject/edit.php?id=<?= $row['id']?>" class="btn btn-success btn-sm">edit</a> | 
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