<?php
  require_once './Core/init.php';
  $fetch_data = new Fetch($connection);
  $date = new DateFormat($connection);

  if(empty($_SESSION['client'])) {
    $link->redirect('./client_login.php');
  }


  $id_type = $fetch_data->getItemsWithNoComparison('SELECT id, name', 'identification_type');
  $myapplications  =  $fetch_data->getClientApplication($_SESSION['client']);

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
  <style>
    .coagh-img{
      height: 100px;
      width: 120px;
    }
  </style>
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
          <a class="nav-link"  href="./Submits/logout.php"> Logout</a>
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
          <div class="col-md-10 offset-1 mt-5">
          <?php include './admin/includes/alert.php'; ?>
          <div class="card card-default ">
            <div class="card-header">
              <h3 class="card-title">
                Dashboard
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 mt-5 ">
                  <img src="./public/assets/images/coagh.png" class="coagh-img" alt="">
                </div>
                <div class="col-md-9">
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="false">Land Registration</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Search Availability</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                      <a href="apply.php" class="btn btn-warning mt-4">New Application</a>
                      <h3 class="font-weight-normal mt-3">Applications Started or Completed</h3>
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <th>Registration Code</th>
                            <th>Owner</th>
                            <th>Date of Registration</th>
                            <th>Stage</th>
                          </thead>
                          <tbody>
                            <?php foreach($myapplications AS $new):?>
                              <tr>
                                <td><?php echo 'LIMS00'. $new->id; ?></td>
                                <td><?php echo $new->first_name . ' '. $new->surname . ' ' . $new->other_name; ?></td>
                                <td><?php echo $date->getOnlyDate($new->created_at); ?></td>
                                <td>
                                  <?php if($new->application_status == 4 ) { ?>
                                    <a href="#paymentModal<?php echo $new->id; ?>" data-toggle="modal" class="btn btn-warning">Make Payment</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="paymentModal<?php echo $new->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Payment Form</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                          <div class="modal-body">
                                            <div class="container-fluid">
                                            <form action="Submits/make_payment.php" method="post">
                                              <div class="row">
                                              <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                                              <input type="hidden" name="application_id" value="<?php echo $new->id; ?>">
                                                <div class="col-md-12 ">
                                                  <div class="form-group">
                                                  <label for="surveyor" class="font-weight-normal">Mobile Number</label>
                                                    <input type="text" name="momo_number"  placeholder="0590586990" required class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                  <label for="surveyor" class="font-weight-normal">Account Name</label>
                                                    <input type="text" name="account_name" placeholder="Enter name of account holder" required class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                  <label for="surveyor" class="font-weight-normal">Amount to be Paid (GH₵)</label>
                                                    <input type="text" name="amount" disabled value="100" required class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                   <button type="submit" class="btn btn-warning">Make payment</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </form> 
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <img src="./public/assets/images/payment_sticker.png" style="width: 100%;" alt="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <script>
                                      $('#exampleModal').on('show.bs.modal', event => {
                                        var button = $(event.relatedTarget);
                                        var modal = $(this);
                                        // Use above variables to manipulate the DOM
                                        
                                      });
                                    </script>
                                  <?php }  else if($new->application_status == 7) { ?> 
                                    Registered
                                    <a href="certificate.php?id=<?php echo $new->client_id; ?>" target="_blank"  class="btn btn-warning">Print Certificate</a>
                                  <?php } else { ?>
                                    <?php echo $new->status; ?>
                                  <?php } ?>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                      <h3 class="font-weight-normal mt-5 mb-2">Search For Registered Lands</h3> 
                      <form action="land_search.php" method="POST">
                        <div class="row">
                          <!-- <div class="col-md-4">
                            <div class="form-group">
                              <select name="item" id="item" class="form-control">
                                <option value="" class="selected">-- Choose Option --</option>
                              </select>
                            </div>
                          </div> -->
                          <div class="col-md-12">
                            <input type="text" name="owner" placeholder="Enter the search item" class="form-control">
                          </div>
                        </div>
                        <div class="form-group text-center mt-3">
                          <button type="submit" name="submit" class="btn btn-warning">Search</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
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
