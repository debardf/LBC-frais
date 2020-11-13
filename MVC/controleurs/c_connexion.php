<?php

if(empty($_POST['identifiantConnexion']))
{
	$login=NULL;
}
else
{
	$login=$_POST['identifiantConnexion'];
}

if(empty($_POST['mdpConnexion']))
{
	$mdp=NULL;
}
else
{
	$mdp=$_POST['mdpConnexion'];
}

$leProfil=$pdo->getInformationsConnexion($login,$mdp);

$_SESSION['idClient']=$leProfil['login'];
$_SESSION['nom']=$leProfil['nom'];
$_SESSION['prenom']=$leProfil['prenom'];


header('Location: index.php?uc=frais');	
/*
if($leClient['ADMIN'] == 'O')
{
	$_SESSION['idClient']="Administrateur";
	$_SESSION['nomClient']=NULL;
	$_SESSION['prenomClient']="Administrateur";
}
*/


?>
