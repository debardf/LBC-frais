<!doctype html>
<html>
   <body>
   <!-- 
	   permet  de générer un formulaire de suppression d'un justificatif
   -->
   <p><h1 id="partie">Supprimer la note :</h1></p><BR/>
    <form action="index.php?uc=frais&ucf=noteFrais&action=confirmSupprNote&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>" method="post">

        <table>
        <tbody>
            <input Type="hidden" name="matricule" value="<?php echo $matricule ?>">
            <input Type="hidden" name="annee" value="<?php echo $annee ?>">
            <input Type="hidden" name="mois" value="<?php echo $mois ?>">
            <tr><td>Voulez-vous supprimer cette note ? </td></tr>
        </tbody>
        </table>
        <input id="bouton" class="btn btn-secondary" type="submit" value="supprimer la note">
    </form>

    <form action="index.php?uc=frais&ucf=afficherNotes" method="post">
		<input id="bouton" class="btn btn-secondary" type="submit" value="retour">
	</form>

    </body>
</html>