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
  $role = intval(Inputs::assignValue('role'));
  $email = Inputs::assignValue('email');
  $password = Inputs::assignValue('password');
  $confirm_password = Inputs::assignValue('confirm_password');
  $created_at  = date('Y-m-d H:i:s');

  if($password === $confirm_password) {
    //encrpyt password
    $password = password_hash($password, PASSWORD_BCRYPT);

    //insert values into the database
    $database->insert('users', array(
      'user_role' => $role,
      'first_name' => $first_name,
      'surname' => $surname,
      'other_name' => $other_name,
      'phone_no' => $phone_no,
      'address' => $address,
      'email' => $email,
      'password' => $password, 
      'created_at' => $created_at
    ));

    $_SESSION['success'] = 'User added succesfully';
    $direct->redirect('../admin/users.php');

  }

} else {
  die('Requested Page Not found');
}