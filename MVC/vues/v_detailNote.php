<!doctype html>
<html>

<body>
    <form>
        <p><H1>Détail de la note :</H1>
        <h3>Frais Forfaitaires</h3>
        </br>
        <?php


        $matricule= $_REQUEST['matricule'];
        $annee= $_REQUEST['annee'];
        $mois= $_REQUEST['mois'];

   
        if($cumulForfait==0)
        {
            echo "Il n'existe pas de forfaits ";
            
        } 
        else
        {
    
        ?>
        </br>
            <table border=3 cellspacing=1>
                <tr>
                    <th width = 200px>Frais Forfaitaires</th>
                    <th>Quantité </th>  
                    <th>Montant Unitaire</th>
                    <th>Total</th>
                    <th>validé ?</th>
                  <?php
                  if($idProfil == "C")
    {
        ?>  
        <td></td>
        <?php
    }
        
        if($idProfil == "V") 
        {
            ?>
                    <th></th>
                    <th></th>
                </tr>
                <?php

            }
?>
        <?php

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

    <?php

                 if($idProfil == "C")
    {
       ?>  
        <td id="icone" width=30><a href=index.php?uc=frais&ucf=validerFrais&action=validerFraisF&annee=<?php echo $annee ?>&mois=<?php echo $mois ?>&id=<?php echo $id ?>&matricule=<?php echo $matricule?> ><img width="30" src="images/valider.png" title="Valider le Frais"></a></td>
        <?php
    }  
        
        if($idProfil == "V") 
        {
            ?>
            <td id="icone" ><a href=index.php?uc=frais&ucf=modifierFrais&action=modifFrais&idforfait=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>><img src="images/modifier.gif" title="Modif"></a></td>
            <td id="icone" ><a href=index.php?uc=frais&ucf=supprimerFrais&action=supprFrais&idforfait=<?php echo $id;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>><img src="images/supp.png" title="Suppr"></a></td>
            <?php
            }
			?>

        </tr>
        <?php
        }
        ?>
        </table>
        <?php
        
        }
        
        ?>
        </br>
        </br>
            <h3>Autre Frais</h3>
        </br>
        <?php
        
        if($cumulFrais==0)
        {
            echo "Il n'existe pas d'autres forfaits ";
            ?>
            </br>
            <?php
        } 
        else
        {
        ?>
        </br>
        <table border=3 cellspacing="1">
            <tr>

            <th>Date</th>
            <th>Libellé</th>
            <th>Montant</th>
            <th>validé ?</th>

             <?php
                  if($idProfil == "C")
    {
        ?>  
        <td></td>
        <?php
    }
        
        if($idProfil == "V") 
        {
            ?>
                <th></th>
                <th></th>
                </tr>
                <?php

            }
?>

            <?php 
            foreach($lesFrais as $leFrais)
            {
                $idfrais = $leFrais['idfrais'];
                $datefrais = $leFrais['datefrais'];
                $libelleFrais = $leFrais['libelle'];
                $montantFrais = $leFrais['montant'];
                $vfrais = $leFrais['validefrais'];
            ?>
                <tr>
                <td width=150><?php echo $datefrais; ?></td>
                <td width=150><?php echo $libelleFrais; ?></td>
                <td width=150><?php echo $montantFrais; ?></td>
                <td width=150><?php echo $vfrais; ?></td>

                    <?php
                 if($idProfil == "C")
    {
       ?>  
        <td id="icone" width=30><a href=index.php?uc=frais&ucf=validerFrais&action=validerAutreFrais&annee=<?php echo $annee ?>&mois=<?php echo $mois ?>&id=<?php echo $id ?>&matricule=<?php echo $matricule?>><img width="30" src="images/valider.png" title="Valider le Frais"></a></td>
        <?php
    }
        
        if($idProfil == "V") 
        {
            ?>
            <td id="icone"><a href=index.php?uc=frais&ucf=modifierAutreForfait&action=modifAutreForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>&idfrais=<?php echo $idfrais;?>><img src="images/modifier.gif" title="Modif"></a></td>
            <td id="icone" ><a href=index.php?uc=frais&ucf=supprimerAutreForfait&action=supprAutreForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>&idfrais=<?php echo $idfrais;?>><img src="images/supp.png" title="Suppr"></a></td>
            <?php
            }
            ?>
            </tr>


            <?php
            }
            ?>
        </table>
        <?php
        }
        ?>
        </br>
        </br>
        <h3>Justificatifs</h3>
        </br>
        <table border=3 cellspacing="1">
            <tr>
            <td>lien pdf</td>

    <?php 
            foreach($lesJustificatifs as $leJustificatif)
            {
                $pdf = $leJustificatif['pdfjustificatif'];
            ?>
                <tr>
                <td width=150><?php echo $pdf; ?></td>
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

