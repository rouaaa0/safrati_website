<?php
include 'C:\xampp\htdocs\projetwissem\PackManagement\Dashboard\Controller\ReservationC.php';

	$message = "" ; 
	$ReservationC=new ReservationC();
	$ReservationC->SupprimerReservation($_GET["idReservation"]);
	header("Location:AfficherReservations.php?successMessage= Reservation Supprimé avec succés");

?>