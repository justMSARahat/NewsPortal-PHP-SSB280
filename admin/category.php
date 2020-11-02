<!-- Header-->
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
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">categoty</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ADD Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control" required="required">
                  </div>
                  <div class="form-group">
                    <label for="">Category Description</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
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
                      <label for="">Primary Category</label>
                      <select class="form-control" name="is_parrent" required="required">
                        <option>Select Main Category</option>
                        <?php 
                          $sql    = "SELECT * FROM category WHERE is_parrent = 0 ORDER BY name ASC ";
                          $read   = mysqli_query($db,$sql);
                          while ($row = mysqli_fetch_assoc($read) ) {
                            $priid   = $row['id'];
                            $priname = $row['name'];
                        ?>
                          <option value="<?php echo $priid; ?>"><?php echo $priname; ?></option>
                        <?php  } ?>
                      </select>
                  </div>
                  <input type="submit" onclick="success()" class="btn btn-primary btn-block btn-flat mx-auto" value="Add Category" name="submit">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <?php
            if (isset($_POST['submit'])) {
             $name        = mysqli_real_escape_string($db , $_POST['name']);
             $description = mysqli_real_escape_string($db , $_POST['description']);
             $status      = mysqli_real_escape_string($db , $_POST['status']);
             $is_parrent  = mysqli_real_escape_string($db , $_POST['is_parrent']);
             $sql         = "INSERT INTO category (name,description,status,is_parrent) VALUES ('$name','$description','$status','$is_parrent')";
             $addcat      = mysqli_query($db , $sql);
             if ($addcat) {
              header("location:category.php");
             }
             else{
              die("Something Error ".mysqli_error($db));
             }
            }
          ?>
          <div class="col-lg-6">
            <?php
              if (isset($_GET['eid'])) {
                $editid  = $_GET['eid'];
                $sql      = "SELECT * FROM category WHERE id= '$editid' ";
                $querye   = mysqli_query( $db , $sql) ;
                while ( $row = mysqli_fetch_assoc($querye)) {
                  $id          = $row['id'];
                  $name        = $row['name'];
                  $description = $row['description'];
                  $status      = $row['status'];
                  $is_parrent  = $row['is_parrent'];
                ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="">Category Name</label>
                      <input type="text" name="name" class="form-control" required="required" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Category Description</label>
                      <textarea name="description" id="" cols="30" rows="5" class="form-control"><?php echo $description; ?></textarea>
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
                      <label for="">Primary Category</label>
                      <select class="form-control" name="is_parrent" required="required">
                         <option>Primary</option>
                        <?php 
                          $sql    = "SELECT * FROM category WHERE is_parrent = 0 ORDER BY name ASC ";
                          $read   = mysqli_query($db,$sql);
                          while ($row = mysqli_fetch_assoc($read) ) {
                            $priid   = $row['id'];
                            $priname = $row['name'];
                        ?>
                          <option value="<?php echo $priid; ?>" <?php if( $priid == $is_parrent  ){echo 'selected';} ?> ><?php echo $priname; ?></option>
                        <?php  } ?>
                      </select>
                  </div>
                    <input type="submit" class="btn btn-primary btn-block btn-flat mx-auto" value="Update Category" name="update">
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <?php
                if (isset($_POST['update'])) {
                 $name        = $_POST['name'];
                 $description = $_POST['description'];
                 $status      = $_POST['status'];
                 $is_parrent      = $_POST['is_parrent'];
                 $sql         = "UPDATE category SET name='$name',description='$description',status='$status',is_parrent='$is_parrent' WHERE id = '$editid' ";
                 $addcat      = mysqli_query($db , $sql);
                 if ($addcat) {
                  header("location:category.php");
                 }
                 else{
                  die("Something Error ".mysqli_error($db));
                 }
                }
                  

                }// while loop
              }// id end
            ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage User</h3>
              </div>
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">SL</th>
                      <th scope="col">NAME</th>
                      <th scope="col" class="text-center">STATUS</th>
                      <th scope="col" class="text-center">PRIMARY</th>
                      <th scope="col" class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql   = "SELECT * FROM category ORDER BY name ASC";
                      $query = mysqli_query( $db, $sql);
                      $i     = 0;
                      while ($row = mysqli_fetch_assoc($query)) {
                        $id        = $row['id'];
                        $name        = $row['name'];
                        $status      = $row['status'];
                        $is_parrent  = $row['is_parrent'];
                        $i++;
                    ?> 
                    <tr>
                      <th><?php echo $i ; ?></th>
                      <td><?php echo $name ; ?></td>
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
                      <!--  1=act 2=ina 3=pan  -->
                      <?php 
                        if ($is_parrent == 0) { ?>
                          <span class="badge badge-success">Primary</span>
                       <?php  } 
                        else if ($status != 0) { 
                          $sql = "SELECT * FROM category WHERE id = '$is_parrent' ";
                          $rtl = mysqli_query($db, $sql);
                          while ( $row = mysqli_fetch_assoc($rtl) ) {
                            $is_id   = $row['id'];
                            $is_name = $row['name'];
                       ?>
                          <span class="badge badge-primary"><?php echo $is_name;?></span>
                       <?php  } }
                      ?>
                    </td>
                    <td class="text-center">
                      <a href="category.php?eid=<?php echo $id ; ?>" class="btn btn-primary" >Edit</a>
                      <a href="category.php?did=<?php echo $id ; ?>" onclick="success()" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $id; ?>">Delete</a>
                    </td>
                    </tr>
                    <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a  href="category.php?did=<?php echo $id ; ?>" class="btn btn-primary">Confirm</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php  } ?>
                  </tbody>
                </table>
                <!-- Modal -->
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  if (isset($_GET['did'])) {
    $deleteid = $_GET['did'];
    $sql = "DELETE FROM category WHERE id = '$deleteid' ";
    $query= mysqli_query($db,$sql);
    if ($query) {
      header("location:category.php");
     }
     else{
      die("Something Error ".mysqli_error($db));
     }
  }
?>













<!-- Navbar -->
<?php include "inc/footer.php"; ?>
<!-- /.navbar -->

