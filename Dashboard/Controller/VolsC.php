<?php

include_once 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Config.php';    
include_once 'C:\xampp\htdocs\ali&yossra\ali&yossra\UserManagment\Dashboard\Model\Vols.php' ;


class VolsC
{

    public function listVols()
    {
        $sql = "SELECT * FROM vols";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function tri()
    {
        $db = config::getConnexion();
        $query = "SELECT * FROM vols ORDER BY date_depart ASC";
        $statement = $db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteVol($id_vols)
    {
        $sql = "DELETE FROM vols WHERE id_vols = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_vols);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
  
    
    function addVol($vol)
    {
        $sql = "INSERT INTO vols  
        VALUES (NULL,:compagne, :depart, :destination, :date_depart )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'compagne' => $vol->getCompagne(),
                'depart' => $vol->getDepart(),
                'destination' => $vol->getDestination(),
                'date_depart' => $vol->getDateDepart(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showVol($id_vols)
    {
        $sql = "SELECT * from vols where id_vols = $id_vols";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $vol = $query->fetch();
            return $vol;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
        // Autres méthodes de votre classe...
    
        public function searchVolsByCompagnie($compagnie)
        {
            // Préparez la requête SQL pour rechercher les vols par compagnie aérienne
            $sql = "SELECT * FROM vols WHERE compagne LIKE :compagnie";
    
            // Obtenez la connexion à la base de données
            $db = config::getConnexion();
    
            try {
                // Préparez la requête
                $stmt = $db->prepare($sql);
    
                // Lier le paramètre
                $compagnieParam = "%$compagnie%"; // Recherche partielle
                $stmt->bindParam(':compagnie', $compagnieParam, PDO::PARAM_STR);
    
                // Exécutez la requête
                $stmt->execute();
    
                // Récupérez les résultats
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Retournez les résultats
                return $results;
            } catch (PDOException $e) {
                // En cas d'erreur, affichez un message d'erreur et retournez null
                echo 'Erreur: ' . $e->getMessage();
                return null;
            }
        }
    
    function updateVol($vol, $id_vols)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE vols SET 
                compagne = :compagne, 
                depart = :depart, 
                destination = :destination,
                date_depart = :date_depart
            WHERE id_vols = :id'
        );
        
        $query->execute([
            'id' => $id_vols,            
            'compagne' => $vol->getCompagne(),
            'depart' => $vol->getDepart(),
            'destination' => $vol->getDestination(),
            'date_depart' => $vol->getDateDepart(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Output the error message for debugging
    }
}

}