<?php
include 'C:\xampp\htdocs\mcv\Controller\PaysC.php';

$paysC = new PaysC();
$tab = $paysC->listPays();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Countries</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style2.css" />
</head>
<body>

    <h1><center><strong>-List of Countries-</strong></center></h1>
    <button onclick="location.href='addPays.php';">Add</button>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Country Name</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($tab as $pays) { ?>
            <tr>
                <td><?= $pays['nom_Pays']; ?></td>
                <td><?= $pays['prix']; ?></td>

                <td align="center">
                    <form method="POST" action="updatePays.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $pays['nom_Pays']; ?>" name="nomPays">
                    </form>
                </td>
                <td>
                <a href="deletePays.php?nomPays=<?= $pays['nom_Pays']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
