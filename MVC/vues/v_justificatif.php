<!doctype html>
<html>
   <body>
   <p><h1>Création d'un autre forfait :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=autreForfait&action=confirmCreatAutreForfait" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="Amatricule" value="<?php echo $matricule;?>">
			<input type="hidden" name="Aannee" value="<?php echo $annee;?>">
			<input type="hidden" name="Amois" value="<?php echo $mois;?>">
			<tr><td>libelle : </td><td><input name="Alibelle" size=20></td></tr>	
            <tr><td>Date : </td><td><input type="date" name="Adate" size=20></td></tr>
			<tr><td>montant : </td><td><input name="Amontant" size=10></td></tr>
			<input type = "hidden" name="Avalide" value=0>
            
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>