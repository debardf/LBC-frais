<?php
    if(!isset($_REQUEST['action']))
    $action = 'detNote';
    else
    $action = $_REQUEST['action'];
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
			include("vues/v_detailNote.php");
            break;

        }

    }
?>