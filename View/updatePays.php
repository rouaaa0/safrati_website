<?php

include 'C:\xampp\htdocs\mcv\Controller\PaysC.php';
include 'C:\xampp\htdocs\mcv\Model\Pays.php';

$error = "";

$paysC = new PaysC(); // Créer une instance du contrôleur des pays

// Vérifier si le formulaire est soumis
if (
    isset($_POST["nomPays"]) &&
    isset($_POST["prix"])
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST['nomPays']) &&
        !empty($_POST['prix'])
    ) {
        // Créer un nouvel objet Pays avec les données du formulaire
        $pays = new Pays(
            $_POST['nomPays'],
            $_POST['prix']
        );

        // Mettre à jour les informations du pays dans la base de données
        $paysC->updatePays($pays, $_POST['ancienNomPays']);

        // Rediriger vers une autre page ou afficher un message de succès
        header("Location: listPays.php");
        exit();
    } else {
        // Afficher un message d'erreur si des champs sont vides
        $error = "Tous les champs doivent être remplis!";
    }
}

// Récupérer les informations du pays à mettre à jour
if(isset($_POST['nomPays'])) {
    $nomPays = $_POST['nomPays'];
    $pays = $paysC->getPays($nomPays);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mettre à jour un pays</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style3.css" />
</head>
<body>

<h2>Mettre à jour un pays</h2>

<div id="error">
    <?php echo $error; ?>
</div>

<form method="post" action="">
    <input type="hidden" name="ancienNomPays" value="<?php echo $nomPays; ?>">

    <label for="nomPays">Nom du pays :</label><br>
    <input type="text" id="nomPays" name="nomPays" value="<?php echo $pays['nom_Pays']; ?>"><br>

    <label for="prix">Prix :</label><br>
    <input type="text" id="prix" name="prix" value="<?php echo $pays['prix']; ?>"><br>

    <input type="submit" value="Mettre à jour">
</form>

</body>
</html>