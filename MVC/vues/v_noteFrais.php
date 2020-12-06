<!doctype html>
<html>
   <body>
   </br>
   <p><h1>Nouvelle note :</h1></p></br>
	<form action="index.php?uc=frais&ucf=creerNote&action=confirmCreatNote" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="Fmatricule" value="<?php echo $matricule;?>">
			<tr><td>Année</td><td><input name="Fannee" size=20></td></tr>
            <tr><td>Mois</td><td><input name="Fmois" size=20></td></tr>
            <input type="hidden" name="Fstatut" value="NV">
            <input type="hidden" name="Fdatefiche" value=<?php echo $datefiche=date('Y-m-d');?>>
            <input type="hidden" name="Flien" value="pas de lien">
		</tbody>
		</table>
        </br>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>