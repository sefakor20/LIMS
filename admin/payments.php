<?php
require_once dirname(__DIR__).'./Core/init.php';
$link = new Functions();
$fetch_data = new Fetch($connection);
$date = new DateFormat($connection);

if(empty($_SESSION['admin'])){
  $link->redirect('../login.php');
}

$payments = $fetch_data->getItemsWithLimitOffset("SELECT payments.id, payments.application_id, payments.client_id, payments.momo_number, payments.account_name, payments.amount, payments.status_id, payments.created_at, clients.first_name, clients.surname, clients.other_name, payment_status.name AS payment_status", 'payments', 'JOIN clients ON clients.id = payments.client_id JOIN payment_status ON payment_status.id = payments.status_id', 1000, 0);

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
            <h3 class="card-title">Payments</h3>
          </div>
          <!-- /.card-header -->
              <div class="table-responsive">
                <table id="payments" class="table table-striped">
                  <thead>
                    <th>#</th>
                    <th>Application Number</th>
                    <th>Owner</th>
                    <th>Mobile Number</th>
                    <th>Account Name</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php foreach($payments AS $pay): ?>
                      <tr>
                        <td><?php echo $pay->id; ?></td>
                        <td><?php echo '0050'. $pay->application_id; ?></td>
                        <td><?php echo $pay->first_name . ' '. $pay->surname . ' ' . $pay->other_name; ?></td>
                        <td><?php echo $pay->momo_number; ?></td>
                        <td><?php echo $pay->account_name; ?></td>
                        <td><?php echo $pay->amount; ?></td>
                        <td><?php echo $date->getOnlyDate($pay->created_at); ?></td>
                        <td><?php echo $pay->payment_status; ?></td>
                        <td>
                          <?php if($pay->status_id == 1): ?>
                            <form action="../Submits/approve_payment.php" method="post">
                              <input type="hidden" name="client_id" value="<?php echo $pay->client_id; ?>">
                              <input type="hidden" name="application_id" value="<?php echo $pay->application_id; ?>">
                              <input type="hidden" name="payment_id" value="<?php echo $pay->id; ?>">
                              <button type="submit" name="submit" class="btn btn-sm btn-warning">Approve</button>
                            </form>
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
<script>
   $(function () {
    $("#payments").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  })
</script>
</body>
</html>