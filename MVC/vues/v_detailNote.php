 
<!doctype html>
<html>

<head>
	<title>Détail note</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form>
        <p><H1>Détail de la note :</H1><br> 



<?php echo "Visiteur        " $matricule
?>

</br>

        <table border=3 cellspacing=1 >
            <tr>
            <td>Frais Forfaitaires : </td><td>Quantité : </td>
            <td>Montant Unitaire: </td><td>Total: </td>
            </tr> 


        <?php
		foreach( $lesForfaits as $leForfait)
        {
       
        $Forfait = $leForfait['libelleforfait'];
            
            
        ?>
            <tr>
                <td width=150><?php echo $Forfait ?></a></td>
                <td></td>
                <td></td>
                <td></td>

                
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

    </form>
</body>
</html>

