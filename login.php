<!-- ::::::::::  HEADER SPLIT START  :::::::: -->
<?php include "inc/header.php"; ?>
<!-- ::::::::::  HEADER SPLIT END  :::::::: -->


    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">User Login</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">login <i class="fa fa-angle-double-right"></i></a></li>
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="widget">
                <h4>User Login</h4>
                <div class="title-border"></div>
                <div class="">
                    <div class="">
                        <div class="">
                          <form action="" method="POST" class="contact-form">
                              <!-- Left Side Start -->
                              <div class="row">
                                  <div class="col-md-12">
                                      <!-- First Name Input Field -->
                                      <div class="form-group">
                                          <input type="email" name="email" placeholder="Your Email Address" class="form-input" autocomplete="off" required="required">
                                      </div>
                                  </div>
                                  <!-- Email Address Input Field -->
                                  
                              </div>
                              <!-- Left Side End -->

                              <!-- Right Side Start -->
                              <div class="row">
                                  <div class="col-md-12">
                                      <!-- Comments Textarea Field -->
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Enter Password" class="form-input" required="required">
                                        </div>
                                      <!-- Post Comment Button -->
                                      <button type="submit" name="login" class="btn-main  cmt-design" style="margin-bottom: 20px; "> Login </button>
                                  </div>
                              </div>
                              <!-- Right Side End -->
                          </form>
                          <?php
                            if (isset($_POST['login'])) {
                              $email    = mysqli_real_escape_string($db , $_POST['email']);
                              $password = mysqli_real_escape_string($db , $_POST['password']);
                              //Password Ganarate
                              $sha1     = sha1($password);

                              $sql   = "SELECT * FROM users WHERE email = '$email' ";
                              $query = mysqli_query($db , $sql);
                              while ($row = mysqli_fetch_assoc($query)) {
                                 $_SESSION['id']       = $row['id'];
                                 $_SESSION['name']     = $row['name'];
                                 $_SESSION['email']    = $row['email'];
                                 $_SESSION['phone']    = $row['phone'];
                                 $_SESSION['address']  = $row['address'];
                                 $_SESSION['password'] = $row['password'];
                                 $_SESSION['status']   = $row['status'];
                                 $_SESSION['gender']   = $row['gender'];
                                 $_SESSION['image']    = $row['image'];
                                 $_SESSION['joindate'] = $row['joindate'];

                               if ($email == $_SESSION['email'] && $sha1 == $_SESSION['password'] && $_SESSION['status'] ==1 ) {
                                  header("location:index.php");
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
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="widget">
                <h4>Registration</h4>
                <div class="title-border"></div>
                <div class="">
                    <div class="">
                        <div class="">
                          <form action="" method="POST" class="contact-form" enctype="multipart/form-data">
                              <!-- Left Side Start -->
                              <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="password" name="password" placeholder="Enter Password" class="form-input" autocomplete="off" required="required">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="password" name="repassword" placeholder="Retype Password" class="form-input" autocomplete="off" required="required">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" placeholder="Address" class="form-input" autocomplete="off" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Phone Number" class="form-input" autocomplete="off" required="required">
                                    </div>
                                    <div class="form-group">
                                      <select name="gender" id="" class="form-input"  required="required">
                                        <option >Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                      </select>  
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" value="Profile Picture" name="image" >
                                    </div>
                                    <button type="submit" name="reg" class="btn-main  cmt-design" style="margin-bottom: 20px; "> Register </button>
                                  </div>
                          <!-- Right Side End -->
                          </form>
                          <?php
                            if (isset($_POST['reg'])) {
                              $name        = $_POST['name'];
                              $email       = $_POST['email'];
                              $phone       = $_POST['phone'];
                              $address     = $_POST['address'];
                              $password    = $_POST['password'];
                              $repassword  = $_POST['repassword'];
                              $gender      = $_POST['gender'];
                              //Image
                              $imagename  = $_FILES['image']['name'];
                              $imagesize  = $_FILES['image']['size'];
                              $imagetype  = $_FILES['image']['type'];
                              $imagetemp  = $_FILES['image']['tmp_name'];
                              //image extenstion
                              $imagesupport  = array("jpg","jpeg","png");
                              //$myimageformat = strtolower(end(explode('.', $imagename)));
                              //error
                              $formerror = array();
                              if (strlen($name) < 5) {
                                $formerror = "Error 1";
                              }
                              if ($password != $repassword) {
                                $formerror = "Error 2";
                              }
                              if (!empty($imagename)) {
                                if (!empty($imagename) && in_array($myimageformat, $imagesupport)) {
                                  $formerror = "Error 3";
                                }
                                if (!empty($imagename) && $imagesize > 2097152) {
                                  $formerror = "Error 4";
                                }
                              }
                              /*foreach ($formerror as $error) {
                                echo "<div>" . $error . "</div>";
                              }*/
                              if (empty($formerror)) {
                                $sha1       = sha1($password);
                                if (!empty($imagename)) {
                                  if (!empty($imagename)) {
                                    $image_name = rand(1,99999).'_'.$imagename;
                                  }
                                  move_uploaded_file($imagetemp, "admin/img/user/".$image_name);
                                  $sql = "INSERT INTO users (name,email,phone,address,password,status,gender,image,joindate) VALUES ('$name','$email','$phone','$address','$sha1',1,'$gender','$image_name',now()) ";
                                  $Query    = mysqli_query($db,$sql);
                                  if ($Query) {
                                      header("Location:index.php");
                                    }else{
                                      die("Failed");
                                    }
                                }


                              } //endif sql
                            }//end if
                          ?>

















                        </div>
                    </div>
                      
                    <!-- Latest News End -->
                </div>
                <!-- Sidebar Latest News Slider End -->
            </div>
          </div>
        </div>
      </div>
    </section>



    

    <!-- :::::::::: Footer Section Start :::::::: -->
    <?php include"inc/footer.php"; ?>
   