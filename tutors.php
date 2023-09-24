<?php include('conn.php');

session_start();

if(empty($_SESSION['username'])):
  header('Location: http://localhost/tutor/admin/login.php');
else:

?>

<?php 
  if (empty($_SESSION['username'])){
    session_start(); 
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Tutor</title>
  
  <link rel="stylesheet" type="text/css" href="asset/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/style.css">

</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Tu<span>tor</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
      <?php
           if(!empty($_SESSION['username'])): ?>
          <li><a href="admin/logout.php">Logout</a></li>
          <li class="btn-trial"><a href="admin/dashboard.php">Dashboard</a></li>
      <?php else: ?>
          <li><a href="admin/login.php">Sign in</a></li>
          <li class="btn-trial"><a href="admin/registerS.php">Sign up</a></li>
      <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  
  <section id="faculity-member" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="row">
          <div class="col-md-12">
            <div class="header-section text-center">
              <h2>All Tutors</h2>
              <hr class="bottom-line">
            </div>
          </div>
          <div class="col-md-4 col-lg-offset-4">
            <form action="" method="post">
              <div class="input-group">
                <select name="subject" style="height: 42px; width: 250px; padding: 6px 12px; background-color: #fff; background-image: none; border: 1px solid #ccc; border-radius: 4px;">
                <?php $q = "SELECT * FROM subject";
                  $result = mysqli_query($con, $q);
                  if(mysqli_num_rows($result)>0):
                    while($row = mysqli_fetch_assoc($result)): ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                    endwhile;
                  endif; ?>
                </select>
                <button type="submit" name="search" class="btn btn-success btn-sm">Search</button>
              </div>
            </form>
          </div>
        </div><br>
    <?php 
      if(isset($_POST['search']) && isset($_POST['subject'])) {
        $subject = $_POST['subject'];
        $q = "SELECT *,(SELECT name FROM subject WHERE id=teacher.s_id)AS subject FROM teacher WHERE s_id = ".$subject."  ORDER BY id DESC";
      } else {
        $q = "SELECT *,(SELECT name FROM subject WHERE id=teacher.s_id)AS subject FROM teacher ORDER BY id DESC";
      }
      $result = mysqli_query($con, $q);
      if(isset($result) && mysqli_num_rows($result)>0):
        while($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="http://localhost/tutor/admin/upload/<?=$row['pic']?>" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">
                <a href="http://localhost/tutor/admin/teacher/show.php?id=<?= $row['id']?>"><?= $row['username']?></a>
              </p>
              <p class="pm-staff-profile-title"><?= $row['qualification']?></p>

              <p class="pm-staff-profile-bio">Expertise in <b><?= $row['subject']?></b> </p>
              <p><a href="http://localhost/tutor/admin/apply/apply.php?id=<?= $row['id']?>" class="btn btn-success btn-sm">Apply Link</a></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php else: ?>
        <h2 class="text-center">Not found any record.</h2>
      <?php endif; ?>
      </div>
    </div>
  </section>

  <footer id="footer" class="footer">
    <div class="container text-center">

      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©<?=date('Y')?> All rights reserved
      <div class="credits">
        Developed by: <a href="#">IT Students</a>
      </div>
    </div>
  </footer>
  <!--/ Footer-->

<?php include_once('inc/footer.php') ?>
<?php endif; ?>