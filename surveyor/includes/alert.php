<?php
if(isset($_SESSION['success'])) {
  ?>
  
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong><i class="fa fa-check-circle"></i> Success <br></strong> <?php echo $_SESSION['success']; ?>
  </div>

<?php } $_SESSION['success'] = null; ?>


<?php
if(isset($_SESSION['error'])) {
  ?>
  
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Alert!!!</strong> <?php echo $_SESSION['error']; ?>
  </div>

<?php } $_SESSION['error'] = null; ?>