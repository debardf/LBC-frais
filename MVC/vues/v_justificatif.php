<!doctype html>
<html>
   <body>
   <p><h1>Ajout d'un justificatif :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=creerJustificatif&action=confirmCreatJustificatif" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="matricule" value="<?php echo $matricule;?>">
			<input type="hidden" name="annee" value="<?php echo $annee;?>">
			<input type="hidden" name="mois" value="<?php echo $mois;?>">
			<tr><td>nom du pdf du justificatif (format "nom".pdf) : </td><td><input name="pdfjustificatif"  size=20></td></tr>	
			<input type = "hidden" name="Avalide" value=0>
            
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>