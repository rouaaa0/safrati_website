<?php
session_start();

// remove all session variables (les données mtaa user lkol bch yetnahaw)
session_unset();
// destroy the session
session_destroy();  
header("Location:front/travelix-master/index.php");
?>