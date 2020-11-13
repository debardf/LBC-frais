<!doctype html>
<html>
    <head>
        <title>Creation d'une nouvelle note</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>	
	
   <body>
   <p><h1>Nouvelle note :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=creerFrais&action=confirmCreaNote" method="post">
   
		<table>
		<tbody>
			<tr><td>Année</td><td><input name="Fannee" size=20></td></tr>
            <tr><td>Mois</td><td><input name="Fmois" size=20></td></tr>
            <input type="hidden" name="Fstatut" value="<?php echo $statut ;?>"/>
            <input type="hidden" name="Fdatefiche" value="<?php echo $datefiche ;?>"/>
            <input type="hidden" name="Flien" value="<?php echo $lienpdf ;?>"/>
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>