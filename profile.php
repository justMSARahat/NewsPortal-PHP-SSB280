<?php
    include "admin/inc/db.php";
    ob_start();
    session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template" />
    <meta name="author" content="Blue Chip" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png" />
 
    <title>Blue Chip | Blog Right Sidebar</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">

    <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Developer Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Toaster File -->
    <link rel="stylesheet" href="admin/dist/css/toastr.min.css">
    <script src="admin/dist/js/toastr.min.js"></script>

  </head>

  <body>
    <!-- :::::::::: Header Section Start :::::::: -->


<header class="top_header">
    <div class="container">
        <div class="row right_menu">
          <?php
            if (!empty($_SESSION['email']) && !empty($_SESSION['password']) && $_SESSION['status'] = 1 ) { ?>
              <a href="profile.php" class="header_1"><?php echo $_SESSION['name']; ?></a>
              <a href="logout.php" class="header_1">Logout</a>
          <?php } else { ?>
              <a href="login.php" class="header_1">Login / Register </a>  
          <?php } ?>
        </div>
    </div>
</header>

<header class="header_design">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand" href="index.php">SA Industry</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                 <?php
                    $sql   = "SELECT * FROM category WHERE status = 1 AND is_parrent = 0 ORDER BY name ASC ";
                    $query = mysqli_query($db,$sql);
                    while ( $row  = mysqli_fetch_assoc($query) ) {
                      $cat_id   = $row['id'];
                      $cat_name = $row['name'];
                      // sub cat
                      $sql     = "SELECT * FROM category WHERE status = 1 AND is_parrent = '$cat_id' ORDER BY name ASC ";
                      $query_3 = mysqli_query($db,$sql);
                      $rows    = mysqli_num_rows($query_3);

                      if ( $rows == 0 ) { ?>
                        <li class="nav-item active">
                            <a class="nav-link"  href="category.php?catpage=<?php echo $cat_id; ?>"><?php echo $cat_name; ?> <span class="sr-only">(current)</span></a>
                        </li>
                    <?php }else{ ?>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="category.php?catpage=<?php echo $cat_id; ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php echo $cat_name; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                            while ( $row = mysqli_fetch_assoc($query_3) ) {
                                $sub_cat_id   = $row['id'];
                                $sub_cat_name = $row['name'];
                           ?> 
                          <a class="dropdown-item" href="category.php?catpage=<?php echo $sub_cat_id; ?>"><?php echo $sub_cat_name; ?></a>
                            <?php } ?>
                        </div>
                 <?php } }//main loop off ?>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
    </div>
</header>
<!-- ::::::::::: Header Section End ::::::::: -->


    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">User Profile</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">User</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
                <h4>User Profile</h4>
                <div class="title-border"></div>
                  <section class="content tt-1">
                      <div class="row">
                          <div class="col-md-3">
                            <div class="card card-primary card-outline">
                              <?php
                                $u_id      = $_SESSION['id'];
                                $sql_1   = "SELECT * FROM users WHERE id = '$u_id' ";
                                $query_1 = mysqli_query($db,$sql_1);
                                while ($row = mysqli_fetch_assoc($query_1) ) { // while 1 started
                                  $id       = $row['id'];
                                  $name     = $row['name'];
                                  $email    = $row['email'];
                                  $phone    = $row['phone'];
                                  $address  = $row['address'];
                                  $password = $row['password'];
                                  $status   = $row['status'];
                                  $gender   = $row['gender'];
                                  $image    = $row['image'];
                                  $joindate = $row['joindate'];
                              ?>
                              <div class="card-body box-profile">
                                <div class="text-center">
                                  <?php
                                    if (!empty($image)) { ?>
                                      <img class="profile-user-img img-fluid img-circle"
                                           src="admin/img/user/<?php echo $image ; ?>"
                                           alt="User profile picture">
                                    <?php }  else{ ?>
                                      <img class="profile-user-img img-fluid img-circle"
                                           src="admin/dist/img/default-150x150.png"
                                           alt="User profile picture">
                                    <?php } ?>
                                </div>
                                <h3 class="profile-username text-center"><?php echo $name; ?></h3>
                                <p class="text-muted text-center"><?php echo $email; ?></p>
                                <ul class="list-group list-group-unbordered mb-3">
                                  <li class="list-group-item">
                                    <b>Post</b> 
                                    <a class="float-right">
                                      <?php
                                        $sql   = "SELECT * FROM post WHERE author_id = '$id' ";
                                        $query = mysqli_query($db,$sql);
                                        $post  = mysqli_num_rows($query);
                                        echo $post;
                                      ?>
                                    </a></li>
                                  <li class="list-group-item">
                                    <b>Comment</b> <a class="float-right">
                                      <?php
                                        $sql   = "SELECT * FROM comment WHERE visitor_id = '$id' ";
                                        $query = mysqli_query($db,$sql);
                                        $cmt   = mysqli_num_rows($query);
                                        echo $cmt;
                                      ?>
                                    </a></li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title">Information</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <strong> Address</strong>
                                <p class="text-muted">
                                  <?php echo $address;?>
                                </p>
                                <hr>
                                <strong> Email</strong>
                                <p class="text-muted"><?php echo $email;?></p>
                                <hr>
                                <strong> Phone</strong>
                                <p class="text-muted">
                                  <span class="tag tag-danger"><?php echo $phone;?></span>
                                </p>
                                <hr>
                                <strong> Join Date</strong>
                                <p class="text-muted"><?php echo $joindate ;?></p>
                              </div>
                              <!-- /.card-body -->
                        <?php } ?><!-- Line 43 While Loop end -->

                            </div>
                            

                          </div>

                        <!-- /.col -->
                        <div class="col-md-9">
                          <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                 <?php
                                    $sql = "SELECT * FROM post WHERE status = 1 ORDER BY id DESC lIMIT 4";
                                    $query = mysqli_query($db, $sql);
                                    $allpost = mysqli_num_rows($query);
                                     while ($row = mysqli_fetch_assoc($query) ) {
                                       $id          = $row['id'];
                                       $name        = $row['name'];
                                       $description = $row['description'];
                                       $image       = $row['image'];
                                       $cat_id      = $row['cat_id'];
                                       $author_id   = $row['author_id'];
                                       $status      = $row['status'];
                                       $meta_tag    = $row['meta_tag'];
                                       $post_date   = $row['post_date'];
                                ?>
                                  <div class="post">

                                    <div class="user-block">
                                      <img class="img-circle img-bordered-sm" src="admin/img/post/<?php echo $image; ?>" alt="user image">
                                      <span class="username">
                                        <a href="#"><?php echo substr($name, 0,70); ?></a>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                      </span>
                                      <span class="description"><?php 
                                        $sql1 = "SELECT * FROM user WHERE id = '$author_id'";
                                        $query2 = mysqli_query($db, $sql1);
                                        while ($row = mysqli_fetch_assoc($query2) ) {
                                          $a_id          = $row['name'];
                                        }
                                      echo $a_id; ?> 

                                      - <?php echo $post_date; ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                      <?php echo substr($description, 0,350); ?>
                                    </p>

                                    <p>
                                      <span class="float-right" style="margin: -9px; ">
                                        <a href="single.php?readpost=<?php echo $id; ?>" class="link-black text-sm">
                                          <i class="far fa-comment mr-1"></i> Comments (
                                          <?php
                                            $sql_4 = "SELECT * FROM comment WHERE post_id = '$id'";
                                            $query_4 = mysqli_query($db, $sql_4);
                                            $allpost = mysqli_num_rows($query_4);
                                            echo $allpost;
                                          ?>




                                          )
                                        </a>
                                      </span>
                                    </p>
                                  </div>
                                <?php } ?>
                                </div>





                                <div class="tab-pane" id="settings">
            <?php  
                $id  = $_SESSION['id'];
                $sql = "SELECT * FROM users WHERE id = '$id' ";
                $rau = mysqli_query($db, $sql);
                while ( $row = mysqli_fetch_assoc($rau)) {
                  $id       = $row['id'];
                  $name     = $row['name'];
                  $email    = $row['email'];
                  $phone    = $row['phone'];
                  $address  = $row['address'];
                  $status   = $row['status'];
                  $gender   = $row['gender'];
                  $image    = $row['image'];
                  $joindate = $row['joindate'];
            ?> 
                                  <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                      <div class="col-sm-10">
                                        <input type="name" class="form-control" id="inputName" placeholder="Name" name="name"  value="<?php echo $name ; ?>">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                      <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $email ; ?>" name="email">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name" value="<?php echo $phone ; ?>" name="phone">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                      <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience" name="address"><?php echo $address ; ?>
                                        </textarea>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputSkills" class="col-sm-2 col-form-label">Gender</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" name="gender">
                                          <option value="1" <?php if( $gender==1 ){ echo "selected" ; }?>>Male</option>
                                          <option value="2" <?php if( $gender==2 ){ echo "selected" ; }?>>Female</option>
                                          <option value="3" <?php if( $gender==3 ){ echo "selected" ; }?>>Other</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="inputSkills" class="col-sm-2 col-form-label">Image</label>
                                        <?php
                                          if (!empty($image)) { ?>
                                            <img src="admin/img/user/<?php echo $image; ?>" alt="" class="editimg" >
                                          <?php }else{
                                            echo "No Image Uploaded";
                                          }
                                        ?>
                                        <input type="file" class="form-control-file" name="image">
                                    </div>
                                    <div class="form-group row">
                                      <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger" name="update">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                  <?php
            if ( isset($_POST['update']) ){
              $Updateidd  = $_SESSION['id'];
              $name       = mysqli_real_escape_string($db,$_POST['name']);
              $email      = mysqli_real_escape_string($db,$_POST['email']);
              $phone      = mysqli_real_escape_string($db,$_POST['phone']);
              $address    = mysqli_real_escape_string($db,$_POST['address']);
              $gender     = mysqli_real_escape_string($db,$_POST['gender']);
              $Image      = mysqli_real_escape_string($db,$_FILES['image']);
              //image
              $imagename  = $_FILES['image']['name'];
              $imagesize  = $_FILES['image']['size'];
              $imagetype  = $_FILES['image']['type'];
              $imagetemp  = $_FILES['image']['tmp_name'];
              //Extension
              $support    = array("jpg","jpeg","png");
              $myexten    = strtolower(end(explode('.', $imagename)));
              //error
              $formerror  = array();
              if ( strlen($name) < 3 ){
                $formerror = 'Username is too short!!!';
              }
              if ( !empty($imagename) ){
                if ( !empty($imagename) && !in_array($myexten, $support) ){
                  $formerror = 'Invalid Image Format. Please Upload a JPG, JPEG or PNG image';
                }
                if ( !empty($imagesize) && $imagesize > 2097152 ){
                  $formerror = 'Image Size is Too Large! Allowed Image size Max is 2 MB.';
                }
              }
              foreach ($formerror as $Error) {
                echo $Error ;
              }
              if (empty($formerror)) {
                if (!empty($imagename) ) {
                  $removeimg = "SELECT * FROM users WHERE id = '$id' ";
                  $query     = mysqli_query($db,$removeimg);
                  while ($row = mysqli_fetch_assoc($query) ) {
                    $image = $row['image'];
                  }
                  unlink("admin/img/user/".$image);
                  if (!empty($imagename)) {
                    $imgname = rand(1,99999).'___'.$imagename;
                  }
                  move_uploaded_file($imagetemp, "admin/img/user/".$imgname);

                  $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address',gender='$gender', image='$imgname' WHERE id = '$id' ";
                  $updateUser = mysqli_query($db, $sql);


                  if ( $updateUser ){
                    header("Location: profile.php");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                }
                else{
                  $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', gender='$gender' WHERE id = '$id' ";
                  $updateUser = mysqli_query($db, $sql);
                  if ( $updateUser ){
                    header("Location: profile.php");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                } // 343 close



                }// empty form error close 
              }// isset if
            } ?>                      
                                </div>
                                <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                          </div>
                          <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                  </section>

            </div>
          </div> 
        </div>
      </div>
    </section>



    

    <!-- :::::::::: Footer Section Start :::::::: -->
    <?php include"inc/footer.php"; ?>
   