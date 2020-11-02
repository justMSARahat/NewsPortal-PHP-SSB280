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
                            <?php 
                                        
                                    }
                                }//main loop off
                            ?>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
    </div>
</header>
<!-- ::::::::::: Header Section End ::::::::: -->
    






    