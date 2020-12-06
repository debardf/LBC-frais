<!doctype html>
<html>
   <body>
   <p><h1>Supprimer le justificatif :</h1></p><BR/>
    <form action="index.php?uc=frais&ucf=supprimerJustificatif&action=confirmSupprJustificatif&idjustificatif=<?php echo $idjustificatif;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>" method="post">

        <table>
        <tbody>
            <input Type="hidden" name="idForfait" value="<?php echo $idjustificatif ?>">
            <input Type="hidden" name="matricule" value="<?php echo $matricule ?>">
            <input Type="hidden" name="annee" value="<?php echo $annee ?>">
            <input Type="hidden" name="mois" value="<?php echo $mois ?>">
            <tr><td>nom du justificatif </td><td><input name="pdfjustificatif" value="<?php echo $pdfjustificatif?>" size=20 readonly></td></tr>
        </tbody>
        </table>
        <br/>
        <input type="submit" value="supprimer le justificatif">
    </form>
    </body>
</html>