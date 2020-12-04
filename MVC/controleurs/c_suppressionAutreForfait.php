<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprAutreFrais':
		{
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$libelle = $_REQUEST['libelle'];
			$id = $_REQUEST['id'];
			
			include("vues/v_supprimerAutreForfait.php");
			break;
		}
		case 'confirmsupprAutreFrais':
		{
			$annee = $_REQUEST['annee'];
			$matricule = $_REQUEST['matricule'];
			$mois = $_REQUEST['mois'];
			$id = $_REQUEST['id'];
			$pdo->supprFrais($matricule,$annee,$mois,$id);
			header('Location: index.php?uc=frais&ucf=afficherNotes');
		}
	}
?>
			
		