<!doctype html>
<html>
   <body>
   <p><h1>Validation du frais :</h1></p>
   </br>
   </br>
	<form action="index.php?uc=frais&ucf=valider&action=confirmValideForfait&id=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post"> 
   		<p text-align="center"><b>Êtes-vous sur de vouloir valider le forfait ? Une fois validé, le forfait ne pourra plus être modifié</b></p>
         <table>
         <tr><td>libelle du Forfait </td><td><input name="libelleForfait" value="<?php echo $libelle?>" size=5 readonly></td></tr>
            <tr><td>Année</td><td><input name="annee" value="<?php echo $annee ?>" size=5 readonly></td></tr>
            <tr><td>Mois</td><td><input name="mois" value="<?php echo $mois ?>" size=5 readonly></td></tr>
            <tr><td>quantitée</td><td><input name="qte" value="<?php echo $qte ?>"size=5 readonly></td></tr>
         </table>
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>