<?php 
  require_once dirname(__DIR__).'/Core/init.php'; 
  $fetch_data = new Fetch($connection);
  $date = new DateFormat($connection);

  $users = $fetch_data->getItemsWithLimitOffset("SELECT users.id, users.user_role, users.account_status, users.first_name, users.surname, users.other_name, users.phone_no, users.address, users.email, users.email, users.created_at, user_role.name AS role", 'users', 'JOIN user_role ON user_role.id = users.user_role', 100, 0);
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
          <?php include 'includes/alert.php'; ?>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">User Registration Form</h3>
          </div>
          <!-- /.card-header -->
            <div class="d-flex justify-content-start mb-5 mt-4 ml-3">
            <a href="create_user.php" class="btn btn-warning text-white"><i class="fa fa-user-plus"></i> New User</a>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>User Role</th>
                  <th>Email</th>
                  <th>Added On</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php foreach($users AS $user): ?>
                    <tr>
                      <td><?php echo $user->id; ?></td>
                      <td><?php echo $user->first_name . ' ' . $user->surname . ' ' . $user->other_name; ?></td>
                      <td><?php echo $user->role; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $date->timeAgo($user->created_at); ?></td>
                      <td>
                        <?php if($user->user_role != 1): ?>
                          <?php if($user->account_status == 2) { ?>
                          <a href="../Submits/monitor.php?activate=<?php echo $user->id; ?>" class="btn btn-info">Activate</a>
                          <?php } else { ?>
                            <a href="../Submits/monitor.php?deactivate=<?php echo $user->id; ?>" class="btn btn-danger">Deactivate</a>
                          <?php } ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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
