 
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
            <h1 class="m-0 text-dark">Comment Page</h1>
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
          $cmt = isset($_GET['action']) ? $_GET['action'] : 'manage' ;
          if ($cmt == 'manage') { ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Comment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th class="text-center">SL</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Commnet</th>
                      <th class="text-center">Post Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Date</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * From comment ORDER BY id ASC";
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
                      $i++;
                  ?> <!-- Tbody php end -->  
                  <tr>
                    <td class="text-center"><?php echo $i ;?></td>
                    <td><?php echo $name ;?></td>
                    <td><?php echo $comment ;?></td>
                    <td><?php echo $post_id ;?></td>
                    <td><?php echo $email ;?></td>
                    <td class="text-center">
                      <!--  1=act 2=ina 3=pan  -->
                      <?php 
                        if ($status == 1) { ?>
                          <span class="badge badge-success">Approved</span>
                       <?php  } 
                        else if ($status == 2) { ?>
                          <span class="badge badge-danger">Diclined</span>
                       <?php  }
                        else if ($status == 3) { ?>
                          <span class="badge badge-primary">Pending</span>
                       <?php  }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php echo $cmt_date ;?>
                    </td>
                    <td class="text-center">
                      <?php
                        if ($status == 1 ) {
                          echo "<div class='badge badge-success'>Comment Approved</div>"; ?>
                          <a href="comment.php?action=delete&delete=<?php echo $id ; ?>" class="btn btn-danger">Delete</a>
                        
                        <?php }
                        else if ($status == 2 ) {
                          echo "<div class='badge badge-danger'>Comment Dicliend!</div>";
                        }
                        else if ($status == 3 ) { ?>
                          <a href="comment.php?action=app&appid=<?php echo $id ; ?>" class="btn btn-primary">Accept</a>
                          <a href="comment.php?action=trash&deleteid=<?php echo $id ; ?>" class="btn btn-warning">Decline</a>
                          <a href="comment.php?action=delete&delete=<?php echo $id ; ?>" class="btn btn-danger">Delete</a>
                      <?php } ?>
                    <!--    -->
                    </td>
                  </tr>
                  <?php } ?> <!-- While Loop ending sign -->
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <?php }
          if ($cmt == 'draft') { ?>
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
                      <th class="text-center">Name</th>
                      <th class="text-center">Commnet</th>
                      <th class="text-center">Post Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Date</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * From comment WHERE status != 1 ORDER BY id ASC";
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
                      $i++;
                  ?> <!-- Tbody php end -->  
                  <tr>
                    <td class="text-center"><?php echo $i ;?></td>
                    <td><?php echo $name ;?></td>
                    <td><?php echo $comment ;?></td>
                    <td><?php echo $post_id ;?></td>
                    <td><?php echo $email ;?></td>
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
                      <?php echo $cmt_date ;?>
                    </td>
                    <td class="text-center">
                      <?php
                        if ($_SESSION['role']=1 || $_SESSION['role']=2 ) { ?>
                          <a href="comment.php?action=app&appid=<?php echo $id ; ?>" class="btn btn-primary">Accept</a>
                          <a href="comment.php?action=trash&deleteid=<?php echo $id ; ?>" class="btn btn-warning">Decline</a>
                          <a href="comment.php?action=delete&delete=<?php echo $id ; ?>" class="btn btn-danger">Delete</a>
                      <?php  }
                        else{
                          echo "<div class='badge badge-warning' >Only Admin Can Restore Comment</div>";
                        }
                      ?>


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
          else if ($cmt == 'app' ) {
            if (isset($_GET['appid'])) {
              $app_id   = $_GET['appid'];
              $sql      = "UPDATE comment SET status='1' WHERE id = '$app_id' ";
              $app_cmt      = mysqli_query($db, $sql);
              if ( $app_cmt ){
                header("Location: comment.php?action=manage");
              }
              else{
                die("MySQLi Query Failed." . mysqli_error($db));
              }
            }
          }// Main if
          else if ($cmt == 'trash' ) {
            if (isset($_GET['deleteid'])) {
              $deleteid = $_GET['deleteid'];
              $sql = "UPDATE comment SET status='2' WHERE id = '$deleteid' ";
              $del = mysqli_query($db, $sql);
                if ( $del ){
                  header("Location: comment.php?action=manage");
                }
                else{
                  die("MySQLi Query Failed." . mysqli_error($db));
                }
             }
          }





         else if ($cmt == 'delete' ) {
            if (isset($_GET['delete'])) {
              $deleteide = $_GET['delete'];
            

            $sql = "DELETE FROM comment WHERE id = '$deleteide'";
            $del = mysqli_query($db, $sql);
              if ( $del ){
                header("Location: comment.php?action=manage");
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

