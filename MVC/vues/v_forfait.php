<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau forfait</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
   <p><h1>Creation d'un nouveau forfait pour la fiche</h1></p><BR/>
	<form action="c_frais.php?ucf=creerForfait&action=confirmCreatForfait" method="post">
   
		<table>
		<tbody>
			<tr><td>id</td><td><input name="id" size=20></td></tr> 
			<tr><td>matricule </td><td><input type = "hidden" name="matricule" size=20></td></tr>	
			<tr><td>annee</td><td><input type = "hidden" name="annee" size=50></td></tr>
			<tr><td>mois</td><td><input type = "hidden" name="mois" size=50></td></tr>
			<tr><td>quantite</td><td><input name="quantite" size=50></td></tr>
			<tr><td>valideForfait</td><td><input name="montant" size=50></td></tr>	
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
<php
//ajouter les libelles des id pour la selection
?>
	
	</body>
</html>

