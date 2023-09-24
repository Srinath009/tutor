<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutor || Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/tutor/admin/partials/asset/css/getbootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="http://localhost/tutor/admin/partials/asset/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="http://localhost/tutor/admin/partials/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/tutor/index.php"><span class=""><b>Tutor</b></span></a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?= $_SESSION['username']?> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <?php if(!empty($_SESSION['tid'])): ?>
                        <li><a href="http://localhost/tutor/admin/teacher/show.php?id=<?php echo $_SESSION['tid']?>"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                        <li class="divider"></li>
                    <?php elseif(!empty($_SESSION['sid'])): ?>
                        <li><a href="http://localhost/tutor/admin/student/show.php?id=<?php echo $_SESSION['sid']?>"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                        <li class="divider"></li>
                    <?php endif; ?>
                    <li><a href="http://localhost/tutor/admin/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-inverse sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <?php if (!empty($_SESSION['tid'])): ?>
                            <h4 class="text-success"> Teacher Panel</h4>
                        <?php elseif (!empty($_SESSION['sid'])): ?>
                            <h4 class="text-success"> Student Panel</h4>
                        <?php else: ?>
                        <h4 class="text-success"> Admin Panel</h4>
                        <?php endif ?>
                    </li>

                    <?php $link=$_SERVER['REQUEST_URI']; ?>
                    
                    <li>
                        <a href="http://localhost/tutor/admin/dashboard.php" class="<?= $link=="/tutor/admin/dashboard.php"?'active':''?>">
                            <span class="">
                                <i class="fa fa-laptop fa-fw"></i> Dashboard
                            </span>
                        </a>
                    </li>
                    <?php if($_SESSION['role_id']=='1'): ?>
                    <li>
                        <a href="http://localhost/tutor/admin/student/index.php" class="<?= $link=="/tutor/admin/student/index.php"?'active':''?>">
                            <span class="text-success">
                                <i class="fa fa-user fa-fw"></i> Students
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/tutor/admin/teacher/index.php" class="<?= $link=="/tutor/admin/teacher/index.php"?'active':''?>">
                            <span class="text-success">
                                <i class="fa fa-user-secret fa-fw"></i> Teachers
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/tutor/admin/subject/index.php" class="<?= $link=="/tutor/admin/subject/index.php"?'active':''?>">
                            <span class="text-success">
                                <i class="fa fa-book fa-fw"></i> Subjects
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['role_id']=='3'||$_SESSION['role_id']=='1'): ?>
                    <li>
                        <a href="http://localhost/tutor/admin/apply/index.php" class="<?= $link=="/tutor/admin/apply/index.php"?'active':''?>">
                            <span class="text-success">
                                <i class="fa fa-edit fa-fw"></i> Applied Tutor
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['role_id']=='2'||$_SESSION['role_id']=='1'): ?>
                    <li>
                        <a href="http://localhost/tutor/admin/students/index.php" class="<?= $link=="/tutor/admin/students/index.php"?'active':''?>">
                            <span class="text-success">
                                <i class="fa fa-users fa-fw"></i> My students
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['role_id']=='1'): ?>
                    <li>
                        <a href="http://localhost/tutor/admin/admins/index.php" class="<?= $link=="/tutor/admin/admins/index.php"?'active':''?>">
                            <span class="text-success">
                                <i class="fa fa-users fa-fw"></i> Admin
                            </span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="http://localhost/tutor/admin/logout.php" class="text-success"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>