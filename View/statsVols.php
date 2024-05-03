<?php
include 'C:\xampp\htdocs\mcv\Controller\VolsC.php';
$volsC = new VolsC();
$flights = $volsC->listVols();
$destinationStats = [];
if ($flights instanceof PDOStatement) {
    $totalFlights = 0;
    while ($flight = $flights->fetch(PDO::FETCH_ASSOC)) {
        $destination = $flight['destination'];
        $totalFlights++;
        if (array_key_exists($destination, $destinationStats)) {
            $destinationStats[$destination]++;
        } else {
            $destinationStats[$destination] = 1;
        }
    }

    arsort($destinationStats); 
    $mostVisitedDestination = key($destinationStats);

    $destinationPercentages = [];
    foreach ($destinationStats as $destination => $count) {
        $percentage = ($count / $totalFlights) * 100;
        $destinationPercentages[$destination] = round($percentage, 2);
    }
}

echo "<h2>Flight Destination Statistics</h2>";
echo "<table border='1'>";
echo "<tr><th>Destination</th><th>Number of Flights</th><th>Percentage</th></tr>";
foreach ($destinationStats as $destination => $count) {
    $percentage = $destinationPercentages[$destination];
    echo "<tr><td>$destination</td><td>$count</td><td>$percentage%</td></tr>";
}
echo "</table>";

echo "<p>The most visited country is: <h3>$mostVisitedDestination</h3></p>";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Safrti Registration stats</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>