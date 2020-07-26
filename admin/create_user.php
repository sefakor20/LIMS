<?php
  require_once dirname(__DIR__).'/Core/init.php';
  $fetch_data = new Fetch($connection);

  $user_role = $fetch_data->getItemsWithNoComparison('SELECT id, name', 'user_role');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'includes/meta.php'; ?>

  <title>Land Management Sytem</title>

  <?php include 'includes/links.php'; ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php include 'includes/top-nav.php'; ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">LMIS</span>
    </a>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 offset-1 mt-5">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">User Registration Form</h3>
          </div>
          <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="../Submits/create_user.php" class="form-horizontal" data-toggle="validator" role="form">
              <div class="card-body">
                
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group row">
                      <label for="first_name" class="col-sm-3 col-form-label text-muted">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" name="first_name" data-error="The First Name field is required!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="surname" class="col-sm-3 col-form-label text-muted">Surname </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="surname" name="surname" data-error="The Surname field is required!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="other_name" class="col-sm-3 col-form-label text-muted">Other Name </label>
                      <div class="col-sm-9">
                        <input type="text" name="other_name" class="form-control" id="other_name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone_number" class="col-sm-3 col-form-label text-muted">Phone Number </label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" id="phone_number" name="phone_no" data-error="The Phone Number field is required and must be numeric!" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="address" class="col-sm-3 col-form-label text-muted">Address </label>
                      <div class="col-sm-9">
                        <textarea name="address" class="form-control" id="address" data-error="The Surname field is required!" required ></textarea>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="role" class="col-sm-3 col-form-label text-muted">Role </label>
                      <div class="col-sm-9">
                        <select name="role" id="role" class="form-control" data-error="Select an item form the list" required>
                          <option value="" class="selected">-- Choose the Role --</option>
                          <?php foreach($user_role AS $role): ?>
                            <option value="<?php echo $role->id; ?>"><?php echo $role->name; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label text-muted">Email </label>
                      <div class="col-sm-9">
                        <input type="email" name="email" id="email" class="form-control" data-error="The email address is invalid" required>
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label text-muted">Password </label>
                      <div class="col-sm-9">
                        <input type="password" name="password" id="password" data-minlength="8" data-error="Minimum password required is 8" class="form-control">
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="confirm_password" class="col-sm-3 col-form-label text-muted">Confirm Password </label>
                      <div class="col-sm-9">
                        <input type="password" name="confirm_password" data-match="#password" data-match-error="Whoops, these don't match" id="confirm_password" class="form-control">
                        <div class="help-block with-errors text-danger"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-info">Register</button>
                <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
      </div>         
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<?php include 'includes/scripts.php'; ?>
</body>
</html>
