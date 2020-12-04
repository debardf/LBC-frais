<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modifFrais':
		{
			$id = $_REQUEST['idforfait'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$qte = $pdo->getLeforfait($matricule,$annee,$mois,$id)['quantite'];
			$idO = $_REQUEST['idforfait'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
            $recuplibelle = $pdo->getLibelle();
            $recupannee = $pdo->getAnnee($matricule);
			$recupmois = $pdo->getMois($matricule);
			include("vues/v_modifierFrais.php");
			break;
		}
		case 'confirmModifFrais':
		{
			$id = $_REQUEST['id'];
			$annee = $_REQUEST['anneeM'];
			$mois = $_REQUEST['moisM'];
			$qte = $_REQUEST['quantite'];
			$matricule = $REQUEST['matricule'];
			$idO = $_REQUEST['idforfait'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
			var_dump($matricule,$idO,$anneeO,$moisO);
			$pdo->modifFrais($matricule,$idO,$anneeO,$moisO,$id,$annee,$mois,$qte);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');
			break;
		}
		
	}
?>