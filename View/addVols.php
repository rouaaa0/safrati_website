<?php

include 'C:\xampp\htdocs\mcv\Controller\VolsC.php';
include 'C:\xampp\htdocs\mcv\Model\Vols.php';

$error = "";
$vol = null;
$volsC = new VolsC();

if (
    isset($_POST["compagne"]) &&
    isset($_POST["depart"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["date_depart"]) &&
    isset($_POST["prix"])
    ) {
      if (
        !empty($_POST['compagne']) &&
        !empty($_POST["depart"]) &&
        !empty($_POST["destination"]) &&
        !empty($_POST["date_depart"]) &&
        !empty($_POST["prix"])
        ) 
        {
          $vol = new Vols(
            null,
            $_POST['compagne'],
            $_POST['depart'],
            $_POST['destination'],
            $_POST['date_depart'],
            $_POST['prix']
          );
        
        $volsC->addVol($vol);
        $error = "<center><strong><h3>Flight added successfully!</h3></strong></center>";
        
         } else
        $error = "";
      }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Safrti Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="style3.css" />
  </head>

  <body>
  <button onclick="location.href='listVols.php';">go to list</button>
    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action="" method="post"  onsubmit="return verif_Up()">
          <h1>Add Flight</h1>
          <input type="text"  placeholder="Compagne" id="compagne" name="compagne" />
          <input type="text" placeholder="Depart" id="depart" name="depart" />
          <input type="text" placeholder="Destination" id="destination" name="destination" />
          <input type="date" placeholder="Date Depart" id="date_depart" name="date_depart" />
          <input type="text" placeholder="Prix" id="prix" name="prix" />
          <button type="submit">Add Flight</button>
        </form>
      </div>
    </div>

    <script>
      var a = console.log.bind(document);
      a(3 * 4);
      a("Hello!");
      a(true);

      /* FONCTION VERIF SIGN UP*/
      function verif_Up(){
        let compagne =document.getElementById('compagne').value;
        let depart =document.getElementById('depart').value;
        let destination=document.getElementById('destination').value;
        let date_depart=document.getElementById('date_depart').value;
        let prix=document.getElementById('prix').value;
        
        if (compagne=='')
        {
          document.getElementById('compagne').value='Invalid Compagne!';
          document.getElementById('compagne').style.color='red';
          return false;
        }
        if (depart=='')
        {
          document.getElementById('depart').value='Invalid Depart!';
          document.getElementById('depart').style.color='red';
          return false;
        }
        if (destination=='')
        {
          document.getElementById('destination').value='Invalid Destination!';
          document.getElementById('destination').style.color='red';
          return false;
        }
        if (date_depart=='')
        {
          document.getElementById('date_depart').value='Invalid Date Depart!';
          document.getElementById('date_depart').style.color='red';
          return false;
        }
        if (prix=='')
        {
          document.getElementById('prix').value='Invalid Prix!';
          document.getElementById('prix').style.color='red';
          return false;
        }
      }
    </script>
  </body>
</html>