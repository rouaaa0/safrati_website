<?php
include 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Controller\PaysC.php';

$paysC = new PaysC(); 
if(isset($_GET['nomPays'])) {
    $nomPays = $_GET['nomPays'];
    $paysC->deletePays($nomPays);
    header("Location: listPays.php");
    exit();
} else {
    echo "L'identifiant du pays n'est pas spécifié.";
}

?>