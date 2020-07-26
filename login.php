<?php 
  require_once './Core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Land Management Infomation Systems | Login</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
          <a class="nav-link"  href="login.php"> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="signup.php"> Sign Up</a>
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
          <div class="col-md-8 offset-2 mt-5">
            <div class="d-flex justify-content-center">
            <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
              <div class="card-body login-card-body">
                <p class="login-box-msg">Admin / Surveyors Login Form</p>
                  <form action="./Submits/login.php" method="post">
                    <div class="input-group mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Email">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    <?php if(isset($_SESSION['error'])){ ?>
                      <p class="text-danger mb-3"><?php echo $_SESSION['error']; ?></p>
                    <?php } $_SESSION['error'] = null; ?>
                    <div class="input-group mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <div class="icheck-primary">
                          <input type="checkbox" id="remember">
                          <label for="remember">
                            Remember Me
                          </label>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                      </div>
                      <!-- /.col -->
                    </div>
                    </form>
                    <div class="social-auth-links text-center mb-3">
                      <p>- OR -</p>
                      <a href="client_login.php" class="btn btn-block btn-default">
                        <i class="fa fa-user mr-2"></i> Sign in As a Client
                      </a>
                      <a href="signup.php" class="btn btn-block btn-default">
                        <i class="fa fa-edit mr-2"></i> Create new account
                      </a>
                    </div>
                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
              <br>
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
</body>
</html>
