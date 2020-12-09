<!doctype html>
<html>
   <body>
   <p><h1>Validation du frais :</h1></p>
   </br>
   </br>
	<form action="index.php?uc=frais&ucf=valider&action=confirmValideForfait&id=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post"> 
   		<p text-align="center"><b>Êtes-vous sur de vouloir valider le forfait ? Une fois validé, le forfait ne pourra plus être modifié</b></p>
	   	
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>