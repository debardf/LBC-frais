<?php


if (!isset($_REQUEST['action']))
{
    $action = 'afficherNotes';
}
else 
{
    $action = $_REQUEST['action'];
}
switch($action)
{
	case 'afficherNotes' :
	{

        $id = $_SESSION['typeprofil'];
        if($id == "V")
        {
            
            $login = $_SESSION['valeur'];
	        $matricule = $pdo->getmatricule($login);
            $lesNotes = $pdo->getlesNotes($matricule); 
            include("vues/v_afficherNotes.php");
        }
        if($id == "C")
        {
            
            $lesNotes = $pdo->getTouteslesNotes($matricule);
            include("vues/v_afficherNotes.php");
        }
        
        /*
        $matricule = $pdo->getMatricule($login);
        $lesNotes = getlesNotes($matricule);
        */
  		
		break;
    }
    
    case 'detailNotes' :
        {
            include("vues/v_afficherNotes.php");
            
            {
    
            }
              
            break;
        }

	case 'creerNote' :
	{

	}


}


