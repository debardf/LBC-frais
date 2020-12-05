<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprJustificatif':
		{
			$id = $_REQUEST['idjustificatif'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$qte = $pdo->getLeJustificatif($matricule,$annee,$mois,$id);
			include("vues/v_supprimerFrais.php");
			break;
		}
		case 'confirmSupprJustificatif':
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
			
		