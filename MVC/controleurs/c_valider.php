<?php
    $action=$_REQUEST['action'];
    switch($action)
    {
    //permet de générer un formulaire de validation d'un forfait avec un récapitulatif du forfait que l'on valide
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
        //permet de confirmer la validaton d'un forfait
        case 'confirmValideForfait':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];  
            $pdo ->validerForfait($id, $matricule, $annee,$mois);

            $idcomptable = $_SESSION['valeur'];
            //permet de savoir si un comptable est associé à une fiche
            $present = $pdo->comptableDejaAssocieFiche($matricule, $annee, $mois, $idcomptable);
            $present = max($present);

            if ($present == 0)
            {
                //permet d'associer automatiquement un comptable à une fiche lorsqu'il valide toute ou partie d'une fiche et qu'il n'est pas déja associé à une fiche
                $pdo->associerComptableFiche($matricule, $annee, $mois, $idcomptable);
            }

            $valeurs = array("matricule" => $matricule, "annee" => $annee, "mois" => $mois);
            redirect('index.php?uc=frais&ucf=detailNote&action=detNote', $valeurs);
            break;
        }
        //permet de générer un formulaire de validation d'un autre forfait avec un récapitulatif d'un autre forfait que l'on valide
        case 'validerAutreFrais':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            $libelle=$pdo->getAutreForfait($matricule,$annee,$mois,$id)["libelle"];
            $montant=$pdo->getAutreForfait($matricule,$annee,$mois,$id)["montant"];
            $dateFrais=$pdo->getAutreForfait($matricule,$annee,$mois,$id)["datefrais"];
            include("vues/v_validerAutreFrais.php");
            break;
        }
        //permet de confirmer la validaton d'un autre forfait
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

            $valeurs = array("matricule" => $matricule, "annee" => $annee, "mois" => $mois);
            redirect('index.php?uc=frais&ucf=detailNote&action=detNote', $valeurs);
            break;
        }
        //permet de générer un formulaire de validation d'une note
        case 'validerNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            //compte  le nombre de forfait pour une fiche
            $nbForfait = $pdo->compterForfaitFiche($matricule, $annee, $mois);
            $nbForfait = max($nbForfait);
            //compte le nombre de forfait validé pour une fiche
            $nbForfaitV = $pdo->compterForfaitFicheValide($matricule, $annee, $mois);
            $nbForfaitV = max($nbForfaitV);
            //compte  le nombre des autres forfaits pour une fiche
            $nbAutreForfait = $pdo->compterAutreForfaitFiche($matricule, $annee, $mois);
            $nbAutreForfait = max($nbAutreForfait);
            //compte le nombre de forfait validé pour une fiche
            $nbAutreForfaitV = $pdo->compterAutreForfaitFicheValide($matricule, $annee, $mois);
            $nbAutreForfaitV = max($nbAutreForfaitV);
            //calcul la différence des forfaits et des forfaits validés pour déterminer si la note peut être validé, fait la même opération pour les autres forfaits
            if (($nbForfait == $nbForfaitV) && ($nbAutreForfait == $nbAutreForfaitV))
            {
                //si $peutValide = 1, on peut valider la note de frais
                $peutValide = 1;
            }
            else
            {
                //sinon affiche un message pour expliquer pourquoi la page ne peut être validé
                $peutValide = 0;
            }

            include("vues/v_validerNote.php");
            break;

        }
        //page qui permet de valider la note de frais
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
