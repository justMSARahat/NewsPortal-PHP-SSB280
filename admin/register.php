<?php
  include "inc/db.php" ;
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" required="required" name="name" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required="required" name="email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Address" name="address" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="Phone Number" required="required" name="phone" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Password" class="form-control" placeholder="Password" required="required" name="pass" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Password" class="form-control" placeholder="Retype Password" required="required" name="repass" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="gender" id="" class="form-control"  required="required">
            <option >Select Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-friends"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control-file" value="Profile Picture" name="image" >
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="reg">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
        if (isset($_POST['reg'])) {
          $name    = $_POST['name'];
          $email   = $_POST['email'];
          $phone   = $_POST['phone'];
          $address = $_POST['address'];
          $pass    = $_POST['pass'];
          $repass  = $_POST['repass'];
          $gender  = $_POST['gender'];
          $image   = $_FILES['image'];
          //Image
          $imagename  = $_FILES['image']['name'];
          $imagesize  = $_FILES['image']['size'];
          $imagetype  = $_FILES['image']['type'];
          $imagetemp  = $_FILES['image']['tmp_name'];
          //image extenstion
          $imagesupport  = array("jpg","jpeg","png");
          //$myimageformat = strtolower(end(explode('.', $imagename)));
          //error
          $formerror = array();
          if (strlen($name) < 5) {
            $formerror = "Error 1";
          }
          if ($pass != $repass) {
            $formerror = "Error 2";
          }
          if (!empty($image)) {
            if (!empty($image) && in_array($myimageformat, $imagesupport)) {
              $formerror = "Error 3";
            }
            if (!empty($image) && $imagesize > 2097152) {
              $formerror = "Error 4";
            }
          }
          /*foreach ($formerror as $error) {
            echo "<div>" . $error . "</div>";
          }*/
          if (empty($formerror)) {
            $sha1       = sha1($pass);

            if (!empty($imagename)) {
              if (!empty($imagename)) {
                $image_name = rand(1,99999).'_'.$imagename;
              }
              move_uploaded_file($imagetemp, "img/user/".$image_name);
              $sql = "INSERT INTO user (name,email,phone,address,password,status,gender,image,joindate) VALUES ('$name','$email','$phone','$address','$sha1',3,'$gender','$image_name',now()) ";
              $Query    = mysqli_query($db,$sql);
              if ($Query) {
                echo "<div class='alert alert-warning' >Account Submited</div>";
                  header("Location:index.php");
                }else{
                  die("Failed");
                }
            }
            else if (empty($imagename)) {
              $sql = "INSERT INTO user (name,email,phone,address,password,status,gender,joindate) VALUES ('$name','$email','$phone','$address','$sha1',3,'$gender',now()) ";
                $Query    = mysqli_query($db,$sql);
                if ($Query) {
                  echo "<div class='alert alert-warning' >Account Submited</div>";
                    header("Location:index.php");
                  }else{
                    die("Failed");
                  }
            }

          }


        }
      ?>



      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php
  ob_end_flush();
?>
</body>
</html>
