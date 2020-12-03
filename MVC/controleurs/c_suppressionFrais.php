<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprFrais':
		{
			$id = $_REQUEST['idforfait'];
			$libelle = $pdo->getUnLibelle($id);
			$libelle = $libelle['libelleforfait'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$qte = $_REQUEST['quantite'];
			
			include("vues/v_supprimerFrais.php");
			break;
		}
		case 'confirmSupprFrais':
		{
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$matricule = $_REQUEST['matricule'];
			$mois = $_REQUEST['mois'];
			$id = $_REQUEST['id'];
			$pdo->modifFrais($matricule,$annee,$mois,$id);
		}
	}
?>
			
		