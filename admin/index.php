<?php
  include "inc/db.php" ; 
  ob_start();
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MSA News | Log in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <?php
        if (isset($_POST['login'])) {
          $email    = mysqli_real_escape_string($db , $_POST['email']);
          $password = mysqli_real_escape_string($db , $_POST['password']);
          //Password Ganarate
          $sha1     = sha1($password);

          $sql   = "SELECT * FROM user WHERE email = '$email' ";
          $query = mysqli_query($db , $sql);
          while ($row = mysqli_fetch_assoc($query)) {
             $_SESSION['id']       = $row['id'];
             $_SESSION['name']     = $row['name'];
             $_SESSION['email']    = $row['email'];
             $_SESSION['phone']    = $row['phone'];
             $_SESSION['address']  = $row['address'];
             $_SESSION['password'] = $row['password'];
             $_SESSION['role']     = $row['role'];
             $_SESSION['status']   = $row['status'];
             $_SESSION['gender']   = $row['gender'];
             $_SESSION['image']    = $row['image'];
             $_SESSION['joindate'] = $row['joindate'];

           if ($email == $_SESSION['email'] && $sha1 == $_SESSION['password'] && $_SESSION['status'] ==1 ) {
              header("location:dash.php");
             }
           elseif (!empty($_SESSION['email'])) {
             if ($email == $_SESSION['email']) {
              if ($sha1 == $_SESSION['password']) {
                if ($_SESSION['status'] == 1) {
                  header("location:dash.php");
                }
                else{
                  echo "<div class='alert alert-warning' >Inactive Account</div>";
                }
              }else{
                echo "<div class='alert alert-warning' >Invalid Password</div>";
              }
            } 
            else{
              echo "<div class='alert alert-warning' >Invalid Email</div>";
            }
           }
           else{
              header("location:index.php");            
            }
           }  //while end
        } // if end
      ?>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

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
