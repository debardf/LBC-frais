<?php

    if(!isset($_REQUEST['action']))
    $action = 'detNote';
    else
    $action = $_REQUEST['action'];
    $idProfil = $_SESSION['typeprofil'];
    //controlleur qui permet l'affichage d'une note précise en fonction de l'année, du mois et du matricule du visiteur
    //le détail comprend : les forfaits, autres forfaits, justificatifs, et des signatures comptables associées.
    switch($action)
    {
        case 'detNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            //recupération des forfaits associés à la fiche
            $lesForfaits = $pdo->getLesForfaits($matricule, $annee, $mois);
            //récupération des autres forfaits associés à la fiche
            $lesFrais = $pdo->getLesFrais($matricule, $annee, $mois);
            //récupération des justificatifs associés à la fiche
            $lesJustificatifs = $pdo->getLesJustificatifs($matricule, $annee, $mois);
            $cumulForfait = count($lesForfaits);
            $cumulFrais = count($lesFrais);
            $cumulJustif = count($lesJustificatifs);
            //recupération des signatures
            $lesSignatures = $pdo->getSignaturesByFiches($matricule, $annee, $mois);
            //recupération du statut de la fiche pour savoir si elle est validé où non
            $statut = $pdo->getLaNote($matricule, $mois, $annee)['statut'];

			include("vues/v_detailNote.php");
            break;

        }

    }
?>

