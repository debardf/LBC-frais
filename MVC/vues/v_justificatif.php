<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de création d'un justificatif
   -->
   <body>
   <p><h1 id="partie">Ajout d'un justificatif :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=justificatifs&action=confirmCreatJustificatif" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="matricule" value="<?php echo $matricule;?>">
			<input type="hidden" name="annee" value="<?php echo $annee;?>">
			<input type="hidden" name="mois" value="<?php echo $mois;?>">
			<tr><td><input type="file" name="pdfjustificatif" accept="image/*,.pdf" ></td></tr>	
			<input type = "hidden" name="Avalide" value=0>
            
		</tbody>
		</table>
		<input id="bouton" class="btn btn-secondary" type="submit" value="Valider">
	</form>
 
	<form action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">
		<input type="hidden" name="matricule" value="<?php echo $matricule?>">
		<input type="hidden" name="annee" value="<?php echo $annee?>">
		<input type="hidden" name="mois" value="<?php echo $mois?>">
		<input id="bouton" class="btn btn-secondary" type="submit" value="retour">
	</form>
	
	</body>
</html>