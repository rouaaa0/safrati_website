<?php

include 'C:\xampp\htdocs\mcv\Controller\DateC.php'; // Inclure la classe DateC pour gérer les opérations sur les dates

$dateC = new DateC(); // Créer une instance du contrôleur de dates

// Vérifier si le paramètre 'date' est passé via la méthode GET
if(isset($_GET['date'])) {
    $date = $_GET['date']; // Récupérer la date depuis la méthode GET

    // Supprimer la date de la base de données en utilisant la méthode deleteDate de DateC
    $dateC->deleteDate($date);

    // Rediriger vers la liste des dates après la suppression
    header("Location: listDate.php");
    exit();
} else {
    // Afficher un message d'erreur si la date n'est pas spécifiée
    echo "La date à supprimer n'est pas spécifiée.";
}

?>
