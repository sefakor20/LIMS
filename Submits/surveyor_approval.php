<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$direct = new Functions();

if(Inputs::submitType()) {
  $application_id = intval(Inputs::assignValue('application_id'));
  $surveyor_id = intval(Inputs::assignValue('surveyor_id'));
  $application_status = intval(Inputs::assignValue('application_status'));
  $updated_at = date('Y-m-d H:i:s');

  $database->update('land_applications', $application_id, array(
    'officer_id' => $surveyor_id,
    'application_status' => $application_status,
    'updated_at' => $updated_at
  ));

  $_SESSION['success'] = 'Approval successful';
  $direct->redirect('../surveyor/registration.php');
} else {

  die('Requested page not found');

}