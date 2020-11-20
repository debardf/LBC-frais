<div class="user">
	<p class="metadata">Bonjour <?php echo $_SESSION['prenom']," ",$_SESSION['nom']?> statut: <?php echo $_SESSION['typeprofil'], " valeur: ",$_SESSION['valeur'] ?></p>
		<a class="metadata" href="index.php?uc=frais&ucf=deconnexion"> Deconnexion </a>
	<a class="metadata" href="index.php?uc=frais&ucf=detailNote"> Voir detail note </a>
</div>
