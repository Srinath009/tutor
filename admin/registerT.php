<?php include('conn.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    if(isset($_POST['submit'])) {

      $name = $email = $password = $phone = $address = $gender = $cnic = $qf = $s_id = $price = $batch = $created_at = "";
      $v_name = $v_email = $v_password = $v_phone = $v_address = $v_cnic = $v_qf = $v_price = "";
      $error_name = $error_email = $error_password = $error_phone = $error_address = $error_cnic = $error_cnic = $error_qf = $error_price = $error_pic = $error_doc = "";
      $error_s_id = "";
        $name = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);     
        $phone = test_input($_POST['phone']);       
        $address = test_input($_POST['address']);
        $gender = test_input($_POST['gender']);
        $cnic = test_input($_POST['cnic']);
        $qf = test_input($_POST['qf']);
        $s_id = test_input($_POST['s_id']);
        $price = test_input($_POST['price']);
        $batch = test_input($_POST['batch']);

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

        $d_name=$_FILES['doc']['name'];
        $d_tmp=$_FILES['doc']['tmp_name'];
        $d_size=$_FILES['doc']['size'];
        $d_ext=explode('.', $d_name);
        $d_exten=strtolower(end($d_ext));
        $d_new=uniqid().'.'.$d_exten;
        $d_store="document/".$d_new;
        if($d_exten=='pdf'){
            if($d_size>=1000000){
                $error_doc = 'file is heavy';
            }else{
                move_uploaded_file($d_tmp, $d_store); 
            }
        }else{
            $error_doc = 'file should be pdf';
        }

        if(empty($name)) {
            $error_name = 'Name field require some value';
            $name = "";
        } else {
            $v_name = $name;
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

        if(empty($address)) {
            $error_address = 'Address field require some value';
            $address = "";
        } else {
            $v_address = $address;
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

        if(empty($qf)) {
            $error_qf = 'Qualification field require some value';
            $qf = "";
        } else {
            $v_qf = $qf;
        }

        if(empty($price)) {
        $error_price = 'Price field require some value';
        $price = "";
        } else {
            if(!is_numeric($price)){
                $error_price = 'Price field require numeric value';
                $price = "";
            }else{
                $v_price = $price;
            }
        }

        $created_at=date('Y-m-d');

        if(!empty($v_name)&&!empty($f_new)&&!empty($d_new)&& !empty($v_email)&& !empty($v_password)&& !empty($v_phone)&& !empty($v_address)&& !empty($v_cnic)&& !empty($v_qf)&& !empty($s_id)&& !empty($price)&& !empty($batch)){
            $q = "INSERT INTO teacher(`username`,`pic`,`doc`,`email`,`password`,`phone`,`address`,`gender`,`cnic`,`qualification`,`s_id`,`price`,`batch`,`role_id`,`created_at`) VALUES('$v_name','$f_new','$d_new','$v_email','$v_password',$v_phone,'$v_address','$gender','$v_cnic','$v_qf','$s_id','$v_price','$batch','2','$created_at')";
            $run = mysqli_query($con, $q);
            if($run) {
                header('Location: http://localhost/tutor/admin/login.php');
            }else {
                echo "error in data insertion";
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

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="username" placeholder="Username" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_name)): ?>
                                    <span class="text-danger"><?= $error_name ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Picture:</label>
                                <input type="file" name="myfile" class="form-control" required="">
                              </div>    
                            
                                <?php if (!empty($error_pic)): ?>
                                    <span class="text-danger"><?= $error_pic ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Document:</label>
                                <input type="file" name="doc" class="form-control" required="">
                              </div>    
                            
                                <?php if (!empty($error_doc)): ?>
                                    <span class="text-danger"><?= $error_doc ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_email)): ?>
                                    <span class="text-danger"><?= $error_email ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="password" placeholder="Password" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_password)): ?>
                                    <span class="text-danger"><?= $error_password ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="phone" placeholder="Phone" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_phone)): ?>
                                    <span class="text-danger"><?= $error_phone ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">
                                    Male <input type="radio" name="gender" value="M" required="">
                                </label>
                                <label for="">
                                    Female <input type="radio" name="gender" value="F" required="">
                                </label>
                              </div>    
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="cnic" placeholder="Unique Id" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_cnic)): ?>
                                    <span class="text-danger"><?= $error_cnic ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="address" placeholder="Address" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_address)): ?>
                                    <span class="text-danger"><?= $error_address ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="qf" placeholder="Qualification" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_qf)): ?>
                                    <span class="text-danger"><?= $error_qf ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <select name="s_id" class="form-control" required="" autocomplete="off">
                                    <option>select subject</option>
                                <?php 
                                    $q="SELECT * FROM subject";
                                    $result = mysqli_query($con, $q);
                                    while($row=mysqli_fetch_assoc($result)):
                                 ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php 
                                    endwhile;
                                 ?>
                                </select>
                              </div>    
                            
                                <?php if (!empty($error_s_id)): ?>
                                    <span class="text-danger"><?= $error_s_id ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" name="price" placeholder="Fee" class="form-control" required="" autocomplete="off">
                              </div>    
                            
                                <?php if (!empty($error_price)): ?>
                                    <span class="text-danger"><?= $error_price ?></span>
                                <?php endif ?>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">
                                    Morning <input type="radio" name="batch" value="M" required="">
                                </label>
                                <label for="">
                                    Evening <input type="radio" name="batch" value="E" required="">
                                </label>
                              </div>    
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 text-center">
                              <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                            </div>
                          </div>

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
