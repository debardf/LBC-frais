<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirRecherches':
	{
		include("vues/v_recherches.php");
  		break;
	}
	case 'voirNote' :
	{
        include("vues/v_afficherNote.php");
        
		{

		}
  		
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

