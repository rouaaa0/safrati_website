<?php

require 'C:\xampp\htdocs\hebergement\config.php';

class HebergementC {

    public function listHebergements()
    {
        $sql = "SELECT * FROM hebergement";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteHebergement($idheberg)
    {
        $sql = "DELETE FROM hebergement WHERE idheberg = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idheberg);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
  
    
    function addHebergement($hebergement)
    {
        $sql = "INSERT INTO hebergement  
        VALUES (NULL,:nom, :type, :lieux, :prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $hebergement->getNom(),
                'type' => $hebergement->getType(),
                'lieux' => $hebergement->getLieux(),
                'prix' => $hebergement->getPrix(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showHebergement($idheberg)
    {
        $sql = "SELECT * from hebergement where idheberg = $idheberg";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $hebergement = $query->fetch();
            return $hebergement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateHebergement($hebergement, $idheberg)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE hebergement SET 
                    nom = :nom, 
                    type = :type, 
                    lieux = :lieux,
                    prix = :prix
                WHERE idheberg = :id'
            );
            
            $query->execute([
                'id' => $idheberg,            
                'nom' => $hebergement->getNom(),
                'type' => $hebergement->getType(),
                'lieux' => $hebergement->getLieux(),
                'prix' => $hebergement->getPrix()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage(); // Output the error message for debugging
        }
    }
}