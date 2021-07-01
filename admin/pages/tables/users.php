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
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
  $page = "users";
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
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
<!-- Userful-----======================================================================== -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr_no</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone no</th>
                  <th>Active</th>
                  <th></th>
                </tr>
                </thead> 
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `users`";
                    $user_results = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($user_results)){
                      if ($row['active'] == 1) {
                        $active = "checked";
                      }
                      else{
                        $active = "";
                      }
                      echo '
                <tr>
                  <td>'.$row['sr_no'].'</td>
                  <td>'.htmlspecialchars($row['name']).'</td>
                  <td>'.htmlspecialchars($row['email']).'</td>
                  <td>'.htmlspecialchars($row['address']).'</td>
                  <td>'.htmlspecialchars($row['phone_no']).'</td>
                  <form method="post" action="'.$link.'routers/user_access.php">
                  <td>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" name="active" value="1" class="custom-control-input" id="customSwitch'.$row['sr_no'].'" '.$active.'>
                        <input style="display:none;" type="number" name="sr_no" value="'.$row['sr_no'].'">
                        <label class="custom-control-label" for="customSwitch'.$row['sr_no'].'"></label>
                    </div>
                  </td>
                  <td><button type="submit" name="save_user"class="btn btn-primary">Save</button></td>
                  </form>
                </tr>';
                    }
                ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Sr_no</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone no</th>
                  <th>Active</th>
                  <th></th>
                </tr>
                </tfoot>
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
                <h3 class="card-title">Add new user</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Full Name*</th>
                      <th>Email*</th>
                      <th>Phone</th>
                      <th>Password*<sub>(min length 5)</sub></th>
                      <th>Address</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>                      
                      <tr>
                        <td>-</td>
                        <form method="post"action="<?php echo $link; ?>routers/user_add.php">
                        <td><input type="text" name="name" class="form-control" placeholder="Required" autocomplete="off" required></td>
                        <td>
                        <input type="email" name="email" class="form-control" placeholder="Required" autocomplete="off" required>
                        </td>
                        <td><input type="tel" name="phone" class="form-control" autocomplete="off" maxlength="10"></td>
                        <td><input type="password" name="password" class="form-control" placeholder="Required" required minlength="5"></td>
                        <td><textarea class="form-control" name="address" name="address" rows="2" autocomplete="off" ></textarea></td>
                        <td><button type="submit" name="add_user" class="btn btn-primary">Add</button></td>
                        </form>
                      </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
