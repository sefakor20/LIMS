<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$direct = new Functions();

use Twilio\Rest\Client; 

if(Inputs::submitType()) {
  $application_id = intval(Inputs::assignValue('application_id'));
  $client_id = intval(Inputs::assignValue('client_id'));
  $momo_number = Inputs::assignValue('momo_number');
  $account_name = Inputs::assignValue('account_name');
  $status_id = 1;
  $amount = 100;
  $application_status = 6;
  $created_at = date('Y-m-d H:i:s');

  // Send an SMS using Twilio's REST API and PHP
  $sid = "AC8497cab264aa84910ceaafe804a06871"; // Your Account SID from www.twilio.com/console
  $token = "276e29d82c929a7f03389829a32183ff"; // Your Auth Token from www.twilio.com/console

  $twilio = new Client($sid, $token);

  $message = $twilio->messages->create(
    '+233207821075', // Text this number
    [
      'from' => '+12058947758', // From a valid Twilio number
      'body' => 'Congratulations! We have received an amount of 100GH Cedis as Payment for your Land title registration. Kindly visit your portal to print your Land Title Certificate. Thank you'
    ]
  );

  //insert payment values
  $database->insert('payments', array(
    'application_id' => $application_id,
    'client_id' => $client_id,
    'momo_number' => $momo_number,
    'account_name' => $account_name,
    'amount' => $amount,
    'status_id' => $status_id,
    'created_at' => $created_at
  ));


  //update application status
  $database->update('land_applications', $application_id, array(
    'application_status' => $application_status,
    'updated_at' => $created_at
  ));

  

  $_SESSION['success'] = 'Payment Successful.';
  $direct->redirect('../user_home.php');
} else {

  die('Requested page not found');

}