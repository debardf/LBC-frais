<?php
    if(!isset($_REQUEST['action']))
    $action = 'creationAutreForfait';
    else
    $action = $_REQUEST['action'];
	switch($action)
	{
        //cas qui permet de générer un formulaire de création d'un justifcatif en lien avec une note spécifique
		case 'creationJustificatif':
		{
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
			include("vues/v_justificatif.php");
            break;
            
        }
        //cas qui permet de confirmer la création d'un justifcatif dont les données sont spécifiées dans le formulaire du cas de création et de l'appliquer à la BDD
		case 'confirmCreatJustificatif':
		{
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
			$pdfjustificatif = $_REQUEST['pdfjustificatif'];
            $id = $pdo->compterId();
            $id = max($id);
            $id++;
			$pdo->creerJustificatif($id, $matricule, $annee, $mois, $pdfjustificatif);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');
			
        }
        //cas qui permet de générer un formulaire de suppression d'un justifcatif en lien avec une note spécifique
        case 'supprimerJustificatif':
        {
                $idjustificatif = $_REQUEST['idjustificatif'];
                $matricule = $_REQUEST['matricule'];
                $annee = $_REQUEST['annee'];
                $mois = $_REQUEST['mois'];
                $pdfjustificatif = $pdo->getLeJustificatif($matricule,$annee,$mois,$idjustificatif);
                $pdfjustificatif = $pdfjustificatif['pdfjustificatif'];
                include("vues/v_supprimerJustificatif.php");
                break;
        }
        //cas qui permet de confirmer la suppression d'un justifcatif dont les données sont spécifiées dans le formulaire du cas de modification et de l'appliquer à la BDD
        case 'confirmSupprJustificatif':
        {
            $annee = $_REQUEST['annee'];
            $matricule = $_REQUEST['matricule'];
            $mois = $_REQUEST['mois'];
            $idjustificatif = $_REQUEST['idjustificatif'];
            $pdo->supprJustificatif($matricule,$annee,$mois,$idjustificatif);
            header('Location: index.php?uc=frais&ucf=afficherNotes');
        }
        case 'ajoutLien':
        {
            $annee = $_REQUEST['annee'];
            $matricule = $_REQUEST['matricule'];
            $mois = $_REQUEST['mois'];
            $pdo->getModifLien($matricule,$annee,$mois);
            //header('Location: index.php?uc=frais&ucf=afficherNotes');
            break;
        }
        
        case'generepdf' :
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            $leProfil=$pdo->getLeProfil($matricule);
            $prenom = $leProfil['prenom'];
            $nom = $leProfil['nom'];
        
            $lesForfaits = $pdo->getLesForfaits($matricule, $annee, $mois);
            $lesFrais = $pdo->getLesFrais($matricule, $annee, $mois);
            $lesSignatures = $pdo->getSignaturesByFiches($matricule, $annee, $mois);
            $cumulForfait = count($lesForfaits);
            $cumulFrais = count($lesFrais);
            switch ($mois)
            {
                case 1 :
                {
                    $mois1 = "janvier";
                    break;
                }
                case 2 :
                {
                    $mois1 = "février";
                    break;
                }
                case 3 :
                {
                    $mois1 = "mars";
                    break;
                }
                case 4 :
                {
                    $mois1 = "avril";
                    break;
                }
                case 5 :
                {
                    $mois1 = "mai";
                    break;
                }
                case 6 :
                {
                    $mois1 = "juin";
                    break;
                }
                case 7 :
                {
                    $mois1 = "juillet";
                    break;
                }
                case 8 :
                {
                    $mois1 = "août";
                    break;
                }
                case 9 :
                {
                    $mois1 = "septembre";
                    break;
                }
                case 10 :
                {
                    $mois1 = "octobre";
                    break;
                }
                case 11 :
                {
                    $mois1 = "novembre";
                    break;
                }
                case 12 :
                {
                    $mois1 = "décembre";
                    break;
                }
            }
        include("vues/v_pdf.php");
        
        }
	}
?>