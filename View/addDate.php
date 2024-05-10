<?php

include 'C:\xampp\htdocs\mcv\Controller\DateC.php';
include 'C:\xampp\htdocs\mcv\Model\Date.php';

$error = "";
$dateC = new DateC();
if (isset($_POST["date"])) {
    if (!empty($_POST['date'])) {
        $date = new Date($_POST['date']);
        $dateC->addDate($date->getDate());
        $error = "<center><strong><h3>Date ajoutée avec succès!</h3></strong></center>";
    } else {
        $error = "<center><strong><h3>Veuillez saisir une date!</h3></strong></center>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter une Date</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
    <button onclick="location.href='listDate.php';">go to liste Date</button>
    <button onclick="location.href='listVols.php';">go to list Vols</button>



    <h2>Ajouter une Date</h2>

    <div id="error">
        <?php echo $error; ?> 
    </div>
    <form method="post" action="">
        <label for="date">Date:</label><br>
        <input type="datetime-local" id="date" name="date"><br> 
        <input type="submit" value="Ajouter">
    </form>

</body>
</html>
