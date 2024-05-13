<?php

include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\PaysC.php';


$error = "";
$pays = null;
$paysC = new PaysC(); 

if (
    isset($_POST["nomPays"]) &&
    isset($_POST["prix"])
) {
    if (
        !empty($_POST['nomPays']) &&
        !empty($_POST['prix'])
    ) {
        $pays = new Pays(
            $_POST['nomPays'],
            $_POST['prix']
        );
        $paysC->addPays($pays);
        $error = "<center><strong><h3>Country added successfully!</h3></strong></center>";
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add a Country</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
<button onclick="location.href='listPays.php';">Go to List</button>

<h2>Add a Country</h2>

<div id="error">
    <?php echo $error; ?>
</div>

<form method="post" action="">
    <label for="nomPays">Country Name:</label><br>
    <input type="text" id="nomPays" name="nomPays"><br>

    <label for="prix">Price:</label><br>
    <input type="text" id="prix" name="prix"><br>

    <input type="submit" value="Add">
</form>

</body>
</html>
