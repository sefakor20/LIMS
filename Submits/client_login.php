<?php
require_once dirname(__DIR__).'/Core/init.php';
$data = new Fetch($connection);
$link = new Functions();

if(Inputs::submitType()){
  $email = Inputs::assignValue('email');
  $password = Inputs::assignValue('password');

  $login = new ClientLogin($connection, $email, $password);

  //check whether user is an admin
  if($login->authenticate('clients')) {
    $user = $login->getAccount();
    //$switch_user = $user->category_id;

      $_SESSION['client'] = $user->id;
      $_SESSION['client_name'] = $user->full_name;
      $link->redirect('../user_home.php');
  }

  //check if there is an error and display them
  if(!$login->authenticate('clients')) {
    $_SESSION['error'] = $login->getError();
    $link->redirect('../client_login.php');
  }


} else {
  die('Requested page not found');
}