<!doctype html>
<html>
	<?php

		$matriculeM = $leForfait['matricule'];
		$anneeM = $leForfait['annee'];
		$moisM = $leForfait['mois'];
        $idM = $leForfait['idforfait'];
        $montantM = $leForfait['montant'];
        $qteM = $leForfait['quantite'];

	?>
	
	
   <body>
   <p><h1>Modification Frais :</h1></p><BR/>
	<form action="index.php?uc=modifierClient&action=confirmModifCLient" method="post">
   
		<table>
		<tbody>
            <tr><td>Année : </td><td><select name="anneeM" size="1"value="">
                                <?php   
                                $ligne = $recupannee->fetch();
								while ($ligne)
									{
									if ($ligne["annee"] == 1) {
									echo '<OPTION selected value = "' . $ligne["annee"] . '">' . $ligne["annee"] . '</OPTION>'; 
									$ligne = $recupannee->fetch();
									}
									else 
									{
									echo '<OPTION value = "' . $ligne["annee"] . '">' . $ligne["annee"] . '</OPTION>';
									$ligne = $recupannee->fetch();
									}
								}
                                ?>
                            </select></td></tr>
            <tr><td>Mois : </td><td><select name="moisM" size="1"value="">
                                <?php
                                $ligne = $recupmois->fetch();
								while ($ligne)
									{
									if ($ligne["mois"] == 1) {
									echo '<OPTION selected value = "' . $ligne["mois"] . '">' . $ligne["mois"] . '</OPTION>'; 
									$ligne = $recupmois->fetch();
									}
									else 
									{
									echo '<OPTION value = "' . $ligne["mois"] . '">' . $ligne["mois"] . '</OPTION>';
									$ligne = $recupmois->fetch();
									}
								}
                                ?>
                            </select></td></tr>
			<tr><td>Libellé :</td><td><select name="idforfait" size="1" value="<?php echo $idM ?>">
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
                            </select>
                            </tr></td>
			<tr><td>Montant : </td><td><input name="Montant" value="<?php echo $montantM ?>"size=5></td></tr>
			<tr><td>Quantité : </td><td><input name="quantite" value="<?php echo $qteM ?>" size=20></td></tr>
			<input type="hidden" name="matricule" value="<?php echo $matriculeM ;?>"/>
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>