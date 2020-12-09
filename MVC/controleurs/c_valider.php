<?php
    $action=$_REQUEST['action'];
    switch($action)
{
case 'validerForfait':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois']; 
            $qte = $pdo->getLeforfait($matricule,$annee,$mois,$id)['quantite'];
            $libelle = $pdo->getUnLibelle($id);
            $libelle = $libelle["libelleforfait"];
            include("vues/v_validerForfait.php");
            break;
        }
case 'confirmValideForfait':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];  
            $pdo ->validerForfait($id, $matricule, $annee,$mois);

            $idcomptable = $_SESSION['valeur'];
            $present = $pdo->comptableDejaAssocieFiche($matricule, $annee, $mois, $idcomptable);
            $present = max($present);

            if ($present == 0)
            {
                $pdo->associerComptableFiche($matricule, $annee, $mois, $idcomptable);
            }

            header('Location: index.php?uc=frais&ucf=afficherNotes');
            break;
        }

case 'validerAutreFrais':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            include("vues/v_validerAutreFrais.php");
            break;
        }
case 'confirmValideAutreFrais':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois']; 
            $pdo ->validerAutreFrais($id, $matricule, $annee, $mois);

            $idcomptable = $_SESSION['valeur'];
            $present = $pdo->comptableDejaAssocieFiche($matricule, $annee, $mois, $idcomptable);
            $present = max($present);

            if ($present == 0)
            {
                $pdo->associerComptableFiche($matricule, $annee, $mois, $idcomptable);
            }

            header('Location: index.php?uc=frais&ucf=afficherNotes');
            break;
        }
case 'validerNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            
            $nbForfait = $pdo->compterForfaitFiche($matricule, $annee, $mois);
            $nbForfait = max($nbForfait);

            $nbForfaitV = $pdo->compterForfaitFicheValide($matricule, $annee, $mois);
            $nbForfaitV = max($nbForfaitV);

            $nbAutreForfait = $pdo->compterAutreForfaitFiche($matricule, $annee, $mois);
            $nbAutreForfait = max($nbAutreForfait);

            $nbAutreForfaitV = $pdo->compterAutreForfaitFicheValide($matricule, $annee, $mois);
            $nbAutreForfaitV = max($nbAutreForfaitV);

            if (($nbForfait == $nbForfaitV) && ($nbAutreForfait == $nbAutreForfaitV))
            {
                $peutValide = 1;
            }
            else
            {
                $peutValide = 0;
            }

            include("vues/v_validerNote.php");
            break;

        }
case 'confirmValideNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois']; 
            $pdo ->validerNote( $matricule,$annee,$mois);

            $idcomptable = $_SESSION['valeur'];
            $present = $pdo->comptableDejaAssocieFiche($matricule, $annee, $mois, $idcomptable);
            $present = max($present);

            if ($present == 0)
            {
                $pdo->associerComptableFiche($matricule, $annee, $mois, $idcomptable);
            }

            header('Location: index.php?uc=frais&ucf=afficherNotes');
            break;
        }


}
