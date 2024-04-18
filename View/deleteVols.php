<?php

include 'C:\xampp\htdocs\mcv\Controller\VolsC.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $volsC = new VolsC();
    $volsC->deleteVol($id);
    header("Location: listVols.php");
    exit();
} else {
    echo "Flight ID not specified.";
}

?>