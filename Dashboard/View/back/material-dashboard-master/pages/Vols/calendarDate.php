<?php

include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\DateC.php';

$dateC = new DateC();
$currentYear = date('Y');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calendrier des Dates</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" /> 
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
    for ($month = 1; $month <= 12; $month++) {
        $firstDay = date('N', strtotime(date("$currentYear-$month-01")));
        $numDays = date('t', strtotime(date("$currentYear-$month-01")));
        $daysOfMonth = array();
        $dates = $dateC->listDatesForMonth($currentYear, $month);
        for ($i = 1; $i <= $numDays; $i++) {
            $daysOfMonth[$i] = array();
        }
        foreach ($dates as $date) {
            $day = date('j', strtotime($date['date']));
            $daysOfMonth[$day][] = $date['date'];
        }
        echo "<h2>" . date('F', strtotime(date("$currentYear-$month-01"))) . "</h2>";
        echo '<div class="calendar">';
        $dayOfMonth = 1;
        for ($i = 1; $i <= $numDays; $i++) {
            if ($i < $firstDay || $dayOfMonth > $numDays) {
                echo '<div class="day"></div>';
            } else {
                $currentDate = $i;
                if (isset($daysOfMonth[$dayOfMonth])) {
                    echo '<div class="day">' . $dayOfMonth . '<br>';
                    foreach ($daysOfMonth[$dayOfMonth] as $date) {
                        echo $date . '<br>';
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
