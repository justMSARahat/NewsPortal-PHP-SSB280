<!-- ::::::::::  HEADER SPLIT START  :::::::: -->
<?php include "inc/header.php"; ?>
<!-- ::::::::::  HEADER SPLIT END  :::::::: -->

    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Post Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                    <?php
                        if (isset($_GET['readpost'])) {
                            $readpost = $_GET['readpost'];
                        $sql = "SELECT * FROM post  WHERE id = '$readpost' ";
                        $query = mysqli_query($db, $sql);
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
                    <!-- Single Item Blog Post Start -->
                    <div class="blog-single">
                        <!-- Blog Title -->
                        <h3 class="post-title"><?php echo $name; ?>.</h3>

                        <!-- Blog Categories -->
                        <div class="single-categories">
                            <?php
                                $sql = "SELECT * FROM category WHERE id = '$cat_id' ";
                                $rtl = mysqli_query($db, $sql);
                                while ( $row = mysqli_fetch_assoc($rtl) ) {
                                  $cat_id   = $row['id'];
                                  $cat_name = $row['name'];
                            ?>
                                <span><?php echo $cat_name; ?></span>
                            <?php } ?>
                        </div>

                        <!-- Blog Thumbnail Image Start -->
                        <div class="blog-banner">
                                <img src="admin/img/post/<?php echo $image; ?>">
                        </div>
                        <!-- Blog Thumbnail Image End -->

                        <!-- Blog Description Start -->
                            <p><?php echo $description; ?></p>
                        <!-- Blog Description End -->
                    </div>
                    <!-- Single Item Blog Post End -->
                        <?php } } ?>

                    <!-- Blog Paginetion Design Start -->

                    <!-- Blog Paginetion Design End --> 
                    
                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                    $sql = "SELECT * From comment WHERE post_id = '$id' AND status= 1 ";
                                    $rau = mysqli_query($db,$sql);
                                    $num   = mysqli_num_rows($rau); 
                                ?>
                                <h4>All Latest Comments (<?php echo $num;?>)</h4>
                                <div class="title-border"></div>
                                <?php
                                   if ($num == 0) {?>
                                        <p>Opps!! No Comment Found.</p>
                                    <?php } 
                                        else{

                                        }
                                    ?>
                            </div>
                        </div>
                        <!-- Comment Heading End -->

                        <!-- Single Comment Post Start -->
                                 <?php
                                    $sql = "SELECT * FROM comment WHERE post_id = '$id' AND status= 1 ORDER BY id DESC";
                                    $rau = mysqli_query($db,$sql);
                                    $i   = 0;
                                    while ( $row = mysqli_fetch_assoc($rau)) {
                                      $id           = $row['id'];
                                      $name         = $row['name'];  
                                      $comment      = $row['comment'];      
                                      $post_id      = $row['post_id'];    
                                      $visitor_id   = $row['visitor_id'];
                                      $email        = $row['email'];
                                      $is_parent    = $row['is_parent'];  
                                      $status       = $row['status'];  
                                      $cmt_date     = $row['cmt_date'];  
                                  ?>
                        <div class="row each-comments">
                            <div class="col-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                                </div>
                            </div>
                            <div class="col-md-10 no-padding">
                                <!-- Comment Box Start -->
                                  
                                    <div class="comment-box">
                                        <div class="comment-box-header">
                                            <ul>
                                                <li class="post-by-name"><?php echo $name; ?></li>
                                                <li class="post-by-hour"><?php echo $cmt_date; ?></li>
                                            </ul>
                                        </div>
                                        <p><?php echo $comment; ?></p>
                                    </div>

                                  
                                <!-- Comment Box End -->
                            </div>
                        </div>
                        <?php    } ?> 
                        <!-- Single Comment Post End -->


                        <!-- Comment Reply Post Start -->
                       <!--  <div class="row each-comments">
                            <div class="col-md-2 offset-md-2">
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-2.jpg">
                                </div>
                            </div>

                            <div class="col-md-8 no-padding">
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- Comment Reply Post End -->

                        <!-- Single Comment Post Start -->
                        <!-- <div class="row each-comments">
                            <div class="col-md-2">
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                                </div>
                            </div>

                            <div class="col-md-10 no-padding">
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- Single Comment Post End -->
                    </div>
                    <!-- Single Comment Section End -->


                    <!-- Post New Comment Section Start -->
                    <div class="post-comments">
                        <h4>Post Your Comments</h4>
                        <div class="title-border"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <!-- Form Start -->
                        <?php
                           if (empty($_SESSION['email']) || empty($_SESSION['password']) || $_SESSION['status'] != 1 ) {  ?>
                                <form action="" method="POST" class="contact-form">
                                    <!-- Left Side Start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- First Name Input Field -->
                                            <div class="form-group">
                                                <input type="text" name="user_name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                        </div>
                                        <!-- Email Address Input Field -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Left Side End -->

                                    <!-- Right Side Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Comments Textarea Field -->
                                            <div class="form-group">
                                                <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                                <i class="fa fa-pencil-square-o"></i>
                                            </div>
                                            <!-- Post Comment Button -->
                                            <button type="submit" name="postcomnt" class="btn-main  cmt-design" style="margin-bottom: 20px; "><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                                        </div>
                                    </div>
                                    <!-- Right Side End -->
                                </form>
                        <?php }
                           else if (!empty($_SESSION['email']) && !empty($_SESSION['password']) || $_SESSION['status'] = 1 ) { ?>
                                <form action="" method="POST" class="contact-form">
                                    <!-- Right Side Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Comments Textarea Field -->
                                            <div class="form-group">
                                                <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                                <i class="fa fa-pencil-square-o"></i>
                                            </div>
                                            <!-- Post Comment Button -->
                                            <button type="submit" name="postcomnt" class="btn-main  cmt-design" style="margin-bottom: 20px; "><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                                        </div>
                                    </div>
                                    <!-- Right Side End -->
                                </form>
                                
                        <?php } 
                           if (empty($_SESSION['email']) || empty($_SESSION['password']) || $_SESSION['status'] != 1 ) {  
                              
                              if (isset($_POST['postcomnt'])) {
                                $name    = mysqli_real_escape_string($db,$_POST['user_name']);   
                                $email   = mysqli_real_escape_string($db,$_POST['email']);   
                                $comment = mysqli_real_escape_string($db,$_POST['comments']);    
                                $sql = "INSERT INTO comment (comment,post_id,email,status,cmt_date,name) VALUES ('$comment','$id','$email',3,now(),'$name')";
                                $query      = mysqli_query($db, $sql);
                                if ( $query ){
                                    header("Location: single.php?readpost=$id");
                                    echo "<span class='alert alert-success'>Comment Need To Approve by an Admin</span>";
                                }
                                else{
                                    die("<span class='alert alert-success'>Commnet Faild!!!Try Again.</span>");
                                }
                               }

                           }
                           else if (!empty($_SESSION['email']) && !empty($_SESSION['password']) || $_SESSION['status'] = 1 ) { 
                              
                              if (isset($_POST['postcomnt'])) {
                                $name    = $_SESSION['name'];   
                                $email   = $_SESSION['email'];
                                $p_id      = $_SESSION['id'];
                                $comment = mysqli_real_escape_string($db,$_POST['comments']);    
                                $sql = "INSERT INTO comment (comment,post_id,email,status,cmt_date,name,visitor_id) VALUES ('$comment','$id','$email',3,now(),'$name','$p_id')";
                                $query      = mysqli_query($db, $sql);
                                if ( $query ){
                                    header("Location: single.php?readpost=$id");
                                    echo "<span class='alert alert-success'>Comment Need To Approve by an Admin</span>";
                                }
                                else{
                                    die("<span class='alert alert-success'>Commnet Faild!!!Try Again.</span>");
                                }
                               }
                               


                           } ?>
                    </div>
                    <!-- Post New Comment Section End -->                  
                </div>



                <!-- Blog Right Sidebar -->
                <?php include"inc/sidebar.php"; ?>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    

    <!-- :::::::::: Footer Section Start :::::::: -->
    <?php include"inc/footer.php"; ?>
   