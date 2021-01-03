<?php

include_once "C://xampp/htdocs/virupedia/config.php";
require_once 'C://xampp/htdocs/virupedia/model/livraison.php';

class livraisonr
{
    public function afficherlivraison()
    {
        $db = config::getConnexion();
        $sql = 'SELECT * FROM virupedia.livraison';
        $result = $db->query($sql);
        return $result;
        //Return array of array
        //Index date du colonne de table de base de données
    }

    public function ajouterlivraison($livraison)
    {
        $sql = 'INSERT INTO virupedia.livraison(date_liv,etat,AddressLivraison)VALUES(:date_livraison,:etat_livraison,:Adresse_livraison)';
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'date_livraison' => $livraison->getdate_livraison(),
                'etat_livraison' => $livraison->getetat_livraison(),
                'Adresse_livraison' => $livraison->getAdresse_livraison()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function Supprimerlivraison($idlivraison)
    {
        $sql = "DELETE FROM virupedia.livraison WHERE idlivraison=:idlivraison";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idlivraison', $idlivraison);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function modifierlivraison($livraison, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE virupedia.livraison SET 
						date_liv= :date_livraison, 
						etat= :etat_livraison,
                        AddressLivraison= :Adresse_livraison
						
                       /* date_livraison= :datelivraison, 
						etat_livraison= :etatlivraison,
						type_livraison = :typelivraison*/
						
					WHERE idlivraison = :idlivraison'
            );
            $query->execute([
                'date_livraison' => $livraison->getdate_livraison(),
                'etat_livraison' => $livraison->getetat_livraison(),
                'Adresse_livraison' => $livraison->getAdresse_livraison(),
                'idlivraison' => $id
            ]);
            echo $query->rowCount() . " Deliveries UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }




    function recupererlivraison($id)
    {
        $sql = "SELECT * from virupedia.livraison where idlivraison=$id";
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




    function recherche($search_value)
    {
        $sql = "SELECT * FROM virupedia.livraison where  idLivraison like '$search_value' or date_liv like '%$search_value%' or etat like '%$search_value%' or AddressLivraison like '%$search_value%' or idUsers like '%$search_value%' ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function CountLivraisonlivre()
    {
        $db = config::getConnexion();
        $req1 = $db->query("SELECT * FROM virupedia.livraison Where etat=1");
        return $req1->rowCount();
    }

    public function CountLivraisonnonlivre()
    {
        $db = config::getConnexion();
        $req1 = $db->query("SELECT * FROM virupedia.livraison Where etat=2");
        return $req1->rowCount();
    }

    function trier($par)
    {
        $sql = "SELECT * FROM virupedia.livraison order by $par ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
