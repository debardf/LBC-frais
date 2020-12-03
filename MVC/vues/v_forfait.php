<!doctype html>
<html>
   <body>
   <p><h1>Creation d'un forfait</h1></p></BR>
	<form action="c_frais.php?ucf=creerForfait&action=confirmCreatForfait" method="post">
   
		<table>
		<tbody>
			<input type="hidden" name="matricule" value="<?php echo $matricule;?>">
			<input type="hidden" name="annee" value="<?php echo $annee;?>">
			<input type="hidden" name="mois" value="<?php echo $mois;?>">
			<tr><td>libellé : </td><td><input name="id" size=30></td></tr>
			<tr><td>Quantité : </td><td><input name="quantite" size=10></td></tr>
			<input type = "hidden" name="valideForfait" value=0>
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
<?php
//ajouter les libelles des id pour la selection
?>
	
	</body>
</html>

