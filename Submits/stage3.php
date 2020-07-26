<?php
require_once dirname(__DIR__).'/Core/init.php';
$database = new Database($connection);
$link = new Functions();

if(Inputs::submitType()){
  $client = intval(Inputs::assignValue('client_id'));
  $name = Inputs::assignValue('name');
  $description = Inputs::assignValue('description');
  $status = 1;
  $created_at = date('Y-m-d H:i:s');

  if(isset($_FILES['file'])){
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
  
    //check if file selection is successfull
    if(!$file_tmp_name){
        //flash a message
        $_SESSION['error'] = 'No file Selected.';
        //redirect
        $return->redirect('../faculty/create_course_materials.php');
        exit();
    }
  
    //move files to their destination
    $destination = move_uploaded_file($file_tmp_name, '../public/assets/docs/land/'.$file_name);
  
    //check if file upload has failed
    if(!$destination){
        //flash a message
        $_SESSION['error'] = 'File upload not successfull.';
        //redirect
        $return->redirect('../faculty/create_course_material.php');
        exit();
    }
  }

  $database->insert('documents', array(
    'client_id' => $client,
    'name' => $name,
    'file' => $file_name,
    'description' => $description,
    'status_id' => $status,
    'created_at' => $created_at
  ));

  $_SESSION['success'] = 'document uploaded successfully';
  $link->redirect('../location.php');

} else {
die('Requested page not found');
}