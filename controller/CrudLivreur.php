<?php

include_once "C://xampp/htdocs/virupedia/config.php";


class Livreurr
{
    public function afficherLivreur()
    {
        $db = config::getConnexion();
        $sql = 'SELECT * FROM virupedia.users';
        $result = $db->query($sql);
        return $result;
        //Return array of array
        //Index Nom du colonne de table de base de données
    }

    public function ajouterLivreur($livreur)
    {
        $sql = 'INSERT INTO virupedia.users(nameUsers,lastnameUsers,address,Login,Cin,Password,ImageUsers,role)VALUES(:nom_livreur,:prenom_livreur,:Address_livreur,:login_livreur,:Cin_livreur,:Password_livreur,:ImageUsers_livreur,:role_livreur)';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nom_livreur' => $livreur->getnom_livreur(),
                'prenom_livreur' => $livreur->getprenom_livreur(),
                'Address_livreur' => $livreur->getAddress_livreur(),
                'login_livreur' => $livreur->getlogin_livreur(),
                'Cin_livreur' => $livreur->getCin_livreur(),
                'Password_livreur' => $livreur->getPassword_livreur(),
                'ImageUsers_livreur' => $livreur->getImageUsers_livreur(),
                'role_livreur' => $livreur->getrole_livreur()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function Supprimerlivreur($idlivreur)
    {
        $sql = "DELETE FROM virupedia.users WHERE idUsers=:idUsers";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idUsers', $idlivreur);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function modifierlivreur($livreur, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE virupedia.users SET 
						nameUsers = :nom_livreur, 
						lastnameUsers = :prenom_livreur,
						address = :Address_livreur,
                        Login = :Login_livreur, 
						Cin = :Cin_livreur,
						Password = :Password_livreur,
                        ImageUsers = :ImageUsers_livreur,
                        role = :role_livreur
                        /* Nom_livreur= :Nomlivreur, 
						prenom_livreur= :prenomlivreur,
						Address_livreur = :Addresslivreur*/
						
					WHERE idUsers = :idUsers'
            );
            $query->execute([
                'nom_livreur' => $livreur->getnom_livreur(),
                'prenom_livreur' => $livreur->getprenom_livreur(),
                'Address_livreur' => $livreur->getAddress_livreur(),
                'Login_livreur' => $livreur->getLogin_livreur(),
                'Cin_livreur' => $livreur->getCin_livreur(),
                'Password_livreur' => $livreur->getPassword_livreur(),
                'ImageUsers_livreur' => $livreur->getImageUsers_livreur(),
                'role_livreur' => $livreur->getrole_livreur(),
                'idUsers' => $id
            ]);
            echo $query->rowCount() . " Deliveries UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererlivreur($id)
    {
        $sql = "SELECT * from virupedia.users where idUsers=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



    function trier($par)
    {
        $sql = "SELECT * FROM virupedia.users order by $par ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function recherche($search_value)
    {
        $sql = "SELECT * FROM virupedia.users where  idUsers like '$search_value' or nameUsers like '%$search_value%' or lastnameUsers like '%$search_value%' or address like '%$search_value%' or Login like '%$search_value%'or Cin like '%$search_value%' or Password like '%$search_value%'or ImageUsers like '%$search_value%'or Role like '%$search_value%'";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function AffecterLivreurLivraison($idLivreur, $idLivraison)
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql = "UPDATE virupedia.livraison set idUsers=:idUsers WHERE idLivraison=:idLivraison";
        $db = Config::getConnexion();
        try {
            $req = $db->prepare($sql);




            $req->bindValue(':idUsers', $idLivreur);

            $req->bindValue(':idLivraison', $idLivraison);

            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }




    function verifierLogin($login, $password)
    {
        $db = config::getConnexion();
        $sql = 'SELECT COUNT(*) AS count,Login,Password FROM virupedia.users WHERE Login = :login AND Password = :password  LIMIT 1';
        $req = $db->prepare($sql);
        $req->bindValue(':login', $login);
        $req->bindValue(':password', $password);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);
        return $result;
    }









    public function AfficherLivreurPaginer($page, $perPage)
    {
        $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
        $sql = "SELECT * FROM virupedia.users LIMIT {$start},{$perPage}";
        $db = config::getConnexion();
        try {
            $liste = $db->prepare($sql);
            $liste->execute();
            $liste = $liste->fetchAll(PDO::FETCH_ASSOC);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    public function calcTotalRows($perPage)
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM virupedia.users";
        $db = config::getConnexion();
        try {

            $liste = $db->query($sql);
            $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
            $pages = ceil($total / $perPage);
            return $pages;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function getnbLivraison($idLivreur)
    {
        $sql = "SElECT nblivraison From virupedia.users where idUsers=$idLivreur";
        $db = Config::getConnexion();
        try {
            $nb = $db->query($sql);
            return $nb;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function Livreur_INC_nblivraison($idLivreur, $nb)
    {
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql = "UPDATE virupedia.users SET nblivraison=:nb where idUsers=:idLivreur";
        $db = Config::getConnexion();
        try {
            $req = $db->prepare($sql);




            $req->bindValue(':nb', $nb + 1);
            $req->bindValue(':idLivreur', $idLivreur);

            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
