<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirNote' :
	{
        $lesNotes = getlesNotes($matricule);

        include("vues/v_afficherNote.php");
  		
		break;
    }
    
    case 'modifierNote' :
        {
            include("vues/v_afficherNote.php");
            
            {
    
            }
              
            break;
        }

	case 'creerNote' :
	{

	}

	case 'supprimerNote' :
	{
		include("vues/v_salles.php");
		break;
	}

}
?>

