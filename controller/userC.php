<?PHP
include "C://xampp/htdocs/Virupedia/virupedia/config.php";
require_once 'C://xampp/htdocs/Virupedia/virupedia/model/users.php';
class UtilisateurC
{

    function ajouterUtilisateur($Utilisateur)
    {
        $sql = "INSERT INTO users (nameUsers, lastnameUsers , address, Login , Cin ,Password) 
			VALUES (:nameUsers,:lastnameUsers,:address, :Login, :Cin , :Password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'nameUsers' => $Utilisateur->getNom(),
                'lastnameUsers' => $Utilisateur->getPrenom(),
                'address' => $Utilisateur->getAdress(),
                'Login' => $Utilisateur->getLogin(),
                'Cin' => $Utilisateur->getCin(),
                'Password' => $Utilisateur->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function afficherUtilisateurs()
    {

        $sql = "SELECT * FROM users";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerUtilisateurs($id)
    {
        $sql = "DELETE FROM users WHERE idUsers = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recupererUtilisateur($id){
        $sql="SELECT * from users where idUsers =$id";
        $db = config::getConnexion();
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

    function modifierUtilisateur($Utilisateur, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Users SET 
                     nameUsers= :nameUsers, 
                     lastnameUsers= :lastnameUsers,
                     address= :address,
                     Login= :Login,
                     Cin= :Cin,
                     Password= :Password
                WHERE idUsers = :idUsers'
            );
            $query->execute([
                'nameUsers' => $Utilisateur->getNom(),
                'lastnameUsers' => $Utilisateur->getPrenom(),
                'address' => $Utilisateur->getAdress(),
                'Login' => $Utilisateur->getLogin(),
                'Cin' => $Utilisateur->getCin(),
                'Password' => $Utilisateur->getPassword(),
                'idUsers' =>$id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}
