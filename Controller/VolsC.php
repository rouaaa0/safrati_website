<?php

require 'C:\xampp\htdocs\mcv\config.php';

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
        VALUES (NULL,:compagne, :depart, :destination, :date_depart, :prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'compagne' => $vol->getCompagne(),
                'depart' => $vol->getDepart(),
                'destination' => $vol->getDestination(),
                'date_depart' => $vol->getDateDepart(),
                'prix' => $vol->getPrix(),
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

    function updateVol($vol, $id_vols)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE vols SET 
                compagne = :compagne, 
                depart = :depart, 
                destination = :destination,
                date_depart = :date_depart,
                prix = :prix
            WHERE id_vols = :id'
        );
        
        $query->execute([
            'id' => $id_vols,            
            'compagne' => $vol->getCompagne(),
            'depart' => $vol->getDepart(),
            'destination' => $vol->getDestination(),
            'date_depart' => $vol->getDateDepart(),
            'prix' => $vol->getPrix()
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(); // Output the error message for debugging
    }
}

}