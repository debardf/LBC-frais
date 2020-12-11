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
$_SESSION['valeur']=$leProfil['valeur'];

//Si le mdp et le nom d'utilisateur sont correctes alors on revoie vers index
if ($login=$_POST['identifiantConnexion'] && $mdp=$_POST['mdpConnexion'] )
{
	header('Location: index.php');

	if($leClient['typeprofil'] == 'C')
	{
		$_SESSION['idClient']="Comptable";
		$_SESSION['typeprofil']="typeprofil";
	}
	else if($leClient['typeprofil'] == 'V')
	{
	$_SESSION['idClient']="Visiteur";
	$_SESSION['typeprofil']="typeprofil";
	}
}
//Si un des champs est vide on redemande à l'utilisateur de saisir les informations
else {
	echo "Le nom d utilisateur et le mot de passe doivent être indiqués ";
}
	


?>
