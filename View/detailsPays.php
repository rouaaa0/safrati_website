<?php
include 'C:\xampp\htdocs\mcv\Controller\PaysC.php';

if(isset($_GET['nomPays'])) {
    $nomPays = $_GET['nomPays'];
    $paysC = new PaysC();
    $pays = $paysC->getPays($nomPays);
    $googleMapsUrl = "https://www.google.com/maps/embed/v1/place?key=(le code api lena)&q=" . urlencode($nomPays);
    $tripAdvisorUrl = "https://www.tripadvisor.com/Search?q=" . urlencode($nomPays) . "&sid=Amine";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Pays</title>
    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<h1>Détails de <?= $pays['nom_Pays']; ?></h1>

<div class="pays-details">
    <iframe width="600" height="450" frameborder="0" style="border:0" src="<?= $googleMapsUrl; ?>" allowfullscreen></iframe>
    <h2>Meilleurs endroits à visiter à <?= $pays['nom_Pays']; ?></h2>
    <a href="<?= $tripAdvisorUrl; ?>" target="_blank">Découvrez les meilleurs endroits à visiter sur TripAdvisor</a>    
    <a href="listPays.php">Retour à la liste des pays</a>
</div>

</body>
</html>
