<!doctype html>
<html>
    <head>
        <title>Autre forfait</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
    <?php
        $matricule = $leMatricule['matricule'];
    ?>
	
   <body>
   <p><h1>Création d'un autre forfait :</h1></p><BR/>
	<form action="c_frais.php?ucf=autreForfait&action=confirmCreatAutreForfait" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="Amatricule" value="<?php echo $matricule;?>">
			<tr><td>libelle : </td><td><input name="Alibelle" size=20></td></tr>	
            <tr><td>Date : </td><td><input name="Adate" size=20></td></tr>
			<tr><td>montant : </td><td><input name="Amontant" size=10></td></tr>
            <tr><td>Année : </td><td><select name="Aannee" size="1"value="">
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
            <tr><td>Mois : </td><td><select name="Amois" size="1"value="">
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
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>