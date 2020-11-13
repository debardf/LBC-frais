<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirNotes' :
	{
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
?>

