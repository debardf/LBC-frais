 
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



</br>

        <table border=3 cellspacing=1 >
            <tr>
            <td>Frais Forfaitaires : </td><td>Quantité : </td>
            <td>Montant Unitaire: </td><td>Total: </td>
            </tr> 


        <?php
		foreach($lesForfaits as $leForfait)
        {
       
        $id = $leForfait['idforfait'];
        $libelle = $leForfait['libelleforfait'];
        $montant = $leForfait['montant'];
            
            
        ?>
            <tr>
                <td width=150><?php echo $libelle ?></a></td>
                <td width=150><?php echo $montant ?></td>
                <td></td>
                <td></td>

                
                <td width=30><a href=c_frais.php?ucf=modifierForfait&action=modificationForfait&num=<?php echo $id ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=c_frais.php?ucf=supprimerForfait&action=suppressionForfait&num=<?php echo $id ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

    </form>
</body>
</html>

