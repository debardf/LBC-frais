<?php
    //recupère la valeur de action pour aiguiller le site vers le cas voulus
    $action=$_REQUEST['action'];
    switch($action)
	{
        //cas qui permet de générer un formulaire de création d'un autre forfait en lien avec une note spécifique
		case 'creationAutreForfait':
		{

            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
			include("vues/v_autreForfait.php");
            break;
            
        }
        //cas qui permet de confirmer la création d'un autre forfait dont les données sont spécifiées dans le formulaire du cas de création et de l'appliquer à la BDD
		case 'confirmCreatAutreForfait':
		{
            $matricule = $_REQUEST['Amatricule'];
            $annee = $_REQUEST['Aannee'];
            $mois = $_REQUEST['Amois'];
			$datefrais = $_REQUEST['Adate'];
            $libelle = $_REQUEST['Alibelle'];
            $montant = $_REQUEST['Amontant'];
            $validefrais = $_REQUEST['Avalide'];
            $id = $pdo->cumulId();
            $id = max($id);
            $id++;
			$pdo->creerAutreForfait($id, $matricule, $annee, $mois, $datefrais, $libelle, $montant, $validefrais);
			
			header("Location: index.php?uc=frais&ucf=detailNote&action=detNote&matricule=$matricule&annee=$annee&mois=$mois");
			break;
        }
        //cas qui permet de générer un formulaire de modification d'un autre forfait en lien avec une note spécifique
        case 'modifAutreForfait':
        {
            $idfrais = $_REQUEST['idfrais'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            $anneeO = $_REQUEST['annee'];
            $moisO = $_REQUEST['mois'];
            $unAutreForfait = $pdo->getAutreForfait($matricule,$annee,$mois,$idfrais);
            $datefrais = $unAutreForfait['datefrais'];
            $libelle = $unAutreForfait['libelle'];
            $montant = $unAutreForfait['montant'];
            $recupannee = $pdo->getAnnee($matricule);
            $recupmois = $pdo->getMois($matricule);
            include("vues/v_modifierAutreForfait.php");
            break;
        }
        //cas qui permet de confirmer la modification d'un autre forfait dont les données sont spécifiées dans le formulaire du cas de modification et de l'appliquer à la BDD
        case 'confirmModifAutreForfait':
        {
            $idfrais = $_REQUEST['idfrais'];
            $annee = $_REQUEST['anneeM'];
            $mois = $_REQUEST['moisM'];
            $montant = $_REQUEST['montantM'];
            $libelle = $_REQUEST['libelleM'];
            $matricule = $_REQUEST['matricule'];
            $datefrais = $_REQUEST['dateM'];
            $anneeO = $_REQUEST['annee'];
            $moisO = $_REQUEST['mois'];
            $pdo->modifAutreForfait($matricule,$anneeO,$moisO,$idfrais,$annee,$mois,$montant,$libelle,$datefrais);        
            header("Location: index.php?uc=frais&ucf=detailNote&action=detNote&matricule=$matricule&annee=$annee&mois=$mois");
            break;
        }
        //cas qui permet de générer un formulaire de suppression d'un autre forfait en lien avec une note spécifique
        case 'supprAutreForfait':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            $id = $_REQUEST['idfrais'];
            $unAutreForfait = $pdo->getAutreForfait($matricule,$annee,$mois,$id);
            $dateFrais = $unAutreForfait['datefrais'];
            $libelle = $unAutreForfait['libelle'];
            $montant = $unAutreForfait['montant'];
            include("vues/v_supprimerAutreForfait.php");
            break;
        }
        //cas qui permet de confirmer la suppression d'un autre forfait dont les données sont spécifiées dans le formulaire du cas de suppression et de l'appliquer à la BDD
        case 'confirmSupprAutreForfait':
        {
            $annee = $_REQUEST['annee'];
            $matricule = $_REQUEST['matricule'];
            $mois = $_REQUEST['mois'];
            $id = $_REQUEST['id'];
            $pdo->supprAutreForfait($matricule,$annee,$mois,$id);
            header("Location: index.php?uc=frais&ucf=detailNote&action=detNote&matricule=$matricule&annee=$annee&mois=$mois");
            break;
        }
	}
?>