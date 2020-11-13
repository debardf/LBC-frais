<?php

$action = ['affichernote'];
switch($action)
{
	case 'voirNotes' :
	{
        if($_SESSION['idClient'] == "Visiteur")
        {
	        $matricule = getmatricule($login);
            $lesNotes = getlesNotes($matricule);
        }
        if($_SESSION['idClient'] == 'Comptable')
        {
	        $lesNotes = getTouteslesNotes($matricule);
        }

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

	include("vues/v_detailNote.php");	
?>

