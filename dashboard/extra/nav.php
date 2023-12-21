<?php include 'header.php';?>

<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <strong> <a style="color:red;" href="<?php run('/logout', $routes)?>"
                        class="nav-link">Logout</a></strong>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Messages Dropdown Menu -->
            <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="/dashboard/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="/dashboard/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="/dashboard/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> -->
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle "
                style="opacity: .8">
            <span class="brand-text font-weight-light">Coaching</span>
        </a>
        <!-- Sidebar -->
        <?php if ($_SESSION["uid"] == 1) {?>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                    <?php
$id = $_SESSION["id"];
    $sql = "select picture from users_data  where uid = $id";

    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
                    <img height="100" width="100"
                        src="<?php if ($row["picture"] == "") {echo "/dashboard/dist/img/user2-160x160.jpg";} else {echo "/dashboard/images/" . $row["picture"];}}?>" />
                </div>
                <div class=" info">
                    <a href="#" class="d-block"><?php echo $_SESSION['name'] ?></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="<?php run('/regform', $routes)?>"
                            class="nav-link <?php echo $current_page == 'regform.php' ? 'active' : null ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Registration
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>

                    </li>
                    <?php 
                $id = $_SESSION["id"];
                $sql = "select * from users_data  where uid = $id";
            
                $result = $db->query($sql);
                $row = $result->fetch_assoc();
                if ($row["paymentstatus"]==2)
                {
                ?>
                    <li class="nav-item ">
                        <a href="<?php run('/course', $routes)?>"
                            class="nav-link <?php echo $current_page == 'course.php' ? 'active' : null ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Courses
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>

                    </li>
                    <?php }?>
                    <li class="nav-item">
                        <a href="<?php run('/logout', $routes)?>" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p style='color:red;'>
                                Logout

                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <?php }?>
        <?php
if ($_SESSION["uid"] == 0) {
    ?>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                    <img height="100" width="100" src="/dashboard/dist/img/user2-160x160.jpg" style="opacity: .9">

                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin Panel</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="<?php run('/peoplehistory', $routes)?>"
                            class="nav-link <?php echo $current_page == 'peoplehistory.php' ? 'active' : null ?> ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                People History
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a href="<?php run('/paymentinfo', $routes)?>"
                            class="nav-link <?php echo $current_page == 'paymentinformation.php' ? 'active' : null ?> ">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Payment info
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>

                    </li>
                    <li class="nav-item <?php echo $current_page == 'regform.php' ? 'active' : null ?>">
                        <a href="<?php run('/logout', $routes)?>" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p style='color:red;'>
                                Logout

                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>

        <?php }?>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <section class="content">