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
            include("vues/v_validerFrais.php");
            break;
        }
case 'confirmValideFrais':
        {
            $id = $_REQUEST['id'];
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois'];  
            $pdo ->validerFrais( $matricule, $id,$annee,$mois);
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
            header('Location: index.php?uc=frais&ucf=afficherNotes');
            break;
        }
case 'validerNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois']; 
            include("vues/v_validerNote.php");
            break;

        }
case 'confirmValideNote':
        {
            $matricule = $_REQUEST['matricule'];
            $annee = $_REQUEST['annee'];
            $mois = $_REQUEST['mois']; 
            $pdo ->validerNote( $matricule,$annee,$mois);
            header('Location: index.php?uc=frais&ucf=afficherNotes');
            break;
        }


}
