<?php

$action = $_REQUEST['ucf'];
switch($action)
{
	case 'afficherNotes' :
	{
        /*
        if($_SESSION['idClient'] == "Visiteur")
        {
	        $matricule = getmatricule($login);
            $lesNotes = getlesNotes($matricule);
        }
        if($_SESSION['idClient'] == 'Comptable')
        {
	        $lesNotes = getTouteslesNotes($matricule);
        }
*/
            $matricule = getmatricule($login);
            $lesNotes = getlesNotes($matricule);
        include("vues/v_afficherNote.php");
  		
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


