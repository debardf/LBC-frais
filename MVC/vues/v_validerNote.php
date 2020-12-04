<!doctype html>
<html>
	<?php 
		$matricule= $_REQUEST['matricule'];
        $annee= $_REQUEST['annee'];
        $mois= $_REQUEST['mois'];
	?> 
   <body>
   <p><h1>Validation de la note :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=afficherNotes&action=afficherNotes&matricule=<?php echo $matricule ?>&annee=<?php echo $annee ?>&mois=<?php echo $mois ?> " method="post"> 
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>