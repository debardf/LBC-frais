<?php
	if (!isset($_REQUEST['action']))
		$action = 'creationNote';
	else 
		$action = $_REQUEST['action'];
		
	switch($action)
	{
		case 'creationNote':
		{
			$id = $_SESSION['typeprofil'];
        	if($id == "V")
        	{
            $login = $_SESSION['valeur'];
			
			$leMatricule = $pdo->getMatricule($login);
			include("vues/v_noteFrais.php");
			}
			else
			{
				include("vues/v_accueil.php");
			}
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