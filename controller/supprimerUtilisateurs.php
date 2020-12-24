<?PHP
include "C://xampp/htdocs/Virupedia/virupedia/controller/userC.php";

$Utilisateur = new UtilisateurC();

if (isset($_POST["id"])) {
    $Utilisateur->supprimerUtilisateurs($_POST["id"]);
    header('Location:../views/back/Consulterclient.php');
}else{
    echo "error : try again ";
    echo $_POST['id'];
}
