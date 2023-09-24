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
        <a class="navbar-brand" href="index.php">Tutor</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Features</a></li>
          <li><a href="#organisations">Organisations</a></li>
          <li><a href="#faculity-member">Tutors</a></li>
          <!-- <li><a href="#courses">Courses</a></li> 
          <li><a href="#contact">Contact us</a></li>
          <li><a href="#pricing">Pricing</a></li> -->
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