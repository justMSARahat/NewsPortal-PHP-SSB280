  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dash.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user/<?php echo $_SESSION['image'];?>" class="img-circle elevation-2" alt="User Image" class="profile_image_admin" style="height: 40px; width: 40px; border-radius: 50%;">
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          <li class="nav-item">
            <a href="dash.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">Page Option</li>
            <li class="nav-item">
              <a href="category.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Category
                </p>
              </a>
            </li>


            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-th-large"></i>
                <p>
                  Posts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="post.php?action=manage" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Posts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="post.php?action=add" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Post</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="post.php?action=draft" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Draft Posts</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                  Comments
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="comment.php?action=manage" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Comments</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="comment.php?action=draft" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Draft Comments</p>
                  </a>
                </li>
              </ul>
            </li>

          <li class="nav-header">Features</li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="user.php?action=manage" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="user.php?action=add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add User</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    Settings
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>