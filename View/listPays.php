<?php
include 'C:\xampp\htdocs\mcv\Controller\PaysC.php';

$paysC = new PaysC();
$tab = $paysC->listPays();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pays</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>

    <h1><center><strong>- Liste des Pays -</strong></center></h1>
    <button onclick="location.href='listVols.php';">go to list Vols</button>
    <button onclick="location.href='addPays.php';">Ajouter</button>

    <table border="1" align="center" width="70%">
        <tr>
            <th>Nom du Pays</th>
            <th>Prix</th>
            <th>Plus de détails</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>

        <?php foreach ($tab as $pays) { ?>
            <tr>
                <td><?= $pays['nom_Pays']; ?></td>
                <td><?= $pays['prix']; ?></td>

                <td align="center">
                    <a href="detailsPays.php?nomPays=<?= $pays['nom_Pays']; ?>">Détails</a>
                </td>

                <td align="center">
                    <form method="POST" action="updatePays.php">
                        <input type="submit" name="update" value="Mettre à jour">
                        <input type="hidden" value="<?= $pays['nom_Pays']; ?>" name="nomPays">
                    </form>
                </td>

                <td align="center">
                    <a href="deletePays.php?nomPays=<?= $pays['nom_Pays']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
