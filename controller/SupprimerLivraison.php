<?PHP
include "Crudlivraison.php";

$livraisonr = new livraisonr();

if (isset($_POST["idlivraison"])) {
    $livraisonr->supprimerlivraison($_POST["idlivraison"]);
    header('location:../views/back/Modifierlivraison.php');
}
?>