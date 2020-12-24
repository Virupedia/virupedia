

<?php

include_once 'CrudLivreur.php';
	if(isset($_POST['login']) && isset($_POST['password']))
{
	$livreurr = new livreurr();
	$result = $livreurr->verifierLogin($_POST['login'],$_POST['password']);
	
	if($result->count==0)
	{
	header("location:../views/back/login.php" );
	
	
		
	}
	else
	{
		session_start();
		$_SESSION['Login'] = $result->Login;
		$_SESSION['Password'] = $result->Password;
		$currentUrl = $_SESSION['currentURL'];
		

		header("location:../views/back/index.php?['Login']"); 
	}

}
else
{
	header("location:../views/back/login.php?err=champs");
}



 ?>