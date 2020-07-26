<?php
require_once dirname(__DIR__).'./Core/init.php';
$link = new Functions();
$fetch_data = new Fetch($connection);
$date = new DateFormat($connection);

if(empty($_SESSION['surveyor'])){
  $link->redirect('../login.php');
}

$applications = $fetch_data->getClientApplicationForSurveyor($_SESSION['surveyor']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'includes/meta.php'; ?>

  <title>Land Management Information System</title>

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
                <h3 class="card-title">Registration of Lands</h3>
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <th>#</th>
                    <th>Owner</th>
                    <th>Date of Registration</th>
                    <th>Location</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php foreach($applications AS $new): ?>
                      <tr>
                        <td><?php echo $new->id; ?></td>
                        <td><?php echo $new->first_name . ' '. $new->surname . ' ' . $new->other_name; ?></td>
                        <td><?php echo $date->getOnlyDate($new->created_at); ?></td>
                        <td><?php echo $new->land_location; ?></td>
                        <td>
                          <a href="registration_details.php?uid=<?php echo $new->id; ?>" class="btn btn-info">View details</a>
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
