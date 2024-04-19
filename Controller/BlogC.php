<?php

require 'C:\xampp\htdocs\mcv\config.php';

class BlogC
{

    public function listBlogs()
    {
        $sql = "SELECT * FROM blogs";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteBlog($idBlog)
    {
        $sql = "DELETE FROM blogs WHERE idBlog = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $idBlog);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
  
    
    function addBlog($blog)
    {
        $sql = "INSERT INTO blogs  
        VALUES (NULL, :titre, :contenu, :date_publication, :auteur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $blog->getTitre(),
                'contenu' => $blog->getContenu(),
                'date_publication' => $blog->getDatePublication(),
                'auteur' => $blog->getAuteur(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showBlog($idBlog)
    {
        $sql = "SELECT * from blogs where idBlog = $idBlog";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateBlog($blog, $idBlog)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE blogs SET 
                    titre = :titre, 
                    contenu = :contenu, 
                    date_publication = :date_publication,
                    auteur = :auteur
                WHERE idBlog = :id'
            );
            
            $query->execute([
                'id' => $idBlog,            
                'titre' => $blog->getTitre(),
                'contenu' => $blog->getContenu(),
                'date_publication' => $blog->getDatePublication(),
                'auteur' => $blog->getAuteur()
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage(); // Output the error message for debugging
        }
    }

}
