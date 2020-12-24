<?PHP
include "CrudLivreur.php";

$Livreurr = new livreurr();

if (isset($_POST["idUsers"])) {
    $Livreurr->supprimerlivreur($_POST["idUsers"]);
    header('location:../views/back/Modifierlivreur.php');
    //header('location:C://wamp64/www/Newwork/Projetwebtest - Copy/Views/back/Modifierlivreur.php');
}
?>