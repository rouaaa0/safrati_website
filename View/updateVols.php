<?php
include 'C:\xampp\htdocs\mcv\Controller\VolsC.php';
include 'C:\xampp\htdocs\mcv\Model\Vols.php';

$error = "";
$volsC = new VolsC();

if (
    isset($_POST["id_vols"]) &&
    isset($_POST["compagne"]) &&
    isset($_POST["depart"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["date_depart"]) 
) {
    if (
        !empty($_POST["id_vols"]) &&
        !empty($_POST['compagne']) &&
        !empty($_POST["depart"]) &&
        !empty($_POST["destination"]) &&
        !empty($_POST["date_depart"]) 
    ) {
        $vol = new Vols(
            $_POST['id_vols'],
            $_POST['compagne'],
            $_POST['depart'],
            $_POST['destination'],
            $_POST['date_depart']
        );

        $volsC->updateVol($vol, $_POST['id_vols']);

        header('Location:listVols.php');
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Flight</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

</head>

<body>
    <button><a href="listVols.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_vols'])) {
        $vol = $volsC->showVol($_POST['id_vols']);
    ?>

        <form method="POST" action="updateVols.php" >
            <table>
                <tr>
                    <td><label for="id_vols">Flight ID :</label></td>
                    <td>
                        <input type="text" id="id_vols" name="id_vols" value="<?php echo $_POST['id_vols'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="compagne">Compagne :</label></td>
                    <td>
                        <input type="text" id="compagne" name="compagne" value="<?php echo $vol['compagne'] ?>" />     
                    </td>
                </tr>
                <tr>
                    <td><label for="depart">Depart :</label></td>
                    <td>
                        <input type="text" id="depart" name="depart" value="<?php echo $vol['depart'] ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td><label for="destination">Destination :</label></td>
                    <td>
                        <input type="text" id="destination" name="destination" value="<?php echo $vol['destination'] ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td><label for="date_depart">Date Depart :</label></td>
                    <td>
                        <input type="datetime-local" id="date_depart" name="date_depart" value="<?php echo $vol['date_depart'] ?>" /> 
                    </td>
                </tr>
                <td>
                    <button type="submit">Update</button>
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
                
                
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>


