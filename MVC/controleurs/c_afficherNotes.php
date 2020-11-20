<?php


if (!isset($_REQUEST['action']))
{
    $action = 'afficherNotes';
}
else 
{
    $action = $_REQUEST['action'];
}
var_dump($action);
switch($action)
{
	case 'afficherNotes' :
	{

        $id = $_SESSION['typeprofil'];
        if($id == "V")

        $id = $_SESSION['idClient'];
        if($id == "Visiteur")

        {
            $login = $_SESSION['valeur'];
            var_dump($login);
	        $matricule = $pdo->getmatricule($login);
            $lesNotes = $pdo->getlesNotes($matricule);
            include("vues/v_afficherNote.php");
        }
        if($id == "C")
        {
            $lesNotes = $pdo->getTouteslesNotes($matricule);
            include("vues/v_afficherNote.php");
        }
        
        /*
        $matricule = $pdo->getMatricule($login);
        $lesNotes = getlesNotes($matricule);
        */
  		
		break;
    }
    
    case 'detailNotes' :
        {
            include("vues/v_afficherNote.php");
            
            {
    
            }
              
            break;
        }

	case 'creerNote' :
	{

	}


}


