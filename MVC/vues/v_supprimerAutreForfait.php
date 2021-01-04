<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de suppression d'un autre forfait
   -->
   <body>
   <p><h1 id="partie">Supprimer un autre forfait</h1></p><BR/>
    <form action="index.php?uc=frais&ucf=autreForfait&action=confirmSupprAutreForfait&id=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>"method="post">

        <table>
        <tbody>
            <input Type="hidden" name="idForfait" value="<?php echo $id ?>">
            <input Type="hidden" name="matricule" value="<?php echo $matricule ?>">
            <input Type="hidden" name="annee" value="<?php echo $annee ?>">
            <input Type="hidden" name="mois" value="<?php echo $mois ?>">
            <tr><td>libelle du frais</td><td><input name="libelleAutreForfait" value="<?php echo $libelle?>" size=20 readonly></td></tr>
            <tr><td>montant</td><td><input name="montant" value="<?php echo $montant ?>" size=5 readonly></td></tr>
            <tr><td>Date du frais</td><td><input name="dateFrais" value="<?php echo $dateFrais ?>"size=10 readonly></td></tr>
        </tbody>
        </table>
        <input class="boutonb" type="submit" value="supprimer le frais">
    </form>
 
    <form action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">
		<input type="hidden" name="matricule" value="<?php echo $matricule?>">
		<input type="hidden" name="annee" value="<?php echo $annee?>">
		<input type="hidden" name="mois" value="<?php echo $mois?>">
		<input class="boutonb" type="submit" value="retour">
	</form>

    </body>
</html>