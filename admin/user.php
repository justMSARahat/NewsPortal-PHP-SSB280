
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
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
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
          $user = isset($_GET['action']) ? $_GET['action'] : 'manage' ;
          if ($user == 'manage') { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th class="text-center">Role</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Gender</th>
                      <th class="text-center">Join Date</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * From user";
                    $rau = mysqli_query($db,$sql);
                    $i   = 0;
                    while ( $row = mysqli_fetch_assoc($rau)) {
                      $id       = $row['id'];
                      $name     = $row['name'];
                      $email    = $row['email'];
                      $phone    = $row['phone'];
                      $address  = $row['address'];
                      $role     = $row['role'];
                      $status   = $row['status'];
                      $gender   = $row['gender'];
                      $image    = $row['image'];
                      $joindate = $row['joindate'];
                      $i++;
                  ?> <!-- Tbody php end -->  
                  <tr>
                    <td class="text-center"><?php echo $i ;?></td>
                    <td class="text-center">
                      <img src="img/user/<?php echo $image; ?>". alt="Profile Picture" class="manageimg" >
                    </td>
                    <td><?php echo $name ;?></td>
                    <td><?php echo $email ;?></td>
                    <td><?php echo $phone ;?></td>
                    <td><?php echo $address ;?></td>
                    <td class="text-center">
                      <!-- 1=super 2=admin 3=editor  -->
                      <?php 
                        if ($role == 1) { ?>
                          <span class="badge badge-success">Super Admin</span>
                       <?php  } 
                        else if ($role == 2) { ?>
                          <span class="badge badge-success">Admin</span>
                       <?php  }
                        else if ($role == 3) { ?>
                          <span class="badge badge-Warning">Editor</span>
                       <?php  }
                      ?>
                    </td>
                    <td class="text-center">
                      <!--  1=act 2=ina 3=pan  -->
                      <?php 
                        if ($status == 1) { ?>
                          <span class="badge badge-success">Active</span>
                       <?php  } 
                        else if ($status == 2) { ?>
                          <span class="badge badge-danger">Inactive</span>
                       <?php  }
                        else if ($status == 3) { ?>
                          <span class="badge badge-Warning">Pending</span>
                       <?php  }
                      ?>
                    </td>
                    <td class="text-center">
                      <!--  1=male 2=female 3=other   -->
                      <?php 
                        if ($gender == 1) { ?>
                          <span class="badge badge-success">Male</span>
                       <?php  } 
                        else if ($gender == 2) { ?>
                          <span class="badge badge-success">Female</span>
                       <?php  }
                        else if ($gender == 3) { ?>
                          <span class="badge badge-success">Other</span>
                       <?php  }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php echo $joindate ;?>
                    </td>
                    <td class="text-center">
                      <a href="user.php?action=edit&editid=<?php echo $id ; ?>" class="btn btn-primary">Edit</a>
                      <a href="user.php?action=delete&deleteid=<?php echo $id ; ?>" class="btn btn-warning">Delete</a>
                    </td>
                  </tr>
                  <?php } ?> <!-- While Loop ending sign -->
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <a href="user.php?action=add" class="btn btn-primary">Register New User</a>
          <?php }
          else if ($user == 'add') { ?>
	            <div class="card">
	              <div class="card-header">
	                <h3 class="card-title">Register New User </h3>
	              </div>
	              <div class="card-body">
	                <form action="user.php?action=insert" method="POST" enctype="multipart/form-data">
	                  <div class="row">
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label for="">Name</label>
	                        <input type="text" class="form-control" name="name" required="required">
	                      </div>
	                      <div class="form-group">
	                        <label for="">Email</label>
	                        <input type="text" class="form-control" name="email" required="required">
	                      </div>
	                      <div class="form-group">
	                        <label for="">Phone</label>
	                        <input type="text" class="form-control" name="phone" required="required">
	                      </div>
	                      <div class="form-group">
	                        <label for="">Address</label>
	                        <input type="text" class="form-control" name="address" required="required">
	                      </div>
	                      <div class="form-group">
	                        <label for="">Gender</label>
	                        <select class="form-control" name="gender">
	                          <option>Please Select Gender</option>
	                          <option value="1">Male</option>
	                          <option value="2">Female</option>
	                          <option value="3">Other</option>
	                        </select>
	                      </div>
	                    </div>
	                    <div class="col-lg-6">
	                      <div class="form-group">
	                        <label for="">Password</label>
	                        <input type="password" class="form-control" name="password" required="required">
	                      </div>
	                      <div class="form-group">
	                        <label for="">Retype Password</label>
	                        <input type="password" class="form-control" name="repassword" required="required">
	                      </div>
	                      <div class="form-group">
	                        <label for="">Role</label>
	                        <select class="form-control" name="role">
	                          <option>Select Role</option>
	                          <option value="2">Admin</option>
	                          <option value="3">Editor</option>
	                        </select>
	                      </div>
	                      <div class="form-group">
	                        <label for="">Status</label>
	                        <select class="form-control" name="status" required="required">
	                          <option value="3">Select Status</option>
	                          <option value="1">Active</option>
	                          <option value="2">Inactive</option>
	                          <option value="3">Pending</option>
	                        </select>
	                      </div>
	                      <div class="form-group">
	                        <label for="">Image</label>
	                        <input type="file" class="form-control-file" name="image">
	                      </div>
	                    </div>
	                    <input type="submit" class="btn btn-primary btn-block btn-flat mx-auto" value="Register User">
	                  </div>
	                </form>
	              </div>
	            </div>
	          <?php }
          else if ($user == 'insert' ) {
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
              $name       = $_POST['name'];
              $email      = $_POST['email'];
              $phone      = $_POST['phone'];
              $address    = $_POST['address'];
              $gender     = $_POST['gender'];
              $password   = $_POST['password'];
              $repassword = $_POST['repassword'];
              $role       = $_POST['role'];
              $status     = $_POST['status'];
              $Image      = $_FILES['image'];
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
                $sha1    = sha1($password);
                $imgname = rand(1,99999).'___'.$imagename;
                move_uploaded_file($imagetemp, "img/user/".$imgname);

                $sql = "INSERT INTO user ( name, email, phone, address, password, role, status, gender, image, joindate ) VALUES ('$name', '$email', '$phone', '$address', '$sha1', '$role', '$status', '$gender', '$imgname', now() )";
                $addUser = mysqli_query($db, $sql);

                if ( $addUser ){
                  header("Location: user.php?action=manage");
                }
                else{
                  die("MySQLi Query Failed." . mysqli_error($db));
                }
              }

            }
          }
          else if ($user == 'edit') { 
              if (isset($_GET['editid'])) {
                $editid = $_GET['editid'];

                $sql = "SELECT * FROM user WHERE id = '$editid' ";
                $rau = mysqli_query($db, $sql);
                while ( $row = mysqli_fetch_assoc($rau)) {
                  $id       = $row['id'];
                  $name     = $row['name'];
                  $email    = $row['email'];
                  $phone    = $row['phone'];
                  $address  = $row['address'];
                  $role     = $row['role'];
                  $status   = $row['status'];
                  $gender   = $row['gender'];
                  $image    = $row['image'];
                  $joindate = $row['joindate'];
            ?>      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <div class="card-body">
                <form action="user.php?action=update" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name ; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email ; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone ; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $address ; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Gender</label>
                        <select class="form-control" name="gender">
                          <option value="1" <?php if( $gender==1 ){ echo "selected" ; }?>>Male</option>
                          <option value="2" <?php if( $gender==2 ){ echo "selected" ; }?>>Female</option>
                          <option value="3" <?php if( $gender==3 ){ echo "selected" ; }?>>Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Please Enter A Password If you Want to change...">
                      </div>
                      <div class="form-group">
                        <label for="">Retype Password</label>
                        <input type="password" class="form-control" name="repassword" placeholder="Retype The Password...">
                      </div>
                      <div class="form-group">
                        <label for="">Role</label>
                        <select class="form-control" name="role">
                          <option value="1" <?php if( $role==1 ){ echo "selected" ; }?> >Super Admin</option>
                          <option value="2" <?php if( $role==2 ){ echo "selected" ; }?> >Admin</option>
                          <option value="3" <?php if( $role==3 ){ echo "selected" ; }?> >Editor</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status" >
                          <option value="1" <?php if( $status==1 ){ echo "selected" ; }?> >Active</option>
                          <option value="2" <?php if( $status==2 ){ echo "selected" ; }?> >Inactive</option>
                          <option value="3" <?php if( $status==3 ){ echo "selected" ; }?> >Pending</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Image</label>
                        <?php
                          if (!empty($image)) { ?>
                            <img src="img/user/<?php echo $image; ?>" alt="" class="editimg" >
                          <?php }else{
                            echo "No Image Uploaded";
                          }
                        ?>
                        <input type="file" class="form-control-file" name="image">
                      </div>
                    </div>
                    <input type="hidden" name="Updateidd" value="<?php echo $id; ?>">
                    <input type="submit" class="btn btn-primary btn-block btn-flat mx-auto" value="Update User">
                  </div>
                </form>
              </div>
            </div>
            <?php
                }// while end
              }// main if end
            }
          else if ($user == 'update' ) {
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
              $Updateidd  = $_POST['Updateidd'];
              $name       = $_POST['name'];
              $email      = $_POST['email'];
              $phone      = $_POST['phone'];
              $address    = $_POST['address'];
              $gender     = $_POST['gender'];
              $password   = $_POST['password'];
              $repassword = $_POST['repassword'];
              $role       = $_POST['role'];
              $status     = $_POST['status'];
              $Image      = $_FILES['image'];
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
                if (!empty($password) && !empty($imagename)) {
                  $sha1    = sha1($password);
                
                  $removeimg = "SELECT * FROM user WHERE id = '$Updateidd' ";
                  $query     = mysqli_query($db,$removeimg);
                  while ($row = mysqli_fetch_assoc($query) ) {
                    $image = $row['image'];
                  }
                  unlink("img/user/".$image);
                  
                  if (!empty($imagename)) {
                    $imgname = rand(1,99999).'___'.$imagename;
                  }
                  move_uploaded_file($imagetemp, "img/user/".$imgname);

                  $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', address='$address', password='$sha1', role='$role', status='$status', gender='$gender', image='$imgname' WHERE id = '$Updateidd' ";
                  $updateUser = mysqli_query($db, $sql);
                  if ( $updateUser ){
                    header("Location: user.php?action=manage");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                }
                else if (!empty($password) && empty($imagename)) {
                  $sha1    = sha1($password);
                  $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', address='$address', password='$sha1', role='$role', status='$status', gender='$gender' WHERE id = '$Updateidd' ";
                  $updateUser = mysqli_query($db, $sql);
                  if ( $updateUser ){
                    header("Location: user.php?action=manage");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                }
                else if (!empty($imagename) && empty($password)) {
                  $removeimg = "SELECT * FROM user WHERE id = '$Updateidd' ";
                  $query     = mysqli_query($db,$removeimg);
                  while ($row = mysqli_fetch_assoc($query) ) {
                    $image = $row['image'];
                  }
                  unlink("img/user/".$image);
                  if (!empty($imagename)) {
                    $imgname = rand(1,99999).'___'.$imagename;
                  }
                  move_uploaded_file($imagetemp, "img/user/".$imgname);

                  $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status', gender='$gender', image='$imgname' WHERE id = '$Updateidd' ";
                  $updateUser = mysqli_query($db, $sql);


                  if ( $updateUser ){
                    header("Location: user.php?action=manage");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                }
                else{
                  $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', address='$address', role='$role', status='$status', gender='$gender' WHERE id = '$Updateidd' ";
                  $updateUser = mysqli_query($db, $sql);
                  if ( $updateUser ){
                    header("Location: user.php?action=manage");
                  }
                  else{
                    die("MySQLi Query Failed." . mysqli_error($db));
                  }
                }



              }// empty form error close 
            }// isset if
          }// Main if
          else if ($user == 'delete' ) {
            if (isset($_GET['deleteid'])) {
              $deleteid = $_GET['deleteid'];
            
            $removeimg = "SELECT * FROM user WHERE id = '$deleteid' ";
            $query     = mysqli_query($db,$removeimg);
            while ($row = mysqli_fetch_assoc($query) ) {
              $image = $row['image'];
              $role  = $row['role'];
            }
            if (!empty($image) && $role != 1) {
              unlink("img/user/".$image);
            }

            $sql = "DELETE FROM user WHERE id = '$deleteid' AND role != 1 ";
            $del = mysqli_query($db, $sql);
              if ( $del ){
                header("Location: user.php?action=manage");
              }
              else{
                die("MySQLi Query Failed." . mysqli_error($db));
              }
            }
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

