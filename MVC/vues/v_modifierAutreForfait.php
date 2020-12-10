<!doctype html>
<html>
<!-- 
	   permet  de générer un formulaire de modification d'un autre forfait
   -->
	
   <body>
   <p><h1>Modification autre forfait :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=autreForfait&action=confirmModifAutreForfait&idfrais=<?php echo $idfrais;?>&matricule=<?php echo $matricule?>&annee=<?php echo $anneeO?>&mois=<?php echo $moisO?>" method="post">
   	
	   	<table>
		<tbody>
		<input type="hidden" name="idfrais" value="<?php echo $idfrais ;?>"/>
            <tr><td>Année : </td><td><select name="anneeM" size="1"value="<?php echo $annee ?>">
                                <?php   
                                $ligne = $recupannee->fetch();
								while ($ligne)
									{
									if ($ligne["annee"] == $annee) {
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
            <tr><td>Mois : </td><td><select name="moisM" size="1"value="<?php echo $mois ?>">
                                <?php
                                $ligne = $recupmois->fetch();
								while ($ligne)
									{
									if ($ligne["mois"] == $mois) {
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
			<tr><td>Libellé :</td><td><input name="libelleM" size="20" value="<?php echo $libelle ?>"></tr></td>
			<tr><td>Montant : </td><td><input name="montantM" value="<?php echo $montant ?>" size=20></td></tr>
			<tr><td>Date : </td><td><input type="date" name="dateM" size=20 value="<?php echo $datefrais?>"></td></tr>
			<input type="hidden" name="matricule" value="<?php echo $matricule ;?>"/>
		</tbody>
		</table>
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>