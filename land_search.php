<?php
  require_once './Core/init.php';
  $fetch_data = new Fetch($connection);
  $date = new DateFormat($connection);

  if(empty($_SESSION['client'])) {
    $link->redirect('./client_login.php');
  }


  $id_type = $fetch_data->getItemsWithNoComparison('SELECT id, name', 'identification_type');
  $myapplications  =  $fetch_data->getClientApplication($_SESSION['client']);

  if(Inputs::submitType()) {
    $owner = Inputs::assignValue('owner');

    $attendance_result = $fetch_data->searchRegisteredLands($owner);
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Land Management Infomation Systems | Client Sign Up</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .coagh-img{
      height: 100px;
      width: 120px;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="./public/assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-normal">LANDMIS</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link"  href="./Submits/logout.php"> Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-10 offset-1 mt-5">
          <?php include './admin/includes/alert.php'; ?>
          <div class="card card-default ">
            <div class="card-header">
              <h3 class="card-title">
                Search Details
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 mt-5 ">
                  <img src="./public/assets/images/coagh.png" class="coagh-img" alt="">
                </div>
                <div class="col-md-9">
                  <h3 class="font-weight-normal mt-3">Results</h3>
                  <?php if(!empty($attendance_result)){ ?>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <th>Registration Code</th>
                          <th>Owner</th>
                          <th>Date of Registration</th>
                        </thead>
                        <tbody>
                          <?php foreach($attendance_result AS $new):?>
                            <tr>
                              <td><?php echo 'LIMS00'. $new->id; ?></td>
                              <td><?php echo $new->name_of_owner ?></td>
                              <td><?php echo $date->getOnlyDate($new->created_at); ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  <?php } else {?>
                    <h3 class="text-danger">No record found!!!</h3>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/validator.min.js"></script>
</body>
</html>
