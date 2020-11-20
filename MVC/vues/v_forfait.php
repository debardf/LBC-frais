<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau forfait</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
   <p><h1>Nouveau forfait créé :</h1></p><BR/>
	<form action="c_frais.php?ucf=creerForfait&action=confirmCreatForfait" method="post">
   
		<table>
		<tbody>
			<tr><td>id</td><td><input name="idforfait" size=20></td></tr>
			<tr><td>libelle </td><td><input name="libelleforfait" size=20></td></tr>	
			<tr><td>montant</td><td><input name="montant" size=50></td></tr>			
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>