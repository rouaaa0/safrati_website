<?php
	include_once dirname(__FILE__).'/../Config.php';
	include_once dirname(__FILE__).'/../Model/User.php';

    class UserC {


        /////..............................Afficher............................../////
                function AfficherUser(){
                    $sql="SELECT * FROM user";
                    $db = Config::getConnexion();
                    try{
                        $liste = $db->query($sql);
                        return $liste;
                    }
                    catch(Exception $e){
                        die('Erreur:'. $e->getMessage());
                    }
                }
        
        /////..............................Supprimer............................../////
                function SupprimerUser($idUser){
                    $sql="DELETE FROM user WHERE idUser=:idUser";
                    $db = Config::getConnexion();
                    $req=$db->prepare($sql);
                    $req->bindValue(':idUser', $idUser);   
                    try{
                        $req->execute();
                    }
                    catch(Exception $e){
                        die('Erreur:'. $e->getMeesage());
                    }
                }
        
        
        /////..............................Ajouter............................../////
                function AjouterUser($user){
                    $sql="INSERT INTO user (username,email,password,dob,role) 
                    VALUES (:username,:email,:password,:dob,:role)";
                    
                    $db = Config::getConnexion();
                    try{
                        $query = $db->prepare($sql);
                        $query->execute([
                            'username' => $user->getUsername(),
                            'email' => $user->getEmail(),
                            'password' => $user->getPassword(),
                            'dob' => $user->getDate(),
                            'role' => $user->getRole()
                    ]);
                                
                    }
                    catch (Exception $e){
                        echo 'Erreur: '.$e->getMessage();
                    }			
                }
        /////..............................Affichage par la cle Primaire............................../////
                function RecupererUser($idUser){
                    $sql="SELECT * from user where idUser=$idUser";
                    $db = Config::getConnexion();
                    try{
                        $query=$db->prepare($sql);
                        $query->execute();
        
                        $user=$query->fetch();
                        return $user;
                    }
                    catch (Exception $e){
                        die('Erreur: '.$e->getMessage());
                    }
                }
        
        /////..............................Update............................../////
                function ModifierUser($user,$idUser){
                    try {
                        $db = Config::getConnexion();
                $query = $db->prepare('UPDATE user SET  username = :username, email = :email, password = :password , dob = :dob, role = :role  WHERE idUser= :idUser');
                        $query->execute([
                            'username' => $user->getUsername(),
                            'email' => $user->getEmail(),
                            'password' => $user->getPassword(),
                            'dob' => $user->getDate(),
                            'role' => $user->getRole(),
                            'idUser' => $idUser
                        ]);
                        echo $query->rowCount() . " records UPDATED successfully <br>";
                    } catch (PDOException $e) {
                        $e->getMessage();
                    }
                }

                function RecupererUserByEmail($Email){
                    $sql="SELECT * from user where email='".$Email."'";
                    $db = Config::getConnexion();
                    try{
                        $query=$db->prepare($sql);
                        $query->execute();
        
                        $user=$query->fetch();
                        return $user;
                    }
                    catch (Exception $e){
                        die('Erreur: '.$e->getMessage());
                    }
                }

            }


?>