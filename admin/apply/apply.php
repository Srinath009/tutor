<?php include('../conn.php');

session_start();

if(empty($_SESSION['username']) && empty($_SESSION['sid'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id'])){
		$t_id = $_GET['id'];
		$st_id = $_SESSION['sid'];
		// echo $t_id.$st_id;
		$created_at1 = "";
		$created_at1=date('Y-m-d');
		$q = "SELECT * FROM student WHERE id='".$st_id."'";
		$run = mysqli_query($con, $q);
		$row=mysqli_fetch_assoc($run);

		$bids = $row['bids'];

		if(!empty($bids)&& $bids>'0'){
			$bids = --$bids;
			$q = "UPDATE student SET `bids`='$bids' WHERE id='".$st_id."'";
			mysqli_query($con, $q);
				if(!empty($t_id)&& !empty($st_id)){
					$q = "INSERT INTO apply(`st_id`,`t_id`,`created_at`) VALUES('$st_id','$t_id','$created_at1')";
					$run = mysqli_query($con, $q);
					if($run) {
						header('Location: http://localhost/tutor/admin/apply/index.php');
					}else {
						echo "error in data insertion";
					}
				}
		}else {
			echo "<script>alert('Your have not enough bids');</script>";
			header('Location: http://localhost/tutor/index.php');
		}

	}

?>

<?php endif; ?>