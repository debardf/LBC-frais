<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprAutreForfait':
		{
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$id = $_REQUEST['idfrais'];
			$unAutreForfait = $pdo->getAutreForfait($matricule,$annee,$mois,$id);
			$dateFrais = $unAutreForfait['datefrais'];
			$libelle = $unAutreForfait['libelle'];
			$montant = $unAutreForfait['montant'];
			include("vues/v_supprimerAutreForfait.php");
			break;
		}
		case 'confirmSupprAutreForfait':
		{
			$annee = $_REQUEST['annee'];
			$matricule = $_REQUEST['matricule'];
			$mois = $_REQUEST['mois'];
			$id = $_REQUEST['id'];
			$pdo->supprAutreForfait($matricule,$annee,$mois,$id);
			header('Location: index.php?uc=frais&ucf=afficherNotes');
		}
	}
?>
			
		