<?php

require __DIR__.'/..\config.php';

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
        $sql = "INSERT INTO hebergement (nom, type, lieux, prix, user_id, offre_id)  
        VALUES (:nom, :type, :lieux, :prix, :user_id, :offre_id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $hebergement->getNom(),
                'type' => $hebergement->getType(),
                'lieux' => $hebergement->getLieux(),
                'prix' => $hebergement->getPrix(),
                'user_id' => $hebergement->getUserId(),
                'offre_id' => $hebergement->getOffreId() // Added the foreign key value
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showHebergement($idheberg)
    {
        $sql = "SELECT * FROM hebergement WHERE idheberg = :idheberg";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idheberg', $idheberg);
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
                    prix = :prix,
                    user_id = :user_id,
                    offre_id = :offre_id
                WHERE idheberg = :id'
            );

            $query->execute([
                'id' => $idheberg,
                'nom' => $hebergement->getNom(),
                'type' => $hebergement->getType(),
                'lieux' => $hebergement->getLieux(),
                'prix' => $hebergement->getPrix(),
                'user_id' => $hebergement->getUserId(),
                'offre_id' => $hebergement->getOffreId() // Added the foreign key value
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function getByAttribute($attribute, $query)
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM hebergement WHERE $attribute = :query";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':query', $query);
            $stmt->execute();
            $hebergements = $stmt->fetchAll();
            return $hebergements;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function getByOfferAndUserId($offreId, $idUser)
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM hebergement WHERE offre_id = :offreId AND user_id = :idUser";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':offreId', $offreId);
            $stmt->bindValue(':idUser', $idUser);
            $stmt->execute();
            $hebergement = $stmt->fetch();
            return $hebergement;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}