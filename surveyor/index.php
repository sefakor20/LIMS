<?php
require_once dirname(__DIR__).'./Core/init.php';
$link = new Functions();
$fetch_data = new Fetch($connection);

if(empty($_SESSION['surveyor'])){
  $link->redirect('../login.php');
}

$total_users = $fetch_data->getTotal('users');
$total_new_reg = $fetch_data->getTotalNewLandRegistration();
$total_surveyors = $fetch_data->getTotalSurveyors(); 
$total_task = $fetch_data->getTotalAssignedTasks($_SESSION['surveyor']);

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Assigned Tasks</span>
                <span class="info-box-number"><?php echo $total_task; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
