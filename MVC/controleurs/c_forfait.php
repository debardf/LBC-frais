<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'creationForfait':
		{
			$matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$recuplibelle = $pdo->getLibelle();
			include("vues/v_forfait.php");
			break;
		}
		case 'confirmCreatForfait':
		{
			
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$idforfait = $_REQUEST['id'];
			$quantite = $_REQUEST['quantite'];
			$valideForfait = $_REQUEST['valideForfait'];
			$pdo->creerForfait($matricule,$annee, $mois, $idforfait, $quantite, $valideForfait);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');
			
		}

		case 'modifForfait':
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
			include("vues/v_modifierForfait.php");
			break;
		}
		case 'confirmModifForfait':
		{
			$id = $_REQUEST['id'];
			$annee = $_REQUEST['anneeM'];
			$mois = $_REQUEST['moisM'];
			$qte = $_REQUEST['quantite'];
			$matricule = $_REQUEST['matricule'];
			$idO = $_REQUEST['idforfait'];
			$anneeO = $_REQUEST['annee'];
			$moisO = $_REQUEST['mois'];
			$pdo->modifFrais($matricule,$idO,$anneeO,$moisO,$id,$annee,$mois,$qte);
			header('Location: index.php?uc=frais&ucf=afficherNotes');
			break;
		}
		case 'supprForfait':
		{
			$id = $_REQUEST['idforfait'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$libelle = $pdo->getUnLibelle($id);
			$libelle = $libelle['libelleforfait'];
			$qte = $pdo->getLeforfait($matricule,$annee,$mois,$id)['quantite'];
			include("vues/v_supprimerForfait.php");
			break;
		}
		case 'confirmSupprForfait':
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