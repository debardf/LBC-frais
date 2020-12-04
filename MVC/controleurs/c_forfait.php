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
	}
?>