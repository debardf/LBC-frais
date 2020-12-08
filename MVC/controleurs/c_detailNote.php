<?php

    if(!isset($_REQUEST['action']))
    $action = 'detNote';
    else
    $action = $_REQUEST['action'];
    $idProfil = $_SESSION['typeprofil'];	
    switch($action)
    {
        case 'detNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];
            $laNote = $pdo->getLaNote($matricule, $annee, $mois);
            $lesForfaits = $pdo->getLesForfaits($matricule, $annee, $mois);
            $lesFrais = $pdo->getLesFrais($matricule, $annee, $mois);
            $lesJustificatifs = $pdo->getLesJustificatifs($matricule, $annee, $mois);
            $cumulForfait = count($lesForfaits);
            $cumulFrais = count($lesFrais);
            $cumulJustif = count($lesJustificatifs);
            $lesSignatures = $pdo->getSignaturesByFiches($matricule, $annee, $mois);

			include("vues/v_detailNote.php");
            break;

        }

    }
?>

