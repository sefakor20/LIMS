<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$direct = new Functions();

if(Inputs::submitType()) {
  $client_id = intval(Inputs::assignValue('client_id'));
  $surveyor_id = Inputs::assignValue('surveyor_id');
  $means_of_acquisition = intval(Inputs::assignValue('means_of_acquisition'));
  $location = Inputs::assignValue('location');
  $surveyor = Inputs::assignValue('surveyor');
  $witness = Inputs::assignValue('witness');
  $owner = Inputs::assignValue('owner');
  $witness_number = Inputs::assignValue('witness_number');
  $application_status = 2;
  $created_at = date('Y-m-d H:i:s');

  $database->insert('land_applications', array(
    'client_id' => $client_id,
    'land_location' => $location,
    'name_of_owner' => $owner,
    'means_of_acquisition' => $means_of_acquisition,
    'surveyor' => $surveyor,
    'surveyor_license_id' => $surveyor_id,
    'witness' => $witness,
    'witness_phone' => $witness_number,
    'application_status' => $application_status,
    'created_at' => $created_at
  ));

  $_SESSION['success'] = 'Application has been initiated, continue to add the land marks';
    $direct->redirect('../location.php');

} else {
  die('Requested page not found');
}