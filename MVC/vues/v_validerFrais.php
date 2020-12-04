<!doctype html>
<html>
	<?php 
		$matricule= $_REQUEST['matricule'];
        $annee= $_REQUEST['annee'];
        $mois= $_REQUEST['mois'];
	?> 
   <body>
   <p><h1>Validation du frais :</h1></p><BR/>
	<form action="index.php?uc=frais&ucf=detailNote&action=detNote&matricule=<?php echo $matricule ?>&annee=<?php echo $annee ?>&mois=<?php echo $mois ?> " method="post"> 
   		<a text-align="center">Êtes-vous sur de vouloir valider le frais ?? Une fois valider, le frais ne pourra plus être valider </a>
	   	
        <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>