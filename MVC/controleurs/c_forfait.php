<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'creationForfait':
		{
			include("vues/v_forfait.php");
			break;
		}
		case 'confirmCreatForfait':
		{
			$idforfait = $_REQUEST['id'];
			$libelleforfait = $_REQUEST['libelle'];
			$montant = $_REQUEST['montant'];
			$pdo->creerForfait($idforfait,$libelleforfait,$montant);
			
			header('Location: v_detailNote.php');	
			
		}
	}
?>