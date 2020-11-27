<?php
    if(!isset($_REQUEST['action']))
    $action = 'creationAutreForfait';
    else
    $action = $_REQUEST['action'];
	switch($action)
	{
		case 'creationAutreForfait':
		{
            $id = $_SESSION['typeprofil'];
        	if($id == "V")
        	{
            $login = $_SESSION['valeur'];
            $leMatricule = $pdo->getMatricule($login);
            $recupannee = $pdo->getAnnee();
            $recupmois = $pdo->getMois();
			include("vues/v_autreForfait.php");
            }
            else
			{
				include("vues/v_accueil.php");
			}
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