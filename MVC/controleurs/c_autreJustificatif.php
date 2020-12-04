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
            $pdfjustificatif = $_REQUEST['pdfjustificatif'];
			include("vues/v_autreJustificatif.php");
            break;
            
		}
		case 'confirmCreatJustificatif':
		{
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
			$pdfjustificatif = $_REQUEST['pdfjustificatif'];
            $id = $pdo->countId();
            $id = max($id);
            $id++;
			$pdo->creerJustificatif($id, $matricule, $annee, $mois, $pdfjustificatif);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');	
			
		}
	}
?>