<?php 
  require_once dirname(__DIR__).'/Core/init.php';
  $database = new Database($connection);
  $link = new Functions();

  //activate account
  if(isset($_GET['activate'])) {
    $status = 1;
    $database->update('users', $_GET['activate'], array(
      'account_status' => $status
    ));
    $_SESSION['success'] = 'Account has been activated successfully';
    $link->redirect('../admin/users.php');
  }


  //deactivate account
  if(isset($_GET['deactivate'])) {
    $status = 2;
    $database->update('users', $_GET['deactivate'], array(
      'account_status' => $status
    ));
    $_SESSION['success'] = 'Account deactivated successfully';
    $link->redirect('../admin/users.php');
  }