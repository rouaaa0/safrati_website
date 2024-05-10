<?php
include_once dirname(__FILE__).'/../../Model/User.php';
include_once dirname(__FILE__).'/../../Model/Hebergement.php';
include_once dirname(__FILE__).'/../../Controller/HebergementC.php';
include_once dirname(__FILE__).'/../../Controller/OffreC.php';
include_once dirname(__FILE__).'/../../Controller/UserC.php';


$userC = new UserC();
$user = $userC->RecupererUserByEmail('yacine@gmail.com'); // Replace with the user's email to get the corresponding user

$offreId = $_GET['id'] ?? ''; // Get the ID of the offre from the URL parameter

if (!empty($offreId)) {
$hebergementC = new HebergementC();

// Check if an hebergement with the same offer and user_id already exists
$existingHebergement = $hebergementC->getByOfferAndUserId($offreId, $user['idUser']);

if ($existingHebergement) {
$errorMessage = 'An hebergement with the same offer and user already exists.';
header("Location: packs.php?error=" . urlencode($errorMessage));
exit;
}
    $OffreC = new OffreC();
    $offre = $OffreC->Recupereroffre($offreId);

// Create a new hebergement
$hebergement = new Hebergement();
$hebergement->setNom($offre["ID_offre"]);
$hebergement->setType("Touristique");
$hebergement->setLieux("Tunis");
$hebergement->setPrix(99);

$hebergement->setOffreId($offreId);
$hebergement->setUserId($user['idUser']);

$hebergementC->addHebergement($hebergement);
    include_once dirname(__FILE__) . '/../../Controller/SendMail.php';

    $successMessage = 'Hebergement effectue avec success.';
    header("Location: packs.php?success=" . urlencode($successMessage));

}