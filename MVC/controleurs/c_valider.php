<?php
    $action=$_REQUEST['action'];
    switch($action)
{
case 'validerFrais':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];  
			$pdo ->validerFrais( $matricule, $id,$annee,$mois);
            include("vues/v_validerFrais.php");
            break;

        }
case 'validerAutreFrais':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];  
            $pdo ->validerAutreFrais( $matricule, $id,$annee,$mois);
            include("vues/v_validerFrais.php");
            break;

        }
case 'validerNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];  
            $laNote = $pdo->getLaNote($matricule,$mois,$annee);
            $statut = $laNote['statut'];
            $datefiche = $laNote['datefiche'];
            $lienpdf = $laNote['lienpdf'];
            //$pdo ->validerNote( $matricule,$annee,$mois);
            include("vues/v_validerNote.php");
            break;

        }


}
