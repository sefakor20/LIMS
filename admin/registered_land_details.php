<?php
require_once dirname(__DIR__).'./Core/init.php';
$link = new Functions();
$fetch_data = new Fetch($connection);
$date = new DateFormat($connection);

if(empty($_SESSION['admin'])){
  $link->redirect('../login.php');
}

if(empty($_GET['uid'])) {
  $link->redirect('./registration.php');
}

$applications = $fetch_data->getClientApplicationForAdmin();

$owner_details = $fetch_data->getSigleJoinItem('SELECT land_applications.id, land_applications.land_location, land_applications.means_of_acquisition, land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status, acquisition.name AS acquisition', 'land_applications', 'JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status JOIN acquisition ON acquisition.id = land_applications.means_of_acquisition', 'land_applications.client_id', $_GET['uid']); 

$surveyor = $fetch_data->getItemsWithNoComparison('SELECT users.id, users.user_role, users.first_name, users.surname, users.other_name', 'users');
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
        <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Property Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="false">Ownership Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="true">Location Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Attached Documents</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                  <div class="row">
                      <div class="col-md-8  mt-3">
                      <div class="card card-default">
                      <!-- <div class="card-header">
                        <h3 class="card-title">Details</h3>
                      </div> -->
                      <div class="card-body">
                        <form action="Submits/stage1.php" method="post">
                          <div class="row">
                          <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                            <div class="col-md-12 ">
                              <div class="form-group">
                              <label for="surveyor" class="font-weight-normal">Owner</label>
                                <input type="text" name="location" value="<?php echo $owner_details->first_name .' '. $owner_details->surname .' '. $owner_details->other_name; ?>"  readonly placeholder="Enter Location of Land" required class="form-control">
                              </div>
                              <div class="form-group">
                              <label for="surveyor" class="font-weight-normal">Means of Acquisition</label>
                                <input type="text" name="owner" disabled value="<?php echo $owner_details->acquisition; ?>" placeholder="Name of Owner of Land" required class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="surveyor" class="font-weight-normal">Registration Begun</label>
                                <input type="text" name="surveyor" value="<?php echo $date->getOnlyDate($owner_details->created_at); ?>" placeholder="Name of Surveyor" required disabled class="form-control">
                              </div>
                            </div>
                          </div>
                        </form> 
                      </div>
                    </div> 
                      </div>
                    </div> 
                  </div>
                  <div class="tab-pane fade active show" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    <div class="row">
                      <div class="col-md-8  mt-3">
                      <div class="card card-default">
                      <!-- <div class="card-header">
                        <h3 class="card-title">Details</h3>
                      </div> -->
                      <div class="card-body">
                        <form action="Submits/stage1.php" method="post">
                          <div class="row">
                          <input type="hidden" name="client_id" value="<?php echo $_SESSION['client']; ?>">
                            <div class="col-md-12 ">
                              <div class="form-group">
                              <label for="surveyor" class="font-weight-normal">Location</label>
                                <input type="text" name="location" value="<?php echo $owner_details->land_location; ?>" placeholder="Enter Location of Land" required class="form-control">
                              </div>
                              <br>
                              <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3963.255397727395!2d0.4634020639443022!3d6.615158321783368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHO%20BANKOE!5e0!3m2!1sen!2sgh!4v1594117678379!5m2!1sen!2sgh" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                          </div>
                        </form> 
                      </div>
                    </div> 
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                    <div class="table-responsive mt-5">
                      <table class="table table-striped">
                        <thead>
                          <th>Document Name</th>
                          <th>Date Added</th>
                          <th></th>
                        </thead>
                        <tbody>
                          <?php 
                            $user_docs = $fetch_data->getClientDocs($_GET['uid']);
                          ?>
                          <?php foreach($user_docs AS $doc): ?>
                            <tr>
                              <td><?php echo $doc->doc; ?></td>
                              <td><?php echo $date->getOnlyDate($doc->created_at); ?></td>
                              <td>
                                <a href="../public/assets/docs/land/<?php echo $doc->doc; ?>" download=""><i class="fa fa-download"></i></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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
