<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de modification d'un forfait
   -->
	
   <body>
   <p><h1 id="partie">Modification Forfait :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=forfait&action=confirmModifForfait&idforfait=<?php echo $idO?>&matricule=<?php echo $matricule?>" method="post">
   	
	   	<table>
		<tbody>
			<input type="hidden" name="annee" value="<?php echo $annee ;?>"/>
			<input type="hidden" name="mois" value="<?php echo $mois ;?>"/>
			<tr><td>Libellé :</td><td><select name="id" size="1" value="<?php echo $id ?>">
                                <?php
                                $ligne = $recuplibelle->fetch();
								while ($ligne)
									{
									if ($ligne["idforfait"] == $id) {
									echo '<OPTION selected value = "' . $ligne["idforfait"] . '">' . $ligne["idforfait"] . ' ' . $ligne["libelleforfait"] . '</OPTION>'; 
									$ligne = $recuplibelle->fetch();
									}
									else 
									{
									echo '<OPTION value = "' . $ligne["idforfait"] . '">' . $ligne["idforfait"] . ' ' . $ligne["libelleforfait"] . '</OPTION>';
									$ligne = $recuplibelle->fetch();
									}
								}
                                ?>
                            </select></tr></td>
			<tr><td>Quantité : </td><td><input name="quantite" value="<?php echo $qte ?>" size=20></td></tr>
			<input type="hidden" name="matricule" value="<?php echo $matricule ;?>"/>
		</tbody>
		</table>
		<input class="boutonb" type="submit" value="Valider">
	</form>
 
	<form action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">
		<input type="hidden" name="matricule" value="<?php echo $matricule?>">
		<input type="hidden" name="annee" value="<?php echo $annee?>">
		<input type="hidden" name="mois" value="<?php echo $mois?>">
		<input class="boutonb" type="submit" value="retour">
	</form>

	</body>
</html>