<!doctype html>
<html>
    <head>
        <title>Nouvelle note</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>	
	
    <?php
        $matricule = $leMatricule['matricule'];
    ?>

   <body>
   <p><h1>Nouvelle note :</h1></p></br>
	<form action="index.php?uc=frais&ucf=creerFrais&action=confirmCreaNote" method="post">
   
		<table>
		<tbody>
            <input type="hidden" name="Fmatricule" value="<?php echo $matricule;?>">
			<tr><td>Année</td><td><input name="Fannee" size=20></td></tr>
            <tr><td>Mois</td><td><input name="Fmois" size=20></td></tr>
            <input type="hidden" name="Fstatut" value="NV">
            <input type="hidden" name="Fdatefiche" value=<?php echo $datefiche=date('Y-m-d');?>>
            <input type="hidden" name="Flien" value="NV">
		</tbody>
		</table>
        </br>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>