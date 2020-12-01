<!doctype html>
<html>
    <head>
        <title>Autre forfait</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
   <body>
   <p><h1>Création d'un autre forfait :</h1></p><BR/>
	<form action="c_frais.php?ucf=autreForfait&action=confirmCreatAutreForfait" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="Amatricule" value="<?php echo $matricule;?>">
			<input type="hidden" name="Aannee" value="<?php echo $annee;?>">
			<input type="hidden" name="Amois" value="<?php echo $mois;?>">
			<tr><td>libelle : </td><td><input name="Alibelle" size=20></td></tr>	
            <tr><td>Date : </td><td><input name="Adate" size=20></td><td>(format = yyyy-mm-dd )</td></tr>
			<tr><td>montant : </td><td><input name="Amontant" size=10></td></tr>
            
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>