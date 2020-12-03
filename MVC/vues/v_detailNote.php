
<!doctype html>
<html>

<head>
	<title>Détail note</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form>
        <p><H1>Détail de la note :</H1>
        <h3>Frais Forfaitaires</h3>
        </br>
        <table border=3 cellspacing=1>
            <tr>
            <td>Frais Forfaitaires</td>
            <td>Quantité </td>  
            <td>Montant Unitaire</td>
            <td>Total</td>
            <td>validé ?</td>
            <td></td>
            <td></td>
            </tr>


<?php

        $matricule= $_REQUEST['matricule'];
        $annee= $_REQUEST['annee'];
        $mois= $_REQUEST['mois'];

        foreach($lesForfaits as $leForfait)
		{
        $id = $leForfait['idforfait'];
        $libelle = $leForfait['libelleforfait'];
        $qte = $leForfait['quantite'];
        $montant = $leForfait['montant'];
        $vforfait = $leForfait['valideForfait'];
            
        ?>
            <tr>
                <td width=150><?php echo $libelle ?></td>
                <td width=150><?php echo $qte ?></td>
                <td width=150><?php echo $montant ?></td>
                <td width=150><?php echo ($montant*$qte) ?></td>
                <td width=150><?php echo $vforfait ?></td>
                <td width=30><a href=index.php?uc=frais&ucf=modifierFrais&action=modifFrais&idforfait=<?php echo $id;?>&matricule=<?php echo $matricule?>&quantite=<?php echo $qte?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=frais&ucf=supprimerFrais&action=supprFrais&idforfait=<?php echo $id;?>&matricule=<?php echo $matricule?>&quantite=<?php echo $qte?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </br>
            <h3>Autre Frais</h3>
        </br>

        <table border=3 cellspacing="1">
            <tr>
            <td>Date</td>
            <td>Libellé</td>
            <td>Montant</td>
            <td>validé ?</td>
            <td></td>
            <td></td>
            </tr>

            <?php 
            foreach($lesFrais as $leFrais)
            {
                $dateFrais = $leFrais['datefrais'];
                $libelleFrais = $leFrais['libelle'];
                $montantFrais = $leFrais['montant'];
                $vfrais = $leFrais['validefrais'];
            ?>
                <tr>
                <td width=150><?php echo $dateFrais; ?></td>
                <td width=150><?php echo $libelleFrais; ?></td>
                <td width=150><?php echo $montantFrais; ?></td>
                <td width=150><?php echo $vfrais; ?></td>
                <td width=30><a href=index.php?uc=frais&ucf=modifierFrais&action=modifFrais&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=frais&ucf=supprimerFrais&action=supprFrais&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>><img src="images/supp.png" title="Suppr"></a></td>
                </tr>

                <?php
                }
                ?>
        </table>
        </br>
        </br>
        <a href="index.php?uc=frais&ucf=forfait&action=creationForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>">Ajouter un forfait</a>
        </br>
        </br>
        <a href="index.php?uc=frais&ucf=autreForfait&action=creationAutreForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>"> Ajouter un autre forfait </a>
    </form>
</body>
</html>

