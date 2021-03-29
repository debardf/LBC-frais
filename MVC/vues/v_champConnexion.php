<?php 


if(!isset($_SESSION['idClient']))
{
	?>
<form id="champConnexion" text-align="right" class="champConnexion" action="index.php?uc=frais&ucf=connexion" method="post">
<input id="champ" type="text" name="identifiantConnexion" placeholder="Identifiant">

</br></br>

<input id="champ" type="password" name="mdpConnexion" placeholder="Mot de Passe">
</br>
</br>

<input id="champ" type="submit" name="Valider"></form>


<?php
}
else
{
	?>
		<li><a class="metadata" href="index.php?uc=frais&ucf=deconnexion"> Deconnexion </a></li>
<?php
}
?>
</br>
	



