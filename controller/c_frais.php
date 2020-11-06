<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'frais':
		{
			include("controller");
			break;
		}
		case 'confirmCreatCLient':
		{
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$adresse = $_REQUEST['TAdresse'];
			$codepostal = $_REQUEST['TCodepostal'];
			$ville = $_REQUEST['TVille'];
			$pdo->creerClient($nom,$prenom,$adresse,$codepostal,$ville);
			
			//soit ce code :
			$lesClients = $pdo->getLesClients();
			include("vues/v_clients.php");	
			
			// ou ce code :
			//header('Location: index.php');	
			break;
		}
	}
?>