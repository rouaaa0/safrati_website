<?php

require 'C:\xampp\htdocs\mcv\Controller\DateC.php';

$dateC = new DateC(); // Create an instance of the DateC class

// Check if the button to view calendar is clicked
if(isset($_POST['view_calendar'])) {
    // Redirect to calendarDate.php to display the calendar
    header("Location: calendarDate.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Dates</title>
    <link rel="stylesheet" type="text/css" href="style.css" /> <!-- Include CSS file -->
</head>
<body>

    <h1><center><strong>- Liste des Dates -</strong></center></h1>
    <button onclick="location.href='listVols.php';">go to list Vols</button>
    <button onclick="location.href='addDate.php';">Add Date</button>


    <form method="post" action="">
        <button type="submit" name="view_calendar">Voir le calendrier</button> <!-- Button to view calendar -->
    </form>

    <table border="1" align="center" width="70%">
        <tr>
            <th>Date</th>
            <th>Supprimer</th>
        </tr>

        <?php
        $dates = $dateC->listDate(); // Retrieve dates from the database

        foreach ($dates as $date) { ?>
            <tr>
                <td><?= $date['date']; ?></td> <!-- Display the date -->
                <td align="center">
                    <a href="deleteDate.php?date=<?= $date['date']; ?>">Supprimer</a> <!-- Link to delete the date -->
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
