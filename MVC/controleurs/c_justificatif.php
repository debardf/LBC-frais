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
        case'generepdf' :
        {
            
        }
	}
?>