<!doctype html>
<html>
   <body>
   <!-- 
	   permet  de générer un formulaire de création d'un forfait
   -->

   <p><h1 id="partie">Creation d'un forfait</h1></p>
	<form action="index.php?uc=frais&ucf=forfait&action=confirmCreatForfait" method="post">
   
		<table>
		<tbody>
			<input type="hidden" name="matricule" value="<?php echo $matricule;?>">
			<input type="hidden" name="annee" value="<?php echo $annee;?>">
			<input type="hidden" name="mois" value="<?php echo $mois;?>">
			<tr><td>Libellé :</td><td><select name="id" size="1" value="">
                                <?php
                                $ligne = $recuplibelle->fetch();
								while ($ligne)
									{
									if ($ligne["idforfait"] == 1) {
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
			<tr><td>Quantité : </td><td><input name="quantite" size=10></td></tr>
			<input type = "hidden" name="valideForfait" value=0>
		</tbody>
		</table>
		<input id="bouton" class="btn btn-secondary" type="submit" value="Valider">
	</form>
	
	<!-- ajouter les libelles des id pour la selection -->
	

	<form action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">
		<input type="hidden" name="matricule" value="<?php echo $matricule?>">
		<input type="hidden" name="annee" value="<?php echo $annee?>">
		<input type="hidden" name="mois" value="<?php echo $mois?>">
		<input id="bouton" class="btn btn-secondary" type="submit" value="retour">
	</form>

	</body>
</html>

