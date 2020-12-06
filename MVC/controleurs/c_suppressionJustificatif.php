<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprJustificatif':
		{
			$idjustificatif = $_REQUEST['idjustificatif'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$pdfjustificatif = $pdo->getLeJustificatif($matricule,$annee,$mois,$idjustificatif);
			$pdfjustificatif = $pdfjustificatif['pdfjustificatif'];
			include("vues/v_supprimerJustificatif.php");
			break;
		}
		case 'confirmSupprJustificatif':
		{
			$annee = $_REQUEST['annee'];
			$matricule = $_REQUEST['matricule'];
			$mois = $_REQUEST['mois'];
			$idjustificatif = $_REQUEST['idjustificatif'];
			$pdo->supprJustificatif($matricule,$annee,$mois,$idjustificatif);
			header('Location: index.php?uc=frais&ucf=afficherNotes');
		}
	}
?>
			
		