<?php
    $action=$_REQUEST['action'];
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
            $id = $pdo->cumulId();
            $id = max($id);
            $id++;
			$pdo->creerAutreForfait($id, $matricule, $annee, $mois, $datefrais, $libelle, $montant, $validefrais);
			
			header('Location: index.php?uc=frais&ucf=afficherNotes');	
			
        }
        
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
                
                header('Location: index.php?uc=frais&ucf=afficherNotes');
                break;
            }

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
                case 'confirmSupprAutreForfait':
                {
                    $annee = $_REQUEST['annee'];
                    $matricule = $_REQUEST['matricule'];
                    $mois = $_REQUEST['mois'];
                    $id = $_REQUEST['id'];
                    $pdo->supprAutreForfait($matricule,$annee,$mois,$id);
                    header('Location: index.php?uc=frais&ucf=afficherNotes');
                }
	}
?>