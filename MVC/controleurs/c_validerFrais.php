<?php
    $action=$_REQUEST['action'];
    switch($action)
{
case 'validerFraisF':
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

}
