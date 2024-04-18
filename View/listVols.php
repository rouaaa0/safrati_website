<?php
include 'C:\xampp\htdocs\mcv\Controller\VolsC.php';

$volsC = new VolsC();
$tab = $volsC->listVols();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Flights</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style2.css" />
</head>
<body>

    <h1><center><strong>-List of Flights-</strong></center></h1>
    <button onclick="location.href='addVols.php';">Add</button>
    <table border="1" align="center" width="70%">
        <tr>
            <th>id_vols</th>
            <th>Compagne</th>
            <th>Depart</th>
            <th>Destination</th>
            <th>Date_depart</th>
            <th>Prix</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($tab as $vol) { ?>
            <tr>
                <td><?= $vol['id_vols']; ?></td>
                <td><?= $vol['compagne']; ?></td>
                <td><?= $vol['depart']; ?></td>
                <td><?= $vol['destination']; ?></td>
                <td><?= $vol['date_depart']; ?></td>
                <td><?= $vol['prix']; ?></td>

                <td align="center">
                    <form method="POST" action="updateVols.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $vol['id_vols']; ?>" name="id_vols">
                    </form>
                </td>
                <td>
                <a href="deleteVols.php?id=<?= $vol['id_vols']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>