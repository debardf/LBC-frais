<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de création d'une note de frais
   -->
   <body>
   <p><h1 id="partie">Nouvelle note :</h1></p>
	<form action="index.php?uc=frais&ucf=creerNote&action=confirmCreatNote" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="Fmatricule" value="<?php echo $matricule;?>">
			<tr><td>Année</td><td><input name="Fannee" size=20></td></tr>
            <tr><td>Mois</td><td><input name="Fmois" size=20></td></tr>
            <input type="hidden" name="Fstatut" value="NV">
            <input type="hidden" name="Fdatefiche" value=<?php echo $datefiche=date('Y-m-d');?>>
            <input type="hidden" name="Flien">
		</tbody>
		</table>
		<input class="boutonb" type="submit" value="Valider">
	</form>
 
    <form action="index.php?uc=frais&ucf=afficherNotes"method="post"> 
        <input class="boutonb" type="submit" value="retour">
    </form>
	
	</body>
</html>