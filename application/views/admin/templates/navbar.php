<header class="main-header">
  <!-- Logo -->
  <a href="<?= base_url('admin'); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>P</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Sipapat</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">0</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 0 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <!--  -->
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">0</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 0 tasks</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="#">View all</a>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets/images/users/'.USER['gambar']); ?>" class="user-image" alt="<?= USER['gambar']; ?>">
            <span class="hidden-xs"><?= USER['name']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= base_url('assets/images/users/'.USER['gambar']); ?>" class="img-circle" alt="<?= USER['gambar']; ?>">

              <p>
                <?= USER['nama']; ?>
                <small>Member since <?= date('M Y', strtotime(USER['created_at'])); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>