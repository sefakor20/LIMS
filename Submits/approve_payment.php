<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$direct = new Functions();

use Twilio\Rest\Client; 

if(Inputs::submitType()) {
  $application_id = intval(Inputs::assignValue('application_id'));
  $client_id = intval(Inputs::assignValue('client_id'));
  $payment_id = intval(Inputs::assignValue('payment_id'));
  $status_id = 2;
  $application_status = 7;
  $updated_at = date('Y-m-d H:i:s');

  // Send an SMS using Twilio's REST API and PHP
  $sid = "AC8497cab264aa84910ceaafe804a06871"; // Your Account SID from www.twilio.com/console
  $token = "276e29d82c929a7f03389829a32183ff"; // Your Auth Token from www.twilio.com/console

  $twilio = new Client($sid, $token);

  $message = $twilio->messages->create(
    '+233207821075', // Text this number
    [
      'from' => '+12058947758', // From a valid Twilio number
      'body' => 'Congratulations! Your Land Title registration has been successful, kindly visit your portal to print your Land title Certificate'
    ]
  );

  //insert payment values
  $database->update('payments', $payment_id, array(
    'status_id' => $status_id,
    'updated_at' => $updated_at
  ));


  //update application status
  $database->update('land_applications', $application_id, array(
    'application_status' => $application_status,
    'updated_at' => $created_at
  ));

  

  $_SESSION['success'] = 'Registration Successful.';
  $direct->redirect('../admin/payments.php');
} else {

  die('Requested page not found');

}