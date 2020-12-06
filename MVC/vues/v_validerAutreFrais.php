<!doctype html>
<html>
   <body>
   <p><h1>Validation de cet autre frais :</h1></p>
   </br>
   </br>
	<form action="index.php?uc=frais&ucf=valider&action=confirmValideAutreFrais&id=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post"> 
   		<p text-align="center"><b>Êtes-vous sur de vouloir valider et autre frais ? Une fois validé, cet autre frais ne pourra plus être modifié</b></p>
	   	
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>