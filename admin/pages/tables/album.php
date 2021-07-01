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
  $page = "album";
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
            <h1>Album Selection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Album Selection</li>
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
              <h3 class="card-title">Selections</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>Album name</th>
                  <th>Album link</th>
                  <th>Timestamp</th>
                  <th></th>
                </tr>
                </thead> 
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `album_select`";
                    $album_results = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($album_results)){
                        $uid = $row['user_id'];
                        $qry = "SELECT * FROM `users` WHERE `sr_no` = $uid";
                        $user_result = mysqli_query($conn,$qry);
                        $row2 = mysqli_fetch_assoc($user_result);
                      echo '
                <tr>
                <form method="post" action="'.$link.'routers/album_modify.php">
                  <td>'.$row['id'].'<input type="number" name="sr_no" value="'.$row['id'].'" style="display:none;"></td>
                  <td>'.$row['user_id'].'</td>
                  <td>'.htmlspecialchars($row2['name']).'</td>
                  <td><input type="text" name="name" class="form-control" value="'.htmlspecialchars($row['album_name']).'" placeholder="Enter ..."></td>
                  <td><input type="text" name="link" class="form-control" value="'.htmlspecialchars($row['select_link']).'" placeholder="Enter ..."></td>
                  <td>'.$row['timestamp'].'</td>
                  <td><button type="submit" name="save_album" class="btn btn-primary">Save</button></td>
                  </form>
                </tr>';
                    }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>Album name</th>
                  <th>Album link</th>
                  <th>Timestamp</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="col-md-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add new</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Sr_no</th>
                      <th>Album name</th>
                      <th>Album link</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>                      
                      <tr>
                        <td>-</td>
                        <td>
                          <?php
                          $userqry = "SELECT * FROM `users` WHERE active = 1 ORDER BY `users`.`sr_no` DESC";
                          $list = mysqli_query($conn,$userqry);
                          ?>
                          <form action="<?php echo $link;?>routers/album_add.php" method="post">
                          <select name="user_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                          <?php 
                            while ($urow = mysqli_fetch_assoc($list)) {
                              $user_sr_no = $urow['sr_no'];
                              $sql3 = "SELECT * FROM `album_select` WHERE user_id = $user_sr_no";
                              $album_result = mysqli_query($conn,$sql3);
                              if (mysqli_num_rows($album_result)>0) {
                                $able = "disabled";
                              }
                              else{
                                $able = "";
                              }
                              
                              echo '
                              <option value="'.$user_sr_no.'" '.$able.'>|'.$user_sr_no.'| '.htmlspecialchars($urow['name']).'</option>
                              ';
                            }
                          ?>
                          </select>
                        </td>
                        <td>
                        <input type="text" name="album_name" class="form-control" placeholder="Required" required>
                        </td>
                        <td><input type="text" name="album_link" class="form-control" placeholder="Paste here"></td>
                        <td><button type="submit" name="add_album_selection" class="btn btn-primary">Add</button></td>
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
      </div>
        <!-- /.col -->
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
