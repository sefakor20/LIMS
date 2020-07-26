<?php
  require_once './Core/init.php';
  $fetch_data = new Fetch($connection);
  $link = new Functions();

  if(empty($_SESSION['client'])) {
    $link->redirect('./client_login.php');
  }

  $id_type = $fetch_data->getItemsWithNoComparison('SELECT id, name', 'identification_type');

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
          <div class="card card-default ">
            <div class="card-header">
              <h3 class="card-title">
                Application: For Land Registration
              </h3>
            </div>
            <div class="card-body">
              <h5 class="mt-2">Kindly fill in the following infomation to start the application for registration of your land</h5>
              <hr>
              <br>
              <form action="Submits/stage1.php" method="post">
                <h3 class="offset-2 mb-3">Apply to register your land</h3>
                <div class="row">
                <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                  <div class="col-md-6 offset-2">
                    <div class="form-group">
                      <input type="text" name="location" placeholder="Enter Location of Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="text" name="owner" placeholder="Name of Owner of Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <select name="means_of_acquisition" id="means_of_acquisition" class="form-control">
                        <option value="" class="selected">-- Choose Means of Aquisition --</option>
                        <option value="1">By Inheritance</option>
                        <option value="2">By Purchase</option>
                        <option value="3">By Lease</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="surveyor" class="font-weight-normal">Prodvide the name of the one who surveyed the land</label>
                      <input type="text" name="surveyor" placeholder="Name of Surveyor" required class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="text" name="surveyor_id" placeholder="License Number of Surveyor" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="witness" class="font-weight-normal">Proivde the details of the witness</label>
                      <input type="text" name="witness" placeholder="Enter the name of the witness" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="tel" name="witness_number" placeholder="Enter the phone number of witness"  class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-info">Save Land Information</button>
                    </div>
                  </div>
                </div>
              </form>
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
