<!doctype html>
<html>
   <body>
   <!-- 
	   permet  de générer un formulaire de suppression d'un forfait
   -->
   <p><h1 id="partie">Supprimer le forfait :</h1></p><BR/>
    <form action="index.php?uc=frais&ucf=forfait&action=confirmSupprForfait&id=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>" method="post">

        <table>
        <tbody>
            <input Type="hidden" name="idForfait" value="<?php echo $id ?>">
            <input Type="hidden" name="matricule" value="<?php echo $matricule ?>">
            <tr><td>libelle du Forfait </td><td><input name="libelleForfait" value="<?php echo $libelle?>" size=20 readonly></td></tr>
            <tr><td>Année</td><td><input name="annee" value="<?php echo $annee ?>" size=5 readonly></td></tr>
            <tr><td>Mois</td><td><input name="mois" value="<?php echo $mois ?>" size=5 readonly></td></tr>
            <tr><td>quantitée</td><td><input name="qte" value="<?php echo $qte ?>"size=5 readonly></td></tr>
        </tbody>
        </table>
        <input id="bouton" class="btn btn-secondary" type="submit" value="supprimer le forfait">
    </form>
 
    <form action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">
		<input type="hidden" name="matricule" value="<?php echo $matricule?>">
		<input type="hidden" name="annee" value="<?php echo $annee?>">
		<input type="hidden" name="mois" value="<?php echo $mois?>">
		<input id="bouton" class="btn btn-secondary" type="submit" value="retour">
	</form>
      
    </body>
</html>