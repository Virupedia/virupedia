

<?php

include_once 'CrudLivreur.php';
if (isset($_POST['login']) && isset($_POST['password'])) {
	$livreurr = new livreurr();
	$result = $livreurr->verifierLogin($_POST['login'], $_POST['password']);

	if ($result->count == 0) {
		header("location:../views/front/loginversion1.php");
	} else {
		session_start();
		$_SESSION['idUsers'] = 1;
		$_SESSION['Login'] = $result->Login;
		$_SESSION['Password'] = $result->Password;
		$currentUrl = $_SESSION['currentURL'];


		header("location:../views/front/index.php?['Login']");
	}
} else {
	header("location:../views/front/loginversion1.php?err=champs");
}



?>