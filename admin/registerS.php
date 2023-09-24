<?php include('conn.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['register'])) {

  $username = $email = $password = $phone = $cnic = $address = $created_at = "";
  $v_username = $v_email = $v_password = $v_phone = $v_cnic = $v_address = "";
  $error_username = $error_email = $error_password = $error_phone = $error_cnic = $error_address = $error_pic = "";

    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $phone = test_input($_POST['phone']);
    $cnic = test_input($_POST['cnic']);
    $gender = test_input($_POST['gender']);
    $address = test_input($_POST['address']);

    $f_name=$_FILES['myfile']['name'];
    $f_tmp=$_FILES['myfile']['tmp_name'];
    $f_size=$_FILES['myfile']['size'];
    $f_ext=explode('.', $f_name);
    $f_exten=strtolower(end($f_ext));
    $f_new=uniqid().'.'.$f_exten;
    $store="upload/".$f_new;
    if($f_exten=='jpg' || $f_exten=='png' ||$f_exten=='gif'){
        if($f_size>=1000000){
            $error_pic = 'file is heavy';
        }else{
            move_uploaded_file($f_tmp, $store);
        }
    }else{
        $error_pic = 'file should be jpg, png, gif';
    }

    if(empty($username)) {
        $error_username = 'Name field require some value';
        $username = "";
    } else {
        $v_username = $username;
    }

    if(empty($email)) {
        $error_email = 'Email field require some value';
        $email = "";
    } else {
        $v_email = $email;
    }

    if(empty($password)) {
        $error_password = 'Password field require some value';
        $password = "";
    } else {
        $v_password = $password;
    }

    if(empty($phone)) {
        $error_phone = 'Phone field require some value';
        $phone = "";
    } else {
        if(!is_numeric($phone)){
            $error_phone = 'Phone field require numeric value';
            $phone = "";
        }else{
            $v_phone = $phone;
        }
    }

    if(empty($cnic)) {
        $error_cnic = 'CNIC field require some value';
        $cnic = "";
    } else {
        if(!is_numeric($cnic)){
            $error_cnic = 'CNIC field require numeric value';
            $cnic = "";
        }else{
            $v_cnic = $cnic;
        }
    }

    if(empty($address)) {
        $error_address = 'Address field require some value';
        $address = "";
    } else {
        $v_address = $address;
    }

    $created_at=date('Y-m-d');

    if(!empty($v_username)&& !empty($f_new)&& !empty($v_email)&& !empty($v_password)&& !empty($v_phone)&& !empty($v_cnic)&& !empty($v_address)){
        $q = "INSERT INTO student(`username`,`pic`,`email`,`password`,`phone`,`address`,`gender`,`cnic`,`role_id`,`created_at`) VALUES('$v_username','$f_new','$v_email','$v_password','$v_phone','$v_address','$gender','$v_cnic','3','$created_at')";
        $run = mysqli_query($con, $q);
        if($run) {
            header('Location: http://localhost/tutor/admin/login.php');
        }else{
            echo "error in data register";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutor || Register</title>
    <!-- Bootstrap Core CSS -->
    <link href="partials/asset/css/getbootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link href="partials/asset/dist/css/sb-admin-2.css" rel="stylesheet"> -->
    <!-- Custom Fonts -->
    <link href="partials/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:url('partials/asset/img/bgs.jpg');background-size:cover; ">
    <div class="container" style="margin-top:2%;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading text-center">
                        <b><a href="http://localhost/tutor/index.php" class="panel-title">Tutor</a></b>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" class="form" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="text-center text-muted">Register as Student</legend>
                                <?php if (!empty($error_username)): ?>
                                    <span style="color: red;"><?= $error_username ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required="" autocomplete="off">
                                </div>
                                <?php if (!empty($error_pic)): ?>
                                    <span class="text-danger"><?= $error_pic ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                <label for="">Picture:</label>
                                    <input type="file" name="myfile" class="form-control" required="">
                                </div>
                                <?php if (!empty($error_email)): ?>
                                    <span style="color: red;"><?= $error_email ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" required="" autocomplete="off">
                                </div>
                                <?php if (!empty($error_password)): ?>
                                    <span style="color: red;"><?= $error_password ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="">
                                </div>
                                <?php if (!empty($error_phone)): ?>
                                    <span style="color: red;"><?= $error_phone ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone" name="phone" type="text" required="" autocomplete="off">
                                </div>
                                <?php if (!empty($error_cnic)): ?>
                                    <span style="color: red;"><?= $error_cnic ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Unique Id" name="cnic" type="text" required="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="text-muted"> Male <input type="radio" name="gender" value="M" required=""></label>
                                    <label class="text-muted"> Female <input type="radio" name="gender" value="F" required=""></label>
                              </div>
                                <?php if (!empty($error_address)): ?>
                                    <span style="color: red;"><?= $error_address ?></span>
                                <?php endif ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="address" name="address" type="text" required="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="register" class="btn btn-lg btn-success btn-block" value="Register">
                                </div>
                                <div class="form-group text-center">
                                    <a href="http://localhost/tutor/admin/registerT.php" class="text-muted">Register Teacher</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="partials/asset/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="partials/asset/js/getbootstrap.min.js"></script>
</body>
</html>
