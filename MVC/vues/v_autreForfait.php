<!doctype html>
<html>
   <body>
   <!-- 
	   permet  de générer un formulaire de création d'un autre forfait
   -->
	</br>
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
		<input class="boutonb" type="submit" value="Valider">
	</form>

	<form action="index.php?uc=frais&ucf=detailNote&action=detNote&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post"> 
      <br/>
      <input class="boutonb" type="submit" value="retour">
      </form>
 
	
	</body>
</html>