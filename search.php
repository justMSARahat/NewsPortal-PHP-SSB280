<!-- ::::::::::  HEADER SPLIT START  :::::::: -->
<?php include "inc/header.php"; ?>
<!-- ::::::::::  HEADER SPLIT END  :::::::: -->

    <div class="update_news_mine">
       <div class="container">
           <div class="row">
               <div class="col-md-2 marker_brk_news">
                   <h5 class="brk_text">Breaking News</h5>
               </div>
               <div class="col-md-10 brk_news">
                 <a href="#">
                    <marquee class="brk_news_text">
                <?php
                    $sql = "SELECT * FROM post WHERE status = 1 ORDER BY id DESC lIMIT 15";
                    $query = mysqli_query($db, $sql);
                    $allpost = mysqli_num_rows($query);
                     while ($row = mysqli_fetch_assoc($query) ) {
                       $id          = $row['id'];
                       $name        = $row['name'];
                ?>
                       <a href="single.php?readpost=<?php echo $id; ?>" class="spc-1">
                           <?php echo $name . " " ."*|*". " "; ?> 
                       </a>

                <?php  } ?>
                    </marquee>     
                 </a>
               </div>
           </div>
       </div>

    
    </div>

    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Blog Page</h2>
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

                    <!-- Single Item Blog Post Start -->
                <?php
                    if (isset($_POST['search'])) {
                        $searchjunk = $_POST['search'];
                        $sql        = "SELECT * FROM post WHERE name LIKE '%$searchjunk%' OR description LIKE '%$searchjunk%' ORDER BY id DESC ";
                       $query       = mysqli_query($db, $sql);
                       $resulcont   = mysqli_num_rows($query);

                        if ($resulcont == 0) { ?>
                            <div class="alert alert-warning">OPPS!! No Post Found...</div>
                        <?php }else{ ?>
                             <div class="alert alert-success"><?php echo $resulcont; ?> Post Found..</div>
                        <?php     
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
                            <div class="blog-post">
                                <!-- Blog Banner Image -->
                                <div class="blog-banner">
                                    <a href="single.php?readpost=<?php echo $id; ?>">
                                        <img src="admin/img/post/<?php echo $image; ?>" class="blog_image_custom"  >
                                        <!-- Post Category Names -->
                                        <div class="blog-category-name">
                                            <?php
                                                $sql = "SELECT * FROM category WHERE id = '$cat_id' ";
                                                $rtl = mysqli_query($db, $sql);
                                                while ( $row = mysqli_fetch_assoc($rtl) ) {
                                                  $cat_id   = $row['id'];
                                                  $cat_name = $row['name'];
                                            ?>
                                            <h6><?php echo $cat_name; ?></h6>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                                <!-- Blog Title and Description -->
                                <div class="blog-description">
                                    <a href="single.php?readpost=<?php echo $id; ?>">
                                        <h3 class="post-title"><?php echo $name;?>.</h3>
                                    </a>
                                    <p><?php echo substr($description, 0,250) . "...See More" ; ?></p>
                                    <!-- Blog Info, Date and Author -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="blog-info">
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i><?php echo $post_date;?></li>
                                                    <?php
                                                        $sql = "SELECT * FROM user WHERE id = '$author_id' ";
                                                        $rtl = mysqli_query($db, $sql);
                                                        while ( $row = mysqli_fetch_assoc($rtl) ) {
                                                          $userid   = $row['id'];
                                                          $username = $row['name'];
                                                    ?>
                                                    <li><i class="fa fa-user"></i> <?php echo $username;?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-4 read-more-btn">
                                            <a href="single.php?readpost=<?php echo $id; ?>" type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item Blog Post End -->

                    <?php     }  // else Endling
                            }   // while loop ending
                        } // main if end
                    else if (isset($_GET['meta'])) {
                          
                        $searchtag = $_GET['meta'];
                        $sql        = "SELECT * FROM post WHERE name LIKE '%$searchtag%' OR description LIKE '%$searchtag%' OR meta_tag LIKE '%$searchtag%' ORDER BY id DESC ";
                       $query       = mysqli_query($db, $sql);
                       $resulcont   = mysqli_num_rows($query);

                        if ($resulcont == 0) { ?>
                            <div class="alert alert-warning">OPPS!! No Post Found...</div>
                        <?php }else{ ?>
                             <div class="alert alert-success"><?php echo $resulcont; ?> Post Found..</div>
                        <?php     
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
                            <div class="blog-post">
                                <!-- Blog Banner Image -->
                                <div class="blog-banner">
                                    <a href="single.php?readpost=<?php echo $id; ?>">
                                        <img src="admin/img/post/<?php echo $image; ?>" class="blog_image_custom"  >
                                        <!-- Post Category Names -->
                                        <div class="blog-category-name">
                                            <?php
                                                $sql = "SELECT * FROM category WHERE id = '$cat_id' ";
                                                $rtl = mysqli_query($db, $sql);
                                                while ( $row = mysqli_fetch_assoc($rtl) ) {
                                                  $cat_id   = $row['id'];
                                                  $cat_name = $row['name'];
                                            ?>
                                            <h6><?php echo $cat_name; ?></h6>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                                <!-- Blog Title and Description -->
                                <div class="blog-description">
                                    <a href="single.php?readpost=<?php echo $id; ?>">
                                        <h3 class="post-title"><?php echo $name;?>.</h3>
                                    </a>
                                    <p><?php echo substr($description, 0,250) . "...See More" ; ?></p>
                                    <!-- Blog Info, Date and Author -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="blog-info">
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i><?php echo $post_date;?></li>
                                                    <?php
                                                        $sql = "SELECT * FROM user WHERE id = '$author_id' ";
                                                        $rtl = mysqli_query($db, $sql);
                                                        while ( $row = mysqli_fetch_assoc($rtl) ) {
                                                          $userid   = $row['id'];
                                                          $username = $row['name'];
                                                    ?>
                                                    <li><i class="fa fa-user"></i> <?php echo $username;?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-4 read-more-btn">
                                            <a href="single.php?readpost=<?php echo $id; ?>" type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item Blog Post End -->

                    <?php     }  // else Endling
                            }   // while loop ending
                        } // main if end
                    ?>
                    <!-- Single Item Blog Post End -->


                    <!-- Blog Paginetion Design Start -->
                    <div class="paginetion">
                        <ul>
                            <!-- Next Button -->
                            <li class="blog-prev">
                                <a href=""><i class="fa fa-long-arrow-left"></i>  Previous</a>
                            </li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li class="active"><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                            <!-- Previous Button -->
                            <li class="blog-next">
                                <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Blog Paginetion Design End -->               
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
   