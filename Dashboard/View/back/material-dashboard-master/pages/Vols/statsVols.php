<?php
include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\VolsC.php';
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

// Output JavaScript for Chart.js
echo "<canvas id='destinationChart' width='400' height='400'></canvas>";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Safrti Registration stats</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <button onclick="location.href='listVols.php';">go to list Vols</button>

    <script>
        // JavaScript for creating pie chart using Chart.js
        var ctx = document.getElementById('destinationChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode(array_keys($destinationPercentages)); ?>,
                datasets: [{
                    label: 'Destination Percentages',
                    data: <?php echo json_encode(array_values($destinationPercentages)); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        // Add more colors as needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false, // Adjust as needed
                maintainAspectRatio: false, // Adjust as needed
            }
        });
    </script>
  </body>
</html>
