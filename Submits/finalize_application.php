<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$direct = new Functions();

if(Inputs::submitType()) {
  $client_id = intval(Inputs::assignValue('client_id'));
  $application_status = 2;
  $updated_at = date('Y-m-d H:i:s');

  $database->update('land_applications', $client_id, array(
    'application_status' => $application_status,
    'updated_at' => $updated_at
  ));

  $_SESSION['success'] = 'Application has be submitted successfully.';
  $direct->redirect('../user_home.php');

} else {

  die('Requested page not found');

}