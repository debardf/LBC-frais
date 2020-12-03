<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'supprFrais':
		{
			$id = $_REQUEST['idforfait'];
			var_dump($id);
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$qte = $_REQUEST['quantite'];
            $libelle = $pdo->getUnLibelle($id);
			include("vues/v_supprimerFrais.php");
			break;
		}
		case 'confirmSupprFrais':
		{
			$id = $_REQUEST['id'];
			$annee = $_REQUEST['anneeM'];
			$mois = $_REQUEST['moisM'];
			$qte = $_REQUEST['quantite'];
			$matricule = $_REQUEST['matricule'];
			$idO = $_REQUEST['idforfait'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
			var_dump($matricule,$idO,$anneeO,$moisO);
			$pdo->modifFrais($matricule,$idO,$anneeO,$moisO,$id,$annee,$mois,$qte);
		}
	}
?>
			
		