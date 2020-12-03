<!doctype html>
<html>
   <body>
   <p><h1>Supprimer le forfait :</h1></p><BR/>
    <form action="index.php?uc=confirmSupprFrais&action=confirmFraisCLient&id<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>" method="post">

        <table>
        <tbody>
            <input Type="hidden" name="idForfait" value="<?php echo $id ?>">
            <input Type="hidden" name="matricule" value="<?php echo $matricule ?>">
            <tr><td>libelle du Forfait </td><td><input name="libelleForfait" value="<?php echo $libelle?>" size=20 readonly></td></tr>
            <tr><td>Année</td><td><input name="annee" value="<?php echo $annee ?>" size=5 readonly></td></tr>
            <tr><td>quantitée</td><td><input name="mois" value="<?php echo $mois ?>"size=5 readonly></td></tr>
        </tbody>
        </table>
        <br/>
        <input type="submit" value="supprimer le forfait">
    </form>
 

    </body>
</html>