<?php
    if(!isset($_REQUEST['action']))
    $action = 'creationAutreForfait';
    else
    $action = $_REQUEST['action'];
	switch($action)
	{
		case 'creationJustificatif':
		{

            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
			include("vues/v_justificatif.php");
            break;
            
		}
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
        case 'confirmSupprJustificatif':
            {
                $annee = $_REQUEST['annee'];
                $matricule = $_REQUEST['matricule'];
                $mois = $_REQUEST['mois'];
                $idjustificatif = $_REQUEST['idjustificatif'];
                $pdo->supprJustificatif($matricule,$annee,$mois,$idjustificatif);
                header('Location: index.php?uc=frais&ucf=afficherNotes');
            }
        case'generepdf' :
        {
            
        }
	}
?>