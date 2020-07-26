<?php
  require_once './Core/init.php';
  $fetch_data = new Fetch($connection);
  $date = new DateFormat($connection);
  $link = new Functions();

  if(empty($_SESSION['client'])) {
    $link->redirect('./client_login.php');
  }

  if(empty($_GET['id'])) {
      $link->redirect('./user_home.php');
  }


  $cert = $fetch_data->getSigleJoinItem("SELECT land_applications.id, land_applications.name_of_owner, land_applications.land_location, land_applications.application_status, land_applications.created_at, clients.first_name, clients.surname, clients.other_name, application_status.name AS status, land_location.longitude, land_location.latitude", "land_applications", "JOIN clients ON clients.id = land_applications.client_id JOIN application_status ON application_status.id = land_applications.application_status JOIN land_location ON land_location.client_id = land_applications.client_id", "land_applications.client_id", $_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate</title>
    <style type="text/css">

        table td, table th{

            border:1px solid black;

        }
        #signature{
            width: 500px;
            margin-left: 30px;
        }

        .dottedUnderline { border-bottom: 1px dotted; }
        .iblock {
        margin-bottom: 30px;
        min-height: 40px;
        }
        #main_page{
            border: solid 1px gray;;
            height: 900px;
            width: 700px;
            padding: 10px;
        }
        .sign_block{
            margin-right: 80px;
            float: right;
        }

    /* #cert-heading{
        font-family: 'Courgette', cursive;
    } */

    </style>
</head>
<body onload="window.print();">
    <center>
      <div id="main_page" >
        <br><br>
          <Center>
              <img src="./public/assets/images/coagh.png" height="128" width="128"/>
              <h5> GOVERNMENT OF GHANA</h5>
          </Center>
          <center>
              <h2 id="cert-heading"> LAND TITLE CERTIFICATE </h2>
          </center>
          <div class="iblock">
              <p>This is to certify that  the land with Registration No.H/908/0050<?php echo $cert->id; ?>  belongs to </p>
          </div>
          <div class="iblock">
                <center><div class="dottedUnderline" style="margin-left:100px; width: 450px"><b><?php echo $cert->name_of_owner; ?></b></div></center>
          </div>
          <div class="iblock">
              The land is located at <b><?php echo $cert->land_location; ?></b> specified by the coordinates <b><i><?php echo $cert->longitude; ?></i></b>, <b><i><?php echo $cert->latitude; ?></i></b>
          </div>
          <br><br><br><br>
          <div class="iblock" id="signature">
              <div class="sign_block">
                  <img  src="./public/assets/images/sign.png" class="mb-0" style="margin-bottom: 0;" height="100" width="148"/>
                  <br>
                  ............................................
                  <h3>Commissioner of Oath</h3>
              </div>
              <div class="sign_block">
                  <img  src="./public/assets/images/sl.jpg" height="128" width="128"/>
              </div>
          </div>


          <div  class="iblock">
                <p></p>
          </div>


      </div>

   </center>

</body>
</html>