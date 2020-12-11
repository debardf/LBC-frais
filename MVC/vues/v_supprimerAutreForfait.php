<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de suppression d'un autre forfait
   -->
   <body>
   <p><h1>Supprimer un autre forfait</h1></p><BR/>
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
        <br/>
        <input type="submit" value="supprimer le frais">
    </form>
 

    </body>
</html>