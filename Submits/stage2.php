<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$link = new Functions();

if(Inputs::submitType()){
  $client = intval(Inputs::assignValue('client_id'));
  $perimeter = Inputs::assignValue('perimeter');
  $longitude = Inputs::assignValue('longitude');
  $latitude = Inputs::assignValue('longitude');
  $status = 2;
  $created_at = date('Y-m-d H:i:s');

  $database->insert('land_location', array(
    'client_id' => $client,
    'perimeter' => $perimeter,
    'longitude' => $longitude,
    'latitude' => $latitude,
    'status' => $status,
    'created_at' => $created_at
  ));

  $_SESSION['success'] = 'Land Location successfuly saved';
  $link->redirect('../location.php');

} else {
die('Requested page not found');
}