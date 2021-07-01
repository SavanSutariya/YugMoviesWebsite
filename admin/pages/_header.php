<?php //session_start(); 
?>
<?php
//Dynamic links

if (isset($page_type)) {
  if ($page_type == "sub") {
    $link = "../../";
  }
  else{
    $link = "";
  }
}
else {
  $link = "../";
}


?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link btn btn-danger text-white" href="<?php echo $link ?>routers/admin_logout.php">
          <i class="fas fa-sign-out-alt"></i>
        Logout
        </a>
      </li>
    

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $link;?>../admin" class="brand-link">
      <img src="<?php echo $link;?>dist/img/AdminLTELogo.png" alt="Yug Movie Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">YUG MOVIES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $link;?>dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <div class="d-block text-white">Anil Patel</div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo $link;?>../admin" class="nav-link <?php if($page == "main"){echo "active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $link;?>pages/tables/users.php" class="nav-link <?php if($page == "users"){echo "active";}?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $link;?>pages/tables/products.php" class="nav-link <?php if($page == "products"){echo "active";}?>"x >
              <i class="nav-icon fas fa-tshirt"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $link;?>pages/tables/album.php" class="nav-link <?php if($page == "album"){echo "active";}?>">
              <i class="nav-icon far fa-images"></i>
              <p>
                Album Selection
              </p>
            </a>
          </li>
          <li class="nav-header"></li> 
          <li class="nav-item">
            <a href="<?php echo $link;?>pages/tables/services.php" class="nav-link <?php if($page == "service"){echo "active";}?>">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Recent work
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo $link;?>pages/tables/contact.php" class="nav-link <?php if($page == "contact"){echo "active";}?>">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Contact
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
