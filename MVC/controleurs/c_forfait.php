<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		//cas qui permet de générer un formulaire de création d'un forfait en lien avec une note spécifique
		case 'creationForfait':
		{
			$matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
			$recuplibelle = $pdo->getLibelle();
			include("vues/v_forfait.php");
			break;
		}
		//cas qui permet de confirmer la création d'un forfait dont les données sont spécifiées dans le formulaire du cas de création et de l'appliquer à la BDD
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
		break;
		}
		//cas qui permet de générer un formulaire de modification d'un forfait en lien avec une note spécifique
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
		//cas qui permet de confirmer la modification d'un forfait dont les données sont spécifiées dans le formulaire du cas de suppresssion et de l'appliquer à la BDD
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
		//cas qui permet de générer un formulaire de suppression d'un forfait en lien avec une note spécifique
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
		//cas qui permet de confirmer la suppression d'un forfait dont les données sont spécifiées dans le formulaire du cas de suppression et de l'appliquer à la BDD
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