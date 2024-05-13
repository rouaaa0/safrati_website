<?php

include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\VolsC.php';

$error = "";
$vol = null;
$volsC = new VolsC();

if (
    isset($_POST["compagne"]) &&
    isset($_POST["depart"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["date_depart"]) 
    ) {
      if (
        !empty($_POST['compagne']) &&
        !empty($_POST["depart"]) &&
        !empty($_POST["destination"]) &&
        !empty($_POST["date_depart"]) 
        ) 
        {
          $vol = new Vols(
            null,
            $_POST['compagne'],
            $_POST['depart'],
            $_POST['destination'],
            $_POST['date_depart']
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
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>

  <body>
    
  <button onclick="location.href='listVols.php';">go to list Vols</button>
  <button onclick="location.href='calendarDate.php';">Voir la calendrier</button>

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
          <input type="datetime-local" placeholder="Date Depart" id="date_depart" name="date_depart" />
          <button type="submit">Add Flight</button>
        </form>
      </div>
    </div>

    <script>
      var a = console.log.bind(document);
      a(3 * 4);
      a("Hello!");
      a(true);

      function verif_Up(){
        let compagne =document.getElementById('compagne').value;
        let depart =document.getElementById('depart').value;
        let destination=document.getElementById('destination').value;
        let date_depart=document.getElementById('date_depart').value;
        if (compagne=='')
        {
          document.getElementById('compagne').value='Invalid Compagne!';
          document.getElementById('compagne').style.color='red';
          return false;
        }
        if (depart == '' || depart !== 'Tunisie') 
        {
        document.getElementById('depart').value = 'Le depar obliguatoire Tunisie pour le moment';
        return false;
       }
        if (destination=='')
        {
          document.getElementById('destination').value='Invalid Destination!';
          document.getElementById('destination').style.color='red';
          return false;
        }
        if (date_depart == '') {
        document.getElementById('date_depart').value = 'Invalid Date Depart!';
        document.getElementById('date_depart').style.color = 'red';
        return false;
    } else {
        let currentDate = new Date();
        let inputDate = new Date(date_depart);
                if (inputDate <= currentDate) {
            document.getElementById('date_depart').value = 'le date doit etre au future';
            return false;
        }
    }
    
    return true;


      }
    </script>
  </body>
</html>