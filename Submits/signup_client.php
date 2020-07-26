<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$direct = new Functions();

if(Inputs::submitType()) {
  $first_name = Inputs::assignValue('first_name');
  $surname = Inputs::assignValue('surname');
  $other_name = Inputs::assignValue('other_name');
  $phone_no = Inputs::assignValue('phone_no');
  $address = Inputs::assignValue('address');
  $id_type = intval(Inputs::assignValue('id_type'));
  $id_number = intval(Inputs::assignValue('id_number'));
  $email = Inputs::assignValue('email');
  $password = Inputs::assignValue('password');
  $confirm_password = Inputs::assignValue('confirm_password');
  $created_at  = date('Y-m-d H:i:s');
  $account_status  =  1;

  if($password === $confirm_password) {
    //encrpyt password
    $password = password_hash($password, PASSWORD_BCRYPT);

    //insert values into the database
    $database->insert('clients', array(
      'first_name' => $first_name,
      'surname' => $surname,
      'other_name' => $other_name,
      'identification_type' => $id_type,
      'identification_no' => $id_number,
      'phone_no' => $phone_no,
      'address' => $address,
      'email' => $email,
      'password' => $password,
      'account_status' => $account_status,
      'created_at' => $created_at
    ));

    $_SESSION['success'] = 'Continue to Login and complete your Land Registration process.';
    $direct->redirect('../client_login.php');

  }

} else {
  die('Requested Page Not found');
}