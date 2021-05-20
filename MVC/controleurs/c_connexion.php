<?php

if(isset($_SESSION['identifiantConnexion']) && isset($_SESSION['mdpConnexion']))
{
	$login="";
	$mdp="";
}
else
{
	$login=$_POST['identifiantConnexion'];
	$mdp=$_POST['mdpConnexion'];
}


$leProfil=$pdo->getInformationsConnexion($login,$mdp);


if ($leProfil!=false)
{
	$_SESSION['idClient']=$leProfil['login'];
	$_SESSION['nom']=$leProfil['nom'];
	$_SESSION['prenom']=$leProfil['prenom'];
	$_SESSION['typeprofil']=$leProfil['typeprofil'];
	$_SESSION['valeur']=$leProfil['valeur'];
			if($leProfil['typeprofil'] == 'C')
		{
		$_SESSION['idClient']="Comptable";
		
		}
			else if($leProfil['typeprofil'] == 'V')
		{
			$_SESSION['idClient']="Visiteur";
			
		}
	header('location: index.php?uc=frais');	
}
else
{
header('location: index.php?uc=frais?ucf=connexion');
}

// //Si un des champs est vide on redemande à l'utilisateur de saisir les informations
// else {
// 	echo "Le nom d utilisateur et le mot de passe doivent être indiqués ";
// }
	




?>
