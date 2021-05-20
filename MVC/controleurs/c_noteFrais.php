<?php
	if (!isset($_REQUEST['action']))
		$action = 'creationNote';
	else 
		$action = $_REQUEST['action'];
		
	switch($action)
	{
		//cas qui permet de générer un formulaire de création d'un justifcatif en lien avec une note spécifique
		case 'creationNote':
		{
			$id = $_SESSION['typeprofil'];
        	if($id == "V")
        	{
            $login = $_SESSION['valeur'];
			
			$matricule = $_REQUEST['matricule'];
			include("vues/v_noteFrais.php");
			}
			else
			{
				include("vues/v_accueil.php");
			}
			break;

		}
		//cas qui permet de confirmer la création d'une note frais dont les données sont spécifiées dans le formulaire du cas de création et de l'appliquer à la BDD
		case 'confirmCreatNote':
		{
			$matricule = $_REQUEST['Fmatricule'];
			$annee = $_REQUEST['Fannee'];
			$mois = $_REQUEST['Fmois'];
			$statut = $_REQUEST['Fstatut'];
			$datefiche = $_REQUEST['Fdatefiche'];
			$lienpdf = "note_".$mois.$annee;
			$pdo->creerNote($matricule,$annee,$mois,$statut,$datefiche,$lienpdf);
			header("Location: index.php?uc=frais&ucf=afficherNotes");
			break;
		}
	}
?>