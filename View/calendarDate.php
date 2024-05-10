<?php

require_once 'C:\xampp\htdocs\mcv\Controller\DateC.php';

$dateC = new DateC(); // Crée une instance de la classe DateC

// Récupérer l'année actuelle
$currentYear = date('Y');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier des Dates</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" /> <!-- Inclure le fichier CSS -->
    <style>
        .calendar {
            max-width: 600px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .day {
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
        }
    </style>
</head>
<body>
    <button onclick="location.href='listDate.php';">go to liste Date</button> 
    <button onclick="location.href='listVols.php';">go to list Vols</button>
    <button onclick="location.href='listPays.php';">go to list Pays</button>

    <h1><center><strong>- Calendrier des Dates -</strong></center></h1>

    <?php
    // Afficher les calendriers pour chaque mois de l'année
    for ($month = 1; $month <= 12; $month++) {
        // Récupérer le premier jour du mois et le nombre de jours dans le mois
        $firstDay = date('N', strtotime(date("$currentYear-$month-01")));
        $numDays = date('t', strtotime(date("$currentYear-$month-01")));

        // Initialiser un tableau pour stocker les jours du mois
        $daysOfMonth = array();

        // Récupérer les dates pour ce mois
        $dates = $dateC->listDatesForMonth($currentYear, $month);

        // Remplir le tableau avec les jours du mois
        for ($i = 1; $i <= $numDays; $i++) {
            $daysOfMonth[$i] = array();
        }

        // Remplir le tableau avec les dates
        foreach ($dates as $date) {
            $day = date('j', strtotime($date['date']));
            $daysOfMonth[$day][] = $date['date'];
        }

        // Afficher le nom du mois
        echo "<h2>" . date('F', strtotime(date("$currentYear-$month-01"))) . "</h2>";

        // Afficher le calendrier pour ce mois
        echo '<div class="calendar">';
        $dayOfMonth = 1;
        for ($i = 1; $i <= $numDays; $i++) {
            if ($i < $firstDay || $dayOfMonth > $numDays) {
                echo '<div class="day"></div>'; // Jours vides avant le début du mois ou après la fin du mois
            } else {
                $currentDate = $i;
                if (isset($daysOfMonth[$dayOfMonth])) {
                    echo '<div class="day">' . $dayOfMonth . '<br>';
                    foreach ($daysOfMonth[$dayOfMonth] as $date) {
                        echo $date . '<br>'; // Afficher les dates associées au jour
                    }
                    echo '</div>';
                } else {
                    echo '<div class="day">' . $dayOfMonth . '</div>';
                }
                $dayOfMonth++;
            }
        }
        echo '</div>';
    }
    ?>

</body>
</html>
