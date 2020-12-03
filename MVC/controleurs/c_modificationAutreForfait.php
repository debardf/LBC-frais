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
			$libelle = $_REQUEST['libelle'];
			$montant = $_REQUEST['montant'];
			$datefrais = $_REQUEST['datefrais'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
            $recupannee = $pdo->getAnnee($matricule);
			$recupmois = $pdo->getMois($matricule);
			include("vues/v_modifierAutreForfait.php");
			break;
		}
		case 'confirmModifAutreForfait':
		{
			$id = $_REQUEST['id'];
			$annee = $_REQUEST['anneeM'];
			$mois = $_REQUEST['moisM'];
			$montant = $_REQUEST['montantM'];
			$libelle = $_REQUEST['libelleM'];
			$matricule = $_REQUEST['matricule'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
			var_dump($matricule,$idO,$anneeO,$moisO);
			$pdo->modifAutreForfait($matricule,$anneeO,$moisO,$idfrais,$annee,$mois,$montant,$libelle);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');
			break;
		}
	}
?>