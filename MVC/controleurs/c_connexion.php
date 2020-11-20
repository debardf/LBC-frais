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
$_SESSION['typeprofil']=$leProfil['typeprofil'];
$_SESSION['valeur']=$leProfil['idValeur'];

header('Location: index.php?uc=frais');	

if($leClient['typeprofil'] == 'C')
{
	$_SESSION['idClient']="Comptable";
	$_SESSION['typeprofil']="typeprofil";
}
if($leClient['typeprofil'] == 'V')
{
	$_SESSION['idClient']="Visiteur";
	$_SESSION['typeprofil']="typeprofil";
}


?>
