<!doctype html>
<html>
   <body>
   <!-- 
	   permet  de générer un formulaire de validation d'un autre forfait
   -->
   <p><h1 id="partie">Validation de cet autre frais :</h1></p>
	<form action="index.php?uc=frais&ucf=valider&action=confirmValideAutreFrais&id=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post"> 
   		<p text-align="center"><b>Êtes-vous sur de vouloir valider et autre frais ? Une fois validé, cet autre frais ne pourra plus être modifié</b></p>
            <table>
            <tr><td>libelle du frais</td><td><input name="libelleAutreForfait" value="<?php echo $libelle?>" size=10 readonly></td></tr>
            <tr><td>montant</td><td><input name="montant" value="<?php echo $montant ?>" size=10 readonly></td></tr>
            <tr><td>Date du frais</td><td><input name="dateFrais" value="<?php echo $dateFrais ?>"size=10 readonly></td></tr>
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