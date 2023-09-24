<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$q = "DELETE FROM apply WHERE id='$id'";
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
                <h3 class="page-header text-success">Applied for Tutor</h3>
                <table class="table table-bordered table-hover table-responsive">
					<thead>
						<tr>
							<th>No</th>
							<?php if(empty($_SESSION['sid'])): ?>
							  <th>Student</th>
							<?php else: ?>
							  <th>Pic</th>
							<?php endif; ?>
							<th>Teacher</th>
							<th>Subject</th>
							<th>Date</th>
							<th>Request</th>
							<?php if(!empty($_SESSION['sid']) || !empty($_SESSION['aid'])):?>
							<th>Course</th>
							<?php endif; ?>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0;
						if (!empty($_SESSION['sid'])) {
							$q="SELECT *,
								(SELECT pic FROM teacher WHERE id=apply.t_id)AS tpic,
								(SELECT id FROM teacher WHERE id=apply.t_id)AS tid,
								(SELECT username FROM teacher WHERE id=apply.t_id)AS tname,
								(SELECT s_id FROM teacher WHERE id=apply.t_id)AS s_id 
								FROM apply WHERE st_id = '".$_SESSION['sid']."'";
						}else{
							$q="SELECT *,
								(SELECT username FROM student WHERE id=apply.st_id)AS sname,
								(SELECT id FROM teacher WHERE id=apply.t_id)AS tid,
								(SELECT username FROM teacher WHERE id=apply.t_id)AS tname,
								(SELECT s_id FROM teacher WHERE id=apply.t_id)AS s_id 
								FROM apply";
						}
						$result = mysqli_query($con, $q);
						if(mysqli_num_rows($result)>0):
							while($row = mysqli_fetch_assoc($result)): ?>
							<tr>
								<td><?= ++$count?></td>
								<?php if(!empty($row['tpic'])): ?>
								  <td><img src="http://localhost/tutor/admin/upload/<?=$row['tpic']?>" alt="no-pic" class="img-thumbnail" width="80px" height="80px"></td>
								<?php else: ?>
								  <td><?= $row['sname']?></td>
								<?php endif; ?>
								<td><a href="http://localhost/tutor/admin/teacher/show.php?id=<?= $row['tid']?>" class="text-danger"><u><?= $row['tname']?></u></a></td>
								<?php 
									$q = "SELECT * FROM subject WHERE id='".$row['s_id']."'";
									$run = mysqli_query($con, $q);
									$value=mysqli_fetch_assoc($run);
								 ?>
								<td><?= $value['name']?></td>
								<td><?= substr($row['created_at'],0,11)?></td>
								<td><?= ($row['request']=='A')?'Accepted':'Send';?></td>
								<?php if($row['status']=='A'): ?>
								  <td><?= ($row['status']=='A')?'End':'Continue';?></td>
								<?php else: ?>
								  <td>N/A</td>
								<?php endif; ?>
								<td>
								  <?php if($row['status']=='A' || !empty($_SESSION['aid'])): ?>
								  	<?php 
								  	  $rank_query = "SELECT * FROM teacher WHERE id='".$row['tid']."'";
									  $rank = mysqli_query($con, $rank_query);
									  $give=mysqli_fetch_assoc($rank);
									  if(empty($give['ranks']) || $give['ranks'] == NULL): ?>
										<a href="http://localhost/tutor/admin/apply/ranks.php?id=<?= $row['tid']?>" class="btn btn-primary btn-sm">Ranks</a> |
									  <?php endif; ?>
								  <?php endif; ?>
									 <a href="?id=<?= $row['id']?>" class="btn btn-success btn-sm">Delete</a>
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