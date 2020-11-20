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
        $id = $_SESSION['idClient'];
        var_dump($id);
        if($id == "Visiteur")
        {
            $login = $_SESSION['login'];
	        $matricule = $pdo->getmatricule($login);
            $lesNotes = $pdo->getlesNotes($matricule);
            include("vues/v_afficherNote.php");
        }
        if($_SESSION['idClient'] == 'Comptable')
        {
	        $lesNotes = getTouteslesNotes($matricule);
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


