<?php session_start(); 
        if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] = "admin") {
        }
        else {
                $header_link = "../../pages/login";
                header("location:$header_link");
                exit();
        }
?>
<?php
  include '../../../includes/connect_db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YUG MOVIES | Product Table</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
  $page = "service";
  $page_type = "sub";
  include '../_header.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $sql = "SELECT * FROM `slider_img`";
                    $pro_results = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($pro_results)){
                      echo '
                      <tr>
                      <form action="'.$link.'routers/slider_modify.php" method="POST" enctype="multipart/form-data">
                        <td>'.$row['id'].'.<input name="id" type="number" value="'.$row['id'].'" style="display:none;"></td>
                        <td><input type="text" value="'.htmlspecialchars($row['title']).'" name="title" class="form-control" placeholder="Enter ..."></td>
                        <td>
                          <img src="../../../'.$row['image_link'].'" alt="'.$row['title'].'" height="100" id="pimg'.$row['id'].'">
                          <input id="upl'.$row['id'].'" type="file" name="image">
                        </td>
                        <td><button type="submit" name="save_slider" class="btn btn-primary">Save</button></td>
                      </tr>
                      </form>
                      ';
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-12">
            
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent works</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM `services_img` ORDER BY `services_img`.`id` DESC";
                    $pro_results = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($pro_results)){
                      echo '
                      <tr>
                        <form action="'.$link.'routers/work_delete.php" method="POST">
                        <td>'.$row['id'].'.<input type="number" name="id" value="'.$row['id'].'" style="display:none"></td>
                        <td>'.htmlspecialchars($row['name']).'</td>
                        <td>
                        <img src="../../../'.$row['image_link'].'" alt="'.$row['name'].'" height="100">
                        </td>
                        <td>
                          <button type="submit" name="delete_work" class="btn btn-danger">Delete</button>
                        </td>
                        </form>
                        </tr>
                      ';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add new work</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>                     
                      <tr>
                        <td>-</td>
                        <form action="<?php echo $link; ?>routers/work_add.php" method="post" enctype="multipart/form-data">
                        <td><input type="text" name="name" class="form-control" placeholder="Enter ..." required></td>
                        <td>
                          <input type="file" name="image" id="exampleInputFile" required>
                        </td>
                        <td><button type="submit" name="add_work" class="btn btn-primary">Add</button></td>
                        </form>
                      </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
      <?php
          $sql = "SELECT * FROM `products`";
          $pro_results = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_assoc($pro_results)){
            echo "
            function readURL".$row['id']."(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  
                  reader.onload = function (e) {
                      $('#pimg".$row['id']."').attr('src', e.target.result);
                  }
                  
                  reader.readAsDataURL(input.files[0]);
              }
          }
          $('#upl".$row['id']."').change(function(){
              readURL".$row['id']."(this);
          });
          ";
        }
      ?>
</script>
</body>
</html>
