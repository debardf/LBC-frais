<!doctype html>
<html>
<!-- 
	   permet  de générer un pdf de la fiche associée
   -->

<body>
    </br>
    <form>
        <p><H1><?php echo " Note : ".$mois1." ".$annee ?></H1>
        </br>

        <h4>Nom : <?php echo " ".$nom ?></h4>
        <h4>Prénom : <?php echo " ".$prenom ?></h4>
        <h4>matricule : <?php echo " ".$matricule ?></h4>
        </br>
        </br>

        <?php
        if($cumulForfait>0)
        {
        ?>
        <h3>Frais Forfaitaires</h3>
        </br>
        </br>
        <table border=3 cellspacing=1>
            <tr>
                <th width = 200px>Frais Forfaitaires</th>
                <th width = 120px>Quantité </th>  
                <th>Montant Unitaire</th>
                <th>Total</th>
            </tr>
        <?php
            foreach($lesForfaits as $leForfait)
            {
            $idforfait = $leForfait['idforfait'];
            $libelle = $leForfait['libelleforfait'];
            $qte = $leForfait['quantite'];
            $montant = $leForfait['montant'];

            ?>  
            <tr>
                <td width=150><?php echo $libelle ?></td>
                <td width=150><?php echo $qte ?></td>
                <td width=150><?php echo $montant ?></td>
                <td width=150><?php echo ($montant*$qte) ?></td>
            </tr>
        <?php
        }
        ?>
        </table>
        <?php
        }
        if($cumulFrais>0)
        {
        ?>
        </br>
        </br>
            <h3>Autre Forfait</h3>
        </br>
        </br>
        <table border=3 cellspacing="1">
            <tr>

            <th width=200px>Libellé</th>
            <th width=200px>Date</th>
            <th>Montant</th>

        </tr>
            <?php 
            foreach($lesFrais as $leFrais)
            {
                $idfrais = $leFrais['idfrais'];
                $datefrais = $leFrais['datefrais'];
                $libelleFrais = $leFrais['libelle'];
                $montantFrais = $leFrais['montant'];
            ?>
                <tr>
                <td width=150><?php echo $libelleFrais; ?></td>
                <td width=150><?php echo $datefrais; ?></td>
                <td width=150><?php echo $montantFrais; ?></td>
                
        <?php
        }
        ?>
        </table>
        <?php
        }
        ?>
        </br>
        </br>



    <?php 
    foreach($lesSignatures as $laSignature)
            {
                ?>
                <li id="signature"><img src="images/signature/<?php echo $laSignature["signature"] ?>" title="Signature"></a></li>
                <?php
            }
            ?>

</body>
</html>