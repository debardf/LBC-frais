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

            include("vues/v_afficherNotes.php");
        }
        else if($id == "C")
        {
            $lesNotes = $pdo->getTouteslesNotes();


            include("vues/v_afficherNotes.php");
        }
		break;
    }
    


}


