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
        var_dump($action);
        $id = $_SESSION['typeprofil']
        if($id == "Visiteur")
        {
            var_dump($action);//ne rentre pas la
            $login = $_SESSION['valeur'];
	        $matricule = $pdo->getmatricule($login);
            $lesNotes = $pdo->getlesNotes($matricule); 
            include("vues/v_afficherNote.php");
        }
        if($id == "C")
        {
            var_dump($action);//ne rentre pas la
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


