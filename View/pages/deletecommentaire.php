<?php

include 'C:\xampp\htdocs\mcv\Controller\CommentaireC.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $blogC = new CommentaireC();
    $blogC->deleteCommentaire($id);
    header("Location: listCommentaires.php");
    exit();
} else {
    echo "commentaire ID not specified.";
}
