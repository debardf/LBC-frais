<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'creationNote':
		{
			$matricule = $_REQUEST['matricule'];
			$leMatricule = $pdo->getLeMatricule($matricule);
			include("vues/v_noteFrais.php");
			break;
		}
		case 'confirmCreaNote':
		{
			$matricule = $_REQUEST['Fmatricule'];
			$annee = $_REQUEST['Fannee'];
			$mois = $_REQUEST['Fmois'];
			$statut = $_REQUEST['Fstatut'];
			$datefiche = $_REQUEST['Fdatefiche'];
			$lienpdf = $_REQUEST['Flien'];
			$pdo->creerFrais($matricule,$annee,$mois,$statut,$datefiche,$lienpdf);
			
			header("Location: afficherNotes.php");
			break;
		}
	}
?>