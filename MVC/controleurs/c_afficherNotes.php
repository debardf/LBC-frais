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
            $matricules= $pdo->getmatricule($login);
            $matricule = $matricules['matricule'];
            $lesNotes = $pdo->getlesNotes($matricule); 
            var_dump($lesNotes);
            include("vues/v_afficherNotes.php");
        }
        if($id == "C")
        {
            $lesNotes = $pdo->getTouteslesNotes();
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


