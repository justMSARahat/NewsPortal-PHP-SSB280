
<?php include "inc/header.php"; ?>
<!-- /.Header -->

<!-- Navbar -->
<?php include "inc/menu.php"; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "inc/aside.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Post</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
          $post = isset($_GET['action']) ? $_GET['action'] : 'manage' ;
          if ($post == 'manage') { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th class="text-center" width="5%" >SL</th>
                      <th class="text-center" width="35%" >Title</th>
                      <th class="text-center" width="10%" >Image</th>
                      <th class="text-center" width="10%" >Category</th>
                      <th class="text-center" width="10%" >Author</th>
                      <th class="text-center" width="5%" >Status</th>
                      <th class="text-center" width="10%" >Publish Date</th>
                      <th class="text-center" width="15%" >Action </th>
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * From post ORDER BY id DESC";
                    $rap = mysqli_query($db,$sql);
                    $i   = 0;
                    while ( $row = mysqli_fetch_assoc($rap)) {
                      $id               = $row['id'];
                      $name             = $row['name'];
                      $description      = $row['description'];
                      $image            = $row['image'];
                      $cat_id           = $row['cat_id'];
                      $author_id        = $row['author_id'];
                      $status           = $row['status'];
                      $meta_tag         = $row['meta_tag'];
                      $meta_description = $row['meta_description'];
                      $date             = $row['post_date'];
                      $i++;
                  ?> <!-- Tbody php end -->  
                  <tr>
                    <td class="text-center"><?php echo $i ;?></td>
                    <td><?php echo $name ;?></td>
                    <td class="text-center">
                      <img src="img/post/<?php echo $image; ?>" alt="Post Image" class="managepostimg" >
                    </td>
                    <td class="text-center" >
                    	<?php
                    		$sql = "SELECT * FROM category WHERE id = '$cat_id' ";
                    		$rtl = mysqli_query($db, $sql);
                    		while ( $row = mysqli_fetch_assoc($rtl) ) {
                    		  $cat_id   = $row['id'];
                    		  $name = $row['name'];
                    		}
                    		echo "$name";
                    	?>
                    </td>
                    <td class="text-center" >
                    	<?php
                    		$sql = "SELECT * FROM user WHERE id = '$author_id' ";
                    		$rtl = mysqli_query($db, $sql);
                    		while ( $row = mysqli_fetch_assoc($rtl) ) {
                    		  $userid   = $row['id'];
                    		  $name     = $row['name'];
                    		}
                    		echo "$name";
                    	?>
                    </td>
                    <td class="text-center">
                      <!--  1=act 2=ina 3=pan  -->
                      <?php 
                        if ($status == 1) { ?>
                          <span class="badge badge-success">Published</span>
                       <?php  } 
                        else if ($status == 2) { ?>
                          <span class="badge badge-danger">Draft</span>
                       <?php  } ?>
                    </td>
                    <td class="text-center"><?php echo $date ;?></td>
                    <td class="text-center">
                      <a href="post.php?action=edit&editid=<?php echo $id ; ?>" class="btn btn-primary">Edit</a>
                      <a href="post.php?action=delete&deleteid=<?php echo $id ; ?>" class="btn btn-warning">Delete</a>
                    </td>
                  </tr>
                  <?php } ?> <!-- While Loop ending sign -->
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <a href="post.php?action=add" class="btn btn-primary">Register New Post</a>
          <?php }
          else if ($post == 'add') { ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Post New Article </h3>
                </div>
                <div class="card-body">
                  <form action="post.php?action=insert" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" class="form-control" name="name" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="">Category</label>
                          <select class="form-control" name="cat_id" required="required">
                            <option>Select Category</option> 
                            <?php
	                    		$sql = "SELECT * FROM category ORDER BY name ASC";
	                    		$rtl = mysqli_query($db, $sql);
	                    		while ( $row = mysqli_fetch_assoc($rtl) ) {
	                    		  $id   = $row['id'];
	                    		  $name = $row['name'];
	                    		 ?>
                            <option value="<?php echo $id ; ?>" > <?php echo $name; ?> </option>
	                    	<?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Status</label>
                          <select class="form-control" name="status" required="required">
                            <option value="3">Select Status</option>
                            <option value="1">Active</option>
                            <option value="2">Draft</option>
                            <option value="3">Pending</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Tags</label>
                          <input type="text" class="form-control" name="meta_tag" required="required">
                        </div>
                        <div class="form-group">
                          <label for="">Image</label>
                          <input type="file" class="form-control-file" name="image">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="description" rows="15" class="form-control"></textarea>
                        </div>
                      </div>
                      </div>
                      <input type="submit" class="btn btn-primary btn-block btn-flat mx-auto" value="Register post">
                    </div>
                  </form>
                </div>
              </div>
            <?php }
          else if ($post == 'insert' ) {
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
              $name       = $_POST['name'];
              $des        = $_POST['description'];
              $Image      = $_FILES['image'];
              $cat_id     = $_POST['cat_id'];
              $status     = $_POST['status'];
              $meta_tag   = $_POST['meta_tag'];
              $author     = $_SESSION['id'];
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
                $formerror = 'postname is too short!!!';
              }
              if ( $password != $repassword ){
                $formerror = 'Password Doesn\'t match!!!';
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
                $imgname = rand(1,99999).'___'.$imagename;
                move_uploaded_file($imagetemp, "img/post/".$imgname);

                $sql = "INSERT INTO post (name,description,image,cat_id,author_id,status,meta_tag,post_date) VALUES ('$name','$des','$imgname','$cat_id','$author','$status','$meta_tag',now())";
                $addpost = mysqli_query($db, $sql);

                if ( $addpost ){
                  header("Location: post.php?action=manage");
                }
                else{
                  die("MySQLi Query Failed." . mysqli_error($db));
                }
              }

            }
          }
          else if ($post == 'edit') { ?> 
            <?php
              if (isset($_GET['editid'])) {
                $editid = $_GET['editid'];

                $sql = "SELECT * FROM post WHERE id = '$editid' ";
                $rau = mysqli_query($db, $sql);
                while ( $row = mysqli_fetch_assoc($rau)) {
                  $id               = $row['id'];
	              $name             = $row['name'];
	              $description      = $row['description'];
	              $image            = $row['image'];
	              $cat_id           = $row['cat_id'];
	              $author_id        = $row['author_id'];
	              $status           = $row['status'];
	              $meta_tag         = $row['meta_tag'];
	              $meta_description = $row['meta_description'];
	              $date             = $row['post_date'];
            ?>      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit post</h3>
              </div>
              <div class="card-body">
                <form action="post.php?action=update" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name ; ?>">
                      </div>
	                  <div class="form-group">
	                    <label for="">Category</label>
	                    <select class="form-control" name="cat_id" required="required">
                        <option>Select Category</option> 
                        <?php
                    		$sql = "SELECT * FROM category ORDER BY name ASC";
                    		$rtl = mysqli_query($db, $sql);
                    		while ( $row = mysqli_fetch_assoc($rtl) ) {
                    		  $cat_id   = $row['id'];
                    		  $name = $row['name'];
                    		 ?>
                        	<option value="<?php echo $cat_id ; ?>" <?php if($cat_id == $cat_id){echo "selected";}?> > <?php echo $name; ?> </option>
                    	<?php } ?>
                      </select>
	                  </div>
                      <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status">
                          <option value="1" <?php if( $status==1 ){ echo "selected" ; }?>>Published</option>
                          <option value="2" <?php if( $status==2 ){ echo "selected" ; }?>>Draft</option>
                          <option value="3" <?php if( $status==3 ){ echo "selected" ; }?>>Pending</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="">Tag</label>
                        <input type="text" class="form-control" name="meta_tag" value="<?php echo $meta_tag ; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Image</label>
                        <?php
                          if (!empty($image)) { ?>
                            <img src="img/post/<?php echo $image; ?>" alt="" class="editimg" >
                          <?php }else{
                            echo "No Image Uploaded";
                          }
                        ?>
                        <input type="file" class="form-control-file" name="image">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                          <label for="">Description</label>
                          <textarea name="description" id="" cols="30" rows="20" class="form-control"><?php echo $description ; ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="Updateidd" value="<?php echo $id; ?>">
                    <input type="submit" class="btn btn-primary btn-block btn-flat mx-auto" value="Update Post">
                  </div>
                </form>
              </div>
            </div>
            <?php
                }// while end
              }// main if end
            }
          else if ($post == 'update' ) {
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
              $Updateidd  		= $_POST['Updateidd'];
              $name             = $_POST['name'];
              $description      = $_POST['description'];
              $cat_id           = $_POST['cat_id'];
              $author_id        = $_SESSION['id'];;
              $status           = $_POST['status'];
              $meta_tag         = $_POST['meta_tag'];
              $Image      		= $_FILES['image'];
              //image
              $imagename  		= $_FILES['image']['name'];
              $imagesize  		= $_FILES['image']['size'];
              $imagetype  		= $_FILES['image']['type'];
              $imagetemp  		= $_FILES['image']['tmp_name'];
              //Extension
              $support    		= array("jpg","jpeg","png");
              $myexten    		= strtolower(end(explode('.', $imagename)));
              //error
              if (!empty($imagename)) {

		          $removeimg = "SELECT * FROM post WHERE id = '$Updateidd' ";
		          $query     = mysqli_query($db,$removeimg);
		          while ($row = mysqli_fetch_assoc($query) ) {
		            $image = $row['image'];
		          }
		          unlink("img/post/".$image);
	          	  if (!empty($imagename)) {
               	  $imgname = rand(1,99999).'___'.$imagename;
                  }
                  move_uploaded_file($imagetemp, "img/post/".$imgname);

                  $sql = "UPDATE post SET name='$name',description='$description',image='$imgname',cat_id='$cat_id',author_id='$author_id',status='$status',meta_tag='$meta_tag' WHERE id = '$Updateidd' ";
                  $updatepost = mysqli_query($db, $sql);
                  if ( $updatepost ){
                    header("Location: post.php?action=manage");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
              }
              else{
              	 $sql = "UPDATE post SET name='$name',description='$description',cat_id='$cat_id',author_id='$author_id',status='$status',meta_tag='$meta_tag' WHERE id = '$Updateidd' ";
                  $updatepost = mysqli_query($db, $sql);
                  if ( $updatepost ){
                    header("Location: post.php?action=manage");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
              }
            }// isset if
          }// Main if
          //Dellete Post
          else if ($post == 'delete' ) {
            if (isset($_GET['deleteid'])) {
              $deleteid = $_GET['deleteid'];
            
            $removeimg = "SELECT * FROM post WHERE id = '$deleteid' ";
            $query     = mysqli_query($db,$removeimg);
            while ($row = mysqli_fetch_assoc($query) ) {
              $image = $row['image'];
              $role  = $row['role'];
            }
            if (!empty($image) && $role != 1) {
              unlink("img/post/".$image);
            }
            $sql = "DELETE FROM post WHERE id = '$deleteid'";
            $del = mysqli_query($db, $sql);
              if ( $del ){
                header("Location: post.php?action=manage");
              }
              else{
                die("MySQLi Query Failed." . mysqli_error($db));
              }
            }
          }
          else if ($post == 'draft') { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Draft Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th class="text-center" width="5%" >SL</th>
                      <th class="text-center" width="35%" >Title</th>
                      <th class="text-center" width="10%" >Image</th>
                      <th class="text-center" width="10%" >Category</th>
                      <th class="text-center" width="10%" >Author</th>
                      <th class="text-center" width="5%" >Status</th>
                      <th class="text-center" width="10%" >Publish Date</th>
                      <th class="text-center" width="15%" >Action </th>
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * From post WHERE status != 1 ORDER BY id DESC";
                    $rap = mysqli_query($db,$sql);
                    $i   = 0;
                    while ( $row = mysqli_fetch_assoc($rap)) {
                      $id               = $row['id'];
                      $name             = $row['name'];
                      $description      = $row['description'];
                      $image            = $row['image'];
                      $cat_id           = $row['cat_id'];
                      $author_id        = $row['author_id'];
                      $status           = $row['status'];
                      $meta_tag         = $row['meta_tag'];
                      $meta_description = $row['meta_description'];
                      $date             = $row['post_date'];
                      $i++;
                  ?> <!-- Tbody php end -->  
                  <tr>
                    <td class="text-center"><?php echo $i ;?></td>
                    <td><?php echo $name ;?></td>
                    <td class="text-center">
                      <img src="img/post/<?php echo $image; ?>" alt="Post Image" class="managepostimg" >
                    </td>
                    <td class="text-center" >
                      <?php
                        $sql = "SELECT * FROM category WHERE id = '$cat_id' ";
                        $rtl = mysqli_query($db, $sql);
                        while ( $row = mysqli_fetch_assoc($rtl) ) {
                          $cat_id   = $row['id'];
                          $name = $row['name'];
                        }
                        echo "$name";
                      ?>
                    </td>
                    <td class="text-center" >
                      <?php
                        $sql = "SELECT * FROM user WHERE id = '$author_id' ";
                        $rtl = mysqli_query($db, $sql);
                        while ( $row = mysqli_fetch_assoc($rtl) ) {
                          $userid   = $row['id'];
                          $name     = $row['name'];
                        }
                        echo "$name";
                      ?>
                    </td>
                    <td class="text-center">
                      <!--  1=act 2=ina 3=pan  -->
                      <?php 
                        if ($status == 1) { ?>
                          <span class="badge badge-success">Published</span>
                       <?php  } 
                        else if ($status == 2) { ?>
                          <span class="badge badge-danger">Draft</span>
                       <?php  } ?>
                    </td>
                    <td class="text-center"><?php echo $date ;?></td>
                    <td class="text-center">
                      <a href="post.php?action=edit&editid=<?php echo $id ; ?>" class="btn btn-primary">Edit</a>
                      <a href="post.php?action=delete&deleteid=<?php echo $id ; ?>" class="btn btn-warning">Delete</a>
                    </td>
                  </tr>
                  <?php } ?> <!-- While Loop ending sign -->
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <?php  
          }
        ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- Navbar -->
<?php include "inc/footer.php"; ?>
<!-- /.navbar -->

