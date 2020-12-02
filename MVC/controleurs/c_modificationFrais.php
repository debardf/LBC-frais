<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modifFrais':
		{
			$id = $_REQUEST['idforfait'];
			$matricule = $_REQUEST['matricule'];
			$qte = $_REQUEST['quantite'];
			$annee = $_REQUEST['annee'];
			$mois = $_REQUEST['mois'];
            $leForfait = $pdo->getLeForfait($matricule);
            $recuplibelle = $pdo->getLibelle();
            $recupannee = $pdo->getAnnee($matricule);
			$recupmois = $pdo->getMois($matricule);
			include("vues/v_modifierFrais.php");
			break;
		}
		case 'confirmModifFrais':
		{
			$id = $_REQUEST['idforfait'];
			$matricule = $_REQUEST['matricule'];
			$annee = $_REQUEST['anneeM'];
			$mois = $_REQUEST['moisM'];
			$qte = $_REQUEST['quantite'];
			var_dump($id,$matricule,$annee,$mois,$qte);
			$pdo->modifFrais($id,$matricule,$annee,$mois,$qte);
			
			
			//header('Location: index.php?uc=frais&ucf=afficherNotes');
			break;
		}
	}
?>