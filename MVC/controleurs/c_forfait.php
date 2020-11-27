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
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['annee'];
			$quantite = $_REQUEST['quantite'];
			$pdo->creerForfait($idforfait,$matricule,$annee, $mois, $quantite);
			
			header('Location: v_detailNote.php');
			
		}
	}
?>