<?php

//si action n'as aucune valeur, envoi directement dans le cas d'affichage des notes
if (!isset($_REQUEST['action']))
{
    $action = 'afficherNotes';
}
//sinon action récupère celle qui lui à été transmis le 
else
{
    $action = $_REQUEST['action'];
}
switch($action)
{
    //controlleur qui permet la génération d'un tableau récapitulatif des notes de frais
	case 'afficherNotes' :
	{
        //recupère la session de l'utilisateur
        if (isset($_SESSION['idClient'])){
            $id = $_SESSION['typeprofil'];
        
 
        //si l'utilisateur est un visiteur affiche les notes de frais qui luis sont associées
            if($id == "V")
                {
                $login = $_SESSION['valeur'];
                $matricules= $pdo->getmatricule($login);
                $matricule = $matricules['matricule'];
                $lesNotes = $pdo->getlesNotes($matricule); 

                include("vues/v_afficherNotes.php");
            }
            //si l'utilisateur est un comptable, toutes les notes de frais sont affichées
            else if($id == "C")
            {
                $lesNotes = $pdo->getTouteslesNotes();


                include("vues/v_afficherNotes.php");
            }
        }
		break;
    }
    


}


