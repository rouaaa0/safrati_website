<?php
include 'C:\xampp\htdocs\mcv\Controller\PaysC.php';

$paysC = new PaysC(); // Créer une instance du contrôleur des pays

// Vérifier si un identifiant de pays est spécifié dans l'URL
if(isset($_GET['nomPays'])) {
    $nomPays = $_GET['nomPays'];

    // Supprimer le pays en utilisant le contrôleur des pays
    $paysC->deletePays($nomPays);

    // Rediriger vers une autre page ou afficher un message de confirmation
    header("Location: listPays.php");
    exit();
} else {
    // Afficher un message d'erreur si aucun identifiant de pays n'est spécifié
    echo "L'identifiant du pays n'est pas spécifié.";
}

?>