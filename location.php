<?php
  require_once './Core/init.php';
  $fetch_data = new Fetch($connection);
  $link = new Functions();
  $date = new DateFormat($connection);

  if(empty($_SESSION['client'])) {
    $link->redirect('./client_login.php');
  }

  $id_type = $fetch_data->getItemsWithNoComparison('SELECT id, name', 'identification_type');

  $selected_client = $fetch_data->getSigleJoinItem("SELECT land_applications.id, land_applications.client_id, land_applications.land_location, land_applications.name_of_owner, clients.first_name, clients.surname, land_applications.means_of_acquisition, land_applications.surveyor, land_applications.surveyor_license_id, land_applications.witness, land_applications.witness_phone, land_applications.application_status, land_applications.created_at, acquisition.name AS acquistion", 'land_applications', 'JOIN clients ON clients.id = land_applications.client_id JOIN acquisition ON acquisition.id = land_applications.means_of_acquisition', 'land_applications.client_id', $_SESSION['client']);

  // $documents = $fetch_data->getSingleItem('SELECT documents.id, documents.name AS doc, documents.created_at', 'documents', 'documents.client_id', $_SESSION['client']); var_dump($documents);exit();

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
                Application Form
              </h3>
            </div>
            <div class="card-body">
              <div class="card card-default mt-4">
                <div class="card-header">
                  <h3 class="card-title">Information</h3>
                </div>
                <div class="card-body">
                  <div>
                    <span style="float: left; width: 200px; margin-right: 10px;"> Registration Code</span>
                    <span><?php echo 'lmis00'. $selected_client->id; ?></span>
                    <hr style="margin: 0.01em;">
                  </div>
                  <div>
                    <span style="float: left; width: 200px; margin-right: 10px;"> Land Owner</span>
                    <span><?php echo $selected_client->name_of_owner; ?></span>
                    <hr style="margin: 0.01em;">
                  </div>
                  <div>
                    <span style="float: left; width: 200px; margin-right: 10px;"> Registration Started ON</span>
                    <span><?php echo $date->getOnlyDate($selected_client->created_at); ?></span>
                    <hr style="margin: 0.01em;">
                  </div>
                </div>
              </div>
              <hr>
              <br>
            </div>
            <div class="card-body">
            <h4>Custom Content Below</h4>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">land Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Location</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Documents Uplod</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <form action="Submits/stage1.php" method="post">
                <h3 class="mt-5">Apply to register your land</h3>
                <div class="row">
                <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <input type="text" name="location" value="<?php echo $selected_client->land_location; ?>" placeholder="Enter Location of Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="text" name="owner" value="<?php echo $selected_client->name_of_owner; ?>" placeholder="Name of Owner of Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <select name="means_of_acquisition" id="means_of_acquisition" class="form-control">
                        <option value="<?php echo $selected_client->means_of_acquisition; ?>" class="selected"><?php echo $selected_client->acquistion; ?></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="surveyor" class="font-weight-normal">Prodvide the name of the one who surveyed the land</label>
                      <input type="text" name="surveyor" value="<?php echo $selected_client->surveyor; ?>" placeholder="Name of Surveyor" required class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="text" name="surveyor_id" value="<?php echo $selected_client->surveyor_license_id;?>" placeholder="License Number of Surveyor" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="witness" class="font-weight-normal">Proivde the details of the witness</label>
                      <input type="text" name="witness" value="<?php echo $selected_client->witness; ?>" placeholder="Enter the name of the witness" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="tel" name="witness_number" value="<?php echo $selected_client->witness_phone; ?>" placeholder="Enter the phone number of witness"  class="form-control">
                    </div>
                    <!-- <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-info">Save Land Information</button>
                    </div> -->
                  </div>
                </div>
              </form> 
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
              <form action="Submits/stage2.php" method="post">
                <h3 class="mt-5">Save the Location and Size of the Land</h3>
                <div class="row">
                <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <input type="text" name="perimeter" placeholder="Enter perimeter of the Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="surveyor" class="font-weight-normal">Location of the Land</label>
                      <input type="text" name="longitude" placeholder="Enter the Longitude of  Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="text" name="latitude"  placeholder="Enter the Latitude of Land" required class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-info">Save Location</button>
                    </div>
                  </div>
                </div>
              </form> 
              </div>
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
              <form action="Submits/stage3.php" enctype="multipart/form-data" method="post">
                <h3 class="mt-5">Upload all the neccesary documents fot the registration of the land</h3>
                <div class="row">
                <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                  <div class="col-md-6 ">
                    <div class="form-group">
                      <input type="text" name="name" placeholder="Name Of Documents" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="surveyor" class="font-weight-normal">Choose file</label>
                      <input type="file" name="file" accept="application/pdf" required class="form-control">
                    </div>
                    <div class="form-group">
                      <textarea name="description" id="description" class="form-control" placeholder="Description" ></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-info">Upload document</button>
                    </div>
                  </div>
                </div>
              </form> 
              <br>
              <hr>
              <div class="table-responsive mt-5">
                <table class="table table-striped">
                  <thead>
                    <th>Document Name</th>
                    <th>Uploaded On</th>
                  </thead>
                  <?php $documents = $fetch_data->getClientDocs($selected_client->id); ?>
                  <tbody>
                    <?php foreach($documents as $new): ?>
                      <tr>
                        <td><?php echo $new->doc; ?></td>
                        <td><?php echo $date->getOnlyDate($new->created_at); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              </div>
                <br>
                <hr>
              <form action="./Submits/finalize_application.php" method="post" class="text-center">
                <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>"  required>
                <button type="submit" name="submit" class="btn btn-info">Finalize Application</button>
              </form>
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
