<?php

require 'C:\xampp\htdocs\mcv\config.php';

class CommentaireC
{

    public function listCommentaires()
    {
        $sql = "SELECT * FROM commentaire";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getById($idCommentaire) {
        $sql = "SELECT * FROM commentaire WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $idCommentaire);
            $query->execute();
            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function deleteCommentaire($idCommentaire)
    {
        $sql = "DELETE FROM commentaire WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idCommentaire);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
  
    
    function addCommentaire($commentaire)
    {
        $sql = "INSERT INTO commentaire (message, id_blog, id_utilisateur)  
                VALUES (:message, :id_blog, :id_utilisateur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'message' => $commentaire->getMessage(),
                'id_blog' => $commentaire->getBlogId(),
                'id_utilisateur' => $commentaire->getUserId(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCommentaire($idCommentaire)
    {
        $sql = "SELECT * from commentaire where id = $idCommentaire";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommentaire($commentaire, $idCommentaire)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                    message = :message, 
                    id_blog = :id_blog,
                    id_utilisateur = :id_utilisateur
                WHERE id = :id'
            );
            
            $query->execute([
                'id' => $idCommentaire,            
                'message' => $commentaire->getMessage(),
                'id_blog' => $commentaire->getBlogId(),
                'id_utilisateur' => $commentaire->getUserId()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage(); // Output the error message for debugging
        }
    }

}

?>
