<!doctype html>
<html>
   <body>
   <!-- 
	   permet  de générer un formulaire de validation d'une note de frais
   -->

   <?php
   if ($peutValide == 1)
   {
      ?>
   <p><h1 id="partie">Validation de la note :</h1></p>

	<form action="index.php?uc=frais&ucf=valider&action=confirmValideNote&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post"> 
   		<p text-align="center"><b>Êtes-vous sur de vouloir cette note ? Une fois validé, cette note ne pourra plus être modifié</b></p>
		<input class="boutonb" type="submit" value="Valider">
	</form>

   <form action="index.php?uc=frais&ucf=afficherNotes"method="post">
      <input class="boutonb" type="submit" value="retour">
      </form>
      
 <?php
   }
   else
   {
   ?>

      <h1 id="partie">Validation impossible car tous les éléments de la fiche ne sont pas validés </h1>
      <form action="index.php?uc=frais&ucf=afficherNotes"method="post"> 
      <input class="boutonb" type="submit" value="retour">
      </form>
      <?php
   }
   ?>

	</body>
</html>