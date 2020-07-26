<?php
require_once dirname(__DIR__).'/Core/init.php';
$data = new Fetch($connection);
$link = new Functions();

if(Inputs::submitType()){
  $email = Inputs::assignValue('email');
  $password = Inputs::assignValue('password');

  //  $password = password_hash($password, PASSWORD_DEFAULT);

  //   var_dump($password);exit();

  $login = new Login($connection, $email, $password);

  //check whether user is an admin
  if($login->authenticate('users')) {
    $user = $login->getAccount();
    $switch_user = $user->user_role;

    //redirect user based on their category
    if($switch_user == 1) {
      //administrator
      $_SESSION['admin'] = $user->id;
      $_SESSION['admin_first_name'] = $user->first_name;
      $link->redirect('../admin/index.php');
    } else {
      //faculty
      $_SESSION['surveyor'] = $user->id;
      $_SESSION['surveyor_name'] = $user->full_name;
      $link->redirect('../surveyor/index.php');
    }
  }

  //check if there is an error and display them
  if(!$login->authenticate('users')) {
    $_SESSION['error'] = $login->getError();
    $link->redirect('../login.php');
  }


} else {
  die('Requested page not found');
}