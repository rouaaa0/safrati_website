<?php

include 'C:\xampp\htdocs\hebergement\Controller\HebergementC.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $volsC = new HebergementC();
    $volsC->deleteHebergement($id);
    header("Location: listHebergement.php");
    exit();
} else {
    echo "Hebergement ID not specified.";
}

?>