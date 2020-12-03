<?php
    if(!isset($_REQUEST['action']))
    $action = 'creationAutreForfait';
    else
    $action = $_REQUEST['action'];
	switch($action)
	{
		case 'creationAutreForfait':
		{

            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
			include("vues/v_autreForfait.php");
            break;
            
		}
		case 'confirmCreatAutreForfait':
		{
            $matricule = $_REQUEST['Amatricule'];
            $annee = $_REQUEST['Aannee'];
            $mois = $_REQUEST['Amois'];
			$datefrais = $_REQUEST['Adate'];
            $libelle = $_REQUEST['Alibelle'];
            $montant = $_REQUEST['Amontant'];
            $validefrais = $_REQUEST['Avalide'];
			$pdo->creerAutreForfait($matricule, $annee, $mois, $datefrais, $libelle, $montant, $validefrais);
			
			header('Location: v_detailNote.php');	
			
		}
	}
?>