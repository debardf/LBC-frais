<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprFrais':
		{
			$id = $_REQUEST['idforfait'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$libelle = $pdo->getUnLibelle($id);
			$libelle = $libelle['libelleforfait'];
			$qte = $pdo->getLeforfait($matricule,$annee,$mois,$id)['quantite'];
			
			include("vues/v_supprimerFrais.php");
			break;
		}
		case 'confirmSupprFrais':
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
			
		