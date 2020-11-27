
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


		foreach($lesNotes as $uneNote)
        {
        $libelleforfait = $uneNote['libelleforfait'];
        $montant = $uneNote['montant'];
        $quantite = $uneNote['quantite'];
        var_dump($quantite);
                ?>
            <tr>
                <td width=150><?php echo $libelleforfait ?></a></td>
                <td width=150><?php echo $quantite ?></td>
                <td width=150><?php echo $montant ?></td>
                <td width=150><?php echo $total ?></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <table border=3 cellspacing="1">
            <tr>
                <td>Date :</td><td>Libellé : </td><td>Montant : </td>

                <?php 
                foreach($lesFrais as $leFrais)
                {
                    $libelleFrais = $leFrais['libelle'];
                    $montantFrais = $leFrais['montant'];

                ?>
                     <tr>
                        <td width=150><?php echo $libelleFrais ?></a></td>
                        <td width=150><?php echo $montantFrais ?></td>
                <td></td>

                <?php
                }
                ?>
        </table>

    </form>
</body>
</html>

