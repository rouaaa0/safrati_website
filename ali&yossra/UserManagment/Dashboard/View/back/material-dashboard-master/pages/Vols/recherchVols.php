<?php
include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\VolsC.php';
$error = "";
$volsC = new VolsC();
$results = [];

if (isset($_POST["search"])) {
    if (!empty($_POST['compagnie'])) {
        $compagnie = $_POST['compagnie'];
        $results = $volsC->searchVolsByCompagnie($compagnie);
        if (empty($results)) {
            $error = "Aucun vol trouvé pour la compagnie aérienne spécifiée.";
        }
    } else {
        $error = "Veuillez saisir le nom de la compagnie aérienne.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Vols par Compagnie Aérienne</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Recherche de Vols par Compagnie Aérienne</h1>
<button onclick="location.href='listVols.php';">go to list Vols</button>


<div id="error">
    <?php echo $error; ?>
</div>

<form action="" method="post">
    <label for="compagnie">Compagnie Aérienne :</label>
    <input type="text" id="compagnie" name="compagnie">
    <button type="submit" name="search">Rechercher</button>
</form>

<?php if (!empty($results)): ?>
    <h2>Résultats de la recherche :</h2>
    <table border="1">
        <tr>
            <th>Compagnie</th>
            <th>Départ</th>
            <th>Destination</th>
            <th>Date de départ</th>
        </tr>
        <?php foreach ($results as $vol): ?>
            <tr>
                <td><?php echo $vol['compagne']; ?></td>
                <td><?php echo $vol['depart']; ?></td>
                <td><?php echo $vol['destination']; ?></td>
                <td><?php echo $vol['date_depart']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>
