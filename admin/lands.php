
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

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 offset-1 mt-5">
        <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Registered Lands</h3>
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <th>#</th>
                    <th>Titile</th>
                    <th>Owner</th>
                    <th>Date Registered</th>
                    <th>Location</th>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Land</td>
                      <td>Richard</td>
                      <td>2020</td>
                      <td>Ho</td>
                    </tr>
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
