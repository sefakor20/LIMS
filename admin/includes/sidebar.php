<?php 

require_once '../Classes/Functions.php';
$notify = new Fetch($connection);
$active = new Functions();

$new_reg = $notify->getTotalNewLandRegistration();
$total_pending_payments = $notify->getTotalPaymentPending();

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
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            REGISTERED
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="registered.php" class="nav-link <?php echo $active->activePage('registered.php'); ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Registered Lands</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-history"></i>
          <p>
            SURVEYORS
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="surveyors.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>List Of Surveyors</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="registration.php" class="nav-link <?php echo $active->activePage('registration.php'); ?>">
          <i class="nav-icon fa fa-edit"></i>
          <p>
            REGISTRATIONS &nbsp;<i class="badge badge-danger"><?php echo $new_reg; ?></i>
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money-bill-alt"></i>
          <p>
            PAYMENTS &nbsp;<i class="badge badge-warning"><?php echo $total_pending_payments; ?></i>
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="payments.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Payment Summary</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="users.php" class="nav-link <?php echo $active->activePage('users.php'); ?>">
          <i class="nav-icon fas fa-users"></i>
          <p>
            USERS
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