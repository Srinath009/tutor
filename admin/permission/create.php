<?php include('../conn.php');

session_start();

if(empty($_SESSION['username'])):
	header('Location: http://localhost/tutor/admin/login.php');
else:

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$tid = $_SESSION["tid"];

		if(!empty($id)&& !empty($tid)){
			$q = "UPDATE apply SET `request`='A' WHERE `st_id`='$id' AND `t_id`='$tid'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/students/index.php');
			}else {
				echo "error in data updating";
			}
		}
	}

	if(isset($_GET['cid']))
	{
		$cid = $_GET['cid'];
		$tid = $_SESSION["tid"];

		if(!empty($cid)&& !empty($tid)){
			$q = "UPDATE apply SET `status`='A' WHERE `st_id`='$cid' AND `t_id`='$tid'";
			$run = mysqli_query($con, $q);
			if($run) {
				header('Location: http://localhost/tutor/admin/students/index.php');
			}else {
				echo "error in data updating";
			}
		}
	}

endif;
?>