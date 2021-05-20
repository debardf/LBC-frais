<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de modification d'un autre forfait
   -->
	
   <body>
   <p><h1 id="partie">Modification autre forfait :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=autreForfait&action=confirmModifAutreForfait&idfrais=<?php echo $idfrais;?>&matricule=<?php echo $matricule?>" method="post">
   	
	   	<table>
		<tbody>
		<input type="hidden" name="idfrais" value="<?php echo $idfrais?>"/>
		<input type="hidden" name="annee" value="<?php echo $annee?>"/>
		<input type="hidden" name="mois" value="<?php echo $mois?>"/>
			<tr><td>Libellé :</td><td><input name="libelleM" size="20" value="<?php echo $libelle ?>"></tr></td>
			<tr><td>Montant : </td><td><input name="montantM" value="<?php echo $montant ?>" size=20></td></tr>
			<tr><td>Date : </td><td><input type="date" name="dateM" size=20 value="<?php echo $datefrais?>"></td></tr>
			<input type="hidden" name="matricule" value="<?php echo $matricule ;?>"/>
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