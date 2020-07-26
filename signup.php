<?php
  require_once './Core/init.php';
  $fetch_data = new Fetch($connection);

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
          <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">User Registration Form</h3>
          </div>
          <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="./Submits/signup_client.php" class="form-horizontal" data-toggle="validator" role="form">
              <div class="card-body">
                
                <div class="row">
                  <div class="col-md-8 offset-2">
                    <div class="form-group row">
                      <label for="first_name" class="col-sm-4 col-form-label font-weight-normal">First Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="first_name" name="first_name" data-error="The First Name field is required!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="surname" class="col-sm-4 col-form-label font-weight-normal">Surname </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="surname" name="surname" data-error="The Surname field is required!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="other_name" class="col-sm-4 col-form-label font-weight-normal">Other Name </label>
                      <div class="col-sm-8">
                        <input type="text" name="other_name" class="form-control" id="other_name">
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label for="id_type" class="col-sm-4 col-form-label font-weight-normal">Identification Type </label>
                      <div class="col-sm-8">
                        <select name="id_type" id="id_type" class="form-control" data-error="Select an item form the list" required>
                          <option value="" class="selected">-- Choose Option --</option>
                          <?php foreach($id_type AS $type): ?>
                            <option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="id_number" class="col-sm-4 col-form-label font-weight-normal">Identification No. </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="id_number" name="id_number" data-error="The Identification Number field is required and must be numeric!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label for="phone_number" class="col-sm-4 col-form-label font-weight-normal">Phone Number </label>
                      <div class="col-sm-8">
                        <input type="tel" class="form-control" id="phone_number" name="phone_no" data-error="The Phone Number field is required and must be numeric!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="address" class="col-sm-4 col-form-label font-weight-normal">Address </label>
                      <div class="col-sm-8">
                        <textarea name="address" class="form-control" id="address" data-error="The Address field is required!" required ></textarea>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label for="email" class="col-sm-4 col-form-label font-weight-normal">E-Mail Address </label>
                      <div class="col-sm-8">
                        <input type="email" name="email" id="email" class="form-control" data-error="The email address is invalid" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-4 col-form-label font-weight-normal">Password </label>
                      <div class="col-sm-8">
                        <input type="password" name="password" id="password" data-minlength="8" data-error="Minimum password required is 8" class="form-control">
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="confirm_password" class="col-sm-4 col-form-label font-weight-normal">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" name="confirm_password" data-match="#password" data-match-error="Whoops, these don't match" id="confirm_password" class="form-control">
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-8">
                        <button type="submit" name="submit" class="btn btn-info">Register</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </form>
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
