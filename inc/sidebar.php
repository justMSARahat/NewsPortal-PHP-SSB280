<div class="col-md-4">
    <!-- Search Bar Start -->
    <div class="widget"> 
            <!-- Search Bar -->
            <h4>Blog Search</h4>
            <div class="title-border"></div>
            <div class="search-bar">
                <!-- Search Form Start -->
                <form action="search.php" method="POST">
                    <div class="form-group" >
                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input search_design_1">
                        <button class="btn-main my-2 my-sm-0 search_design_2 text-center" type="submit">Search</button>
                        </form>
                    </div>
                </form>
                <!-- Search Form End -->
            </div>
    </div>
    <!-- Search Bar End -->  

    <!-- Latest News -->
    <div class="widget">
        <h4>Latest News</h4>
        <div class="title-border"></div>
        
        <!-- Sidebar Latest News Slider Start -->
        <div class="sidebar-latest-news owl-carousel owl-theme">
            <!-- Latest News Start -->
                <?php
                    $sql = "SELECT * FROM post WHERE status = 1 ORDER BY id DESC lIMIT 3";
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
            <div class="item">
                <div class="latest-news">
                    <!-- Latest News Slider Image -->
                    <div class="latest-news-image">
                        <a href="single.php?readpost=<?php echo $id; ?>">
                            <img src="admin/img/post/<?php echo $image; ?>" >
                        </a>
                    </div>
                    <!-- Latest News Slider Heading -->
                    <a href="single.php?readpost=<?php echo $id; ?>">
                        <h5><?php echo $name; ?>.</h5>
                    </a>
                    <!-- Latest News Slider Paragraph -->
                    <p><?php echo substr($name, 0,150); ?></p>
                </div>
            </div>
                <?php } // While Loop Ending  ?>
            <!-- Latest News End -->
        </div>
        <!-- Sidebar Latest News Slider End -->
    </div>

    <!-- Recent Post -->
    <div class="widget">
        <h4>Recent Posts</h4>
        <div class="title-border"></div>
        <div class="recent-post">
        <?php
            $sql = "SELECT * FROM post WHERE status = 1 ORDER BY id DESC lIMIT 5";
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
            <!-- Recent Post Item Content Start -->
            <div class="recent-post-item">
                <div class="row">
                    <!-- Item Image -->
                    <div class="col-md-4">
                        <a href="single.php?readpost=<?php echo $id; ?>">
                            <img src="admin/img/post/<?php echo $image; ?>">
                        </a>
                    </div>
                    <!-- Item Tite -->
                    <div class="col-md-8 no-padding">
                        <a href="single.php?readpost=<?php echo $id; ?>">
                            <h5><?php echo $name; ?>.</h5>
                        </a>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><?php echo $post_date; ?></li>
                            <li><i class="fa fa-comment-o"></i>15</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Post Item Content End -->
        
        <?php } // While Loop Ending?>   
        
        </div>
    </div>

    <!-- All Category -->
    <div class="widget">
        <h4>Blog Categories</h4>
        <div class="title-border"></div>
        <!-- Blog Category Start -->
        <div class="blog-categories">
            <ul>
                <!-- Category Item -->
                <?php
                    $sql = "SELECT * FROM category ORDER BY name ASC ";
                    $rac = mysqli_query($db,$sql);
                    while ($row = mysqli_fetch_assoc($rac) ) {
                         $cat_id   = $row['id'];
                         $cat_name = $row['name'];



                    $sql = "SELECT * FROM post WHERE cat_id = '$cat_id'  ";
                    $num = mysqli_query($db,$sql);
                    $qut = mysqli_num_rows($num);


                    ?>
                    <li>
                        <i class="fa fa-check"></i>
                            <a href="category.php?catpage=<?php echo $cat_id; ?>">
                                <?php echo $cat_name; ?>
                            </a>
                        <span>[<?php echo $qut ;?>]</span>
                    </li>
                <?php } ?>
                <!-- Category Item -->
            </ul>
        </div>
        <!-- Blog Category End -->
    </div>

    <!-- Recent Comments -->
    <div class="widget">
        <h4>Recent Comments</h4>
        <div class="title-border"></div>
        <div class="recent-comments">
            
            <!-- Recent Comments Item Start -->
            <div class="recent-comments-item">
                <div class="row">
                    <?php
                        $readcmt = "SELECT * FROM comment ORDER BY id DESC LIMIT 3";
                        $sentcmt = mysqli_query($db,$readcmt);
                        while ( $row = mysqli_fetch_assoc($sentcmt) ) {
                            $name = $row['name'];
                            $cmt_date = $row['cmt_date'];
                    ?>
                    <!-- Comments Thumbnails -->
                    <div class="col-md-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <!-- Comments Content -->
                    <div class="col-md-8 no-padding">
                        <h5><?php echo $name ?></h5>
                        <!-- Comments Date -->
                        <ul>
                            <li>
                                <i class="fa fa-clock-o"></i><?php echo $cmt_date ?>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Recent Comments Item End -->

        </div>
    </div>

    <!-- Meta Tag -->
    <div class="widget">
        <h4>Tags</h4>
        <div class="title-border"></div>
        <!-- Meta Tag List Start -->
        <div class="meta-tags">
            <?php 
                $sql   = "SELECT * FROM post";
                $query = mysqli_query($db,$sql);
                while ($row = mysqli_fetch_assoc($query) ) {
                    $mata_tag = trim($row['meta_tag']);
                    $brk_tag  = explode(" ",$mata_tag);
                    
                    foreach ($brk_tag as $tag) {
            ?>        
            <a href="search.php?meta=<?php echo $tag; ?>"><span><?php echo $tag; ?></span></a>        
            <?php
                    }// foreeach loop close
                } // While Loop Close
            ?>
        </div>
        <!-- Meta Tag List End -->
    </div>
</div>