<!doctype html>
<html>
   <body>
   <p><h1>Validation de la note :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=afficherNotes&action=afficherNotes&matricule=<?php echo $matricule ?>&annee=<?php echo $annee ?>&mois=<?php echo $mois ?> " method="post"> 
        <br/>
        <table>
        	<tr class="affichageNote">
        <th width=10>matricule</th>
        <th width=10>annee</th>
		<th width=10>mois</th>
		<th width=10>statut</th>
		<th width=10>datefiche</th>
		<th width=10>lienpdf</th>
				</tr>



<tr>

				<td><?php echo $matricule ?></td>
				<td><?php echo $annee ?></td>
				<td><?php echo $mois ?></td>
				<td><?php echo $statut ?></td>
				<td><?php echo $datefiche ?></td>
				<td><?php echo $lienpdf ?></td>
				</tr>
				</table>
			</br>
		
<?php
if ($statut=="V"){
	echo "La note à déjà été validée";
	?>
	<input type="submit" value="Retourner aux notes">
	<?php
}
else {
?>
	<input type="submit" value="Valider">
<?php
}
?>	
	</form>
 
	
	</body>
</html>