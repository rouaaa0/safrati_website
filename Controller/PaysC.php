<?php

require 'C:\xampp\htdocs\mcv\config.php';

class PaysC
{

    public function listPays()
    {
        $sql = "SELECT * FROM pays";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addPays($pays)
    {
        $sql = "INSERT INTO pays (nom_Pays, prix) VALUES (:nomPays, :prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomPays' => $pays->getNomPays(),
                'prix' => $pays->getPrix(),
            ]);
            echo "<center><strong><h3>Pays ajouté avec succès!</h3></strong></center>";
        } catch (Exception $e) {
            echo 'Error adding pays: ' . $e->getMessage();
        }
    }
    

    public function deletePays($nomPays)
    {
        $sql = "DELETE FROM pays WHERE nom_Pays = :nomPays";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nomPays', $nomPays);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function updatePays($pays, $ancienNomPays)
    {
        $sql = "UPDATE pays SET nom_Pays = :nouveauNomPays, prix = :prix WHERE nom_Pays = :ancienNomPays";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nouveauNomPays', $pays->getNomPays());
        $req->bindValue(':prix', $pays->getPrix());
        $req->bindValue(':ancienNomPays', $ancienNomPays);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getPays($nomPays)
    {
        $sql = "SELECT * FROM pays WHERE nom_Pays = :nomPays";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nomPays', $nomPays);

        try {
            $req->execute();
            $pays = $req->fetch();
            return $pays;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

?>
