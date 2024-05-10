<?php

include 'C:\xampp\htdocs\mcv\Controller\PaysC.php';
include 'C:\xampp\htdocs\mcv\Model\Pays.php';

$error = "";

$paysC = new PaysC();
if (
    isset($_POST["nomPays"]) &&
    isset($_POST["prix"])
) {
    if (
        !empty($_POST['nomPays']) &&
        !empty($_POST['prix'])
    ) {
        $pays = new Pays(
            $_POST['nomPays'],
            $_POST['prix']
        );
        $paysC->updatePays($pays, $_POST['ancienNomPays']);
        header("Location: listPays.php");
        exit();
    } else {
        $error = "Tous les champs doivent être remplis!";
    }
}
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
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
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