<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modifAutreForfait':
		{
			$idfrais = $_REQUEST['idfrais'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
			$unAutreForfait = $pdo->getAutreForfait($matricule,$annee,$mois,$idfrais);
			$datefrais = $unAutreForfait['datefrais'];
			$libelle = $unAutreForfait['libelle'];
			$montant = $unAutreForfait['montant'];
            $recupannee = $pdo->getAnnee($matricule);
			$recupmois = $pdo->getMois($matricule);
			include("vues/v_modifierAutreForfait.php");
			break;
		}
		case 'confirmModifAutreForfait':
		{
			$idfrais = $_REQUEST['idfrais'];
			$annee = $_REQUEST['anneeM'];
			$mois = $_REQUEST['moisM'];
			$montant = $_REQUEST['montantM'];
			$libelle = $_REQUEST['libelleM'];
			$matricule = $_REQUEST['matricule'];
			$datefrais = $_REQUEST['dateM'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
			$pdo->modifAutreForfait($matricule,$anneeO,$moisO,$idfrais,$annee,$mois,$montant,$libelle,$datefrais);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');
			break;
		}
	}
?>