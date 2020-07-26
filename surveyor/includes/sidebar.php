<?php 

require_once '../Classes/Functions.php';
require_once '../Classes/Fetch.php';
$active = new Functions();
$notify = new Fetch($connection); 

$total_task = $notify->getTotalAssignedTasks($_SESSION['surveyor']);

?>
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../public/assets/images/logo.png" style="border: 3px solid #fff; height: 50px; width:50px;" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Welcome,</a>
      <a href="#" class="d-block">LAND MGT SYS</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-header">MENU</li>
      <li class="nav-item">
        <a href="index.php" class="nav-link <?php echo $active->activePage('index.php'); ?>">
          <i class="nav-icon fas fa-home"></i>
          <p>
            DASHBOARD
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="registration.php" class="nav-link <?php echo $active->activePage('registration.php'); ?>">
          <i class="nav-icon fa fa-tasks"></i>
          <p>
            Assigned Tasks &nbsp;<div class="badge badge-danger"> <?php echo $total_task; ?></div>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="../Submits/logout.php" class="nav-link">
          <i class="nav-icon fa fa-sign-out-alt"></i>
          <p>
            LOGOUT
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>