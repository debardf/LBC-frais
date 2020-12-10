<!doctype html>
<html>

<body>
    </br>
    <form>
        <p><H1>Détail de la note :</H1>
        </br>
        <h3>Frais Forfaitaires</h3>
        </br>
        <?php
        //affiche un message si aucun forfait n'est lié à la fiche
        if($cumulForfait==0)
        {
            echo "Il n'existe pas de forfaits ";
            
        }
        //sinon affiche la liste des forfaits liés à la fiche dans un tableau
        else
        {
    
        ?>
        </br>
        <table border=3 cellspacing=1>
            <tr>
                <th width = 200px>Frais Forfaitaires</th>
                <th width = 120px>Quantité </th>  
                <th>Montant Unitaire</th>
                <th>Total</th>
                <th>validé ?</th>
        <?php
        //affiche les lignes suivante si l'utilisateur est un visiteur et si la fiche n'est pas validée
        if($idProfil == "V" && $statut != "V") 
        {
            ?>
                    <th width = 50px></th>
                    <th width = 50px></th>
                    <?php

        }
        ?>
        </tr>
        <?php
            foreach($lesForfaits as $leForfait)
            {
            $idforfait = $leForfait['idforfait'];
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
            //permet d'acceder à la page de validation le forfait si l'utilisateur est un comptable et si le forfait n'est pas déja validé
            if($idProfil == "C" && $vforfait == 0)
            {
                ?>
                <td id="cache"><a href=index.php?uc=frais&ucf=valider&action=validerForfait&annee=<?php echo $annee ?>&mois=<?php echo $mois ?>&id=<?php echo $idforfait ?>&matricule=<?php echo $matricule?>><img width="30" src="images/valider.png" title="Valider le Frais"></a></td>
                <?php
            }
            //permet d'acceder à la page de modification et de suppression d'un forfait si l'utilisateur est un visiteur et si la fiche n'est pas validée
            if($idProfil == "V" && $statut != "V") 
            {
                ?>
                <td id="icone" ><a href=index.php?uc=frais&ucf=forfait&action=modifForfait&idforfait=<?php echo $idforfait;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td id="icone" ><a href=index.php?uc=frais&ucf=forfait&action=supprForfait&idforfait=<?php echo $idforfait;?>&matricule=<?php echo $matricule?>&annee=<?php echo $annee?>&mois=<?php echo $mois?>><img src="images/supp.png" title="Suppr"></a></td>
                <?php
            }
            }
            ?>
            </tr>
        </table>
        <?php
        }
        ?>
        <?php
        //permet d'acceder à la page de création d'un forfait si l'utilisateur est un visiteur et si la fiche n'est pas validée
        if ($idProfil =="V" && $statut != "V")
        {
            ?>
        </br>
        </br>
        <a id="lien" href="index.php?uc=frais&ucf=forfait&action=creationForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>">Ajouter un forfait</a>
        <?php
        }
        ?>
        </br>
        </br>
            <h3>Autre Forfait</h3>
        </br>
        <?php
        //si cumulFrais = 0 envoi un message pour signifier qu'il n'y a pas d'autres forfaits
        if($cumulFrais==0)
        {
            echo "Il n'existe pas d'autres forfaits ";
            ?>
            </br>
            <?php
        }
        //Sinon la liste des autres forfaits associés à la fiches sont affichés dans le tableau
        else
        {
        ?>
        </br>
        <table border=3 cellspacing="1">
            <tr>

            <th width=200px>Libellé</th>
            <th width=200px>Date</th>
            <th>Montant</th>
            <th>validé ?</th>

             <?php
        if($idProfil == "V" && $statut != "V") 
        {
            ?>
                <th width = 50px></th>
                <th width = 50px></th>
                <?php

        }
        ?>
        </tr>
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
                <td width=150><?php echo $libelleFrais; ?></td>
                <td width=150><?php echo $datefrais; ?></td>
                <td width=150><?php echo $montantFrais; ?></td>
                <td width=150><?php echo $vfrais; ?></td>

                    <?php
                 if($idProfil == "C" && $vfrais == 0)
    {
       ?>  
        <td id="cache"><a href=index.php?uc=frais&ucf=valider&action=validerAutreFrais&annee=<?php echo $annee ?>&mois=<?php echo $mois ?>&id=<?php echo $idfrais ?>&matricule=<?php echo $matricule?>><img width="30" src="images/valider.png" title="Valider le Frais"></a></td>
        <?php
    }
        if($idProfil == "V" && $statut != "V") 
        {
            ?>
            <td id="icone"><a href=index.php?uc=frais&ucf=autreForfait&action=modifAutreForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>&idfrais=<?php echo $idfrais;?>><img src="images/modifier.gif" title="Modif"></a></td>
            <td id="icone" ><a href=index.php?uc=frais&ucf=autreForfait&action=supprAutreForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>&idfrais=<?php echo $idfrais;?>><img src="images/supp.png" title="Suppr"></a></td>
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
        <?php
        if ($idProfil =="V" && $statut != "V")
        {
            ?>
        </br>
        </br>
        <a id="lien" href="index.php?uc=frais&ucf=autreForfait&action=creationAutreForfait&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>"> Ajouter un autre forfait </a>
        <?php
        }
        ?>
        </br>
        </br>
        <h3>Justificatifs</h3>
        </br>
        <?php
        if($cumulJustif==0)
        {
            echo "Il n'y a pas de justificatif ";
            
        } 
        else
        {
    
        ?>
        <ul>
    <?php 
            foreach($lesJustificatifs as $leJustificatif)
            {
                $pdf = $leJustificatif['pdfjustificatif'];
                $idjustificatif = $leJustificatif['idjustificatif'];
                if ($idProfil =="V" && $statut != "V")
                {
            ?>
                    <li id="justif" width=150><?php echo $pdf; ?><a href=index.php?uc=frais&ucf=justificatifs&action=supprimerJustificatif&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>&idjustificatif=<?php echo $idjustificatif;?>><img src="images/supp.png" title="Suppr"></a></li>
            <?php
                }
            }
            ?>
        </ul>

        <?php
        }
        ?>
        <?php
        if ($idProfil =="V" && $statut != "V")
        {
            ?>
        </br>
        </br>
        <a id="lien" href="index.php?uc=frais&ucf=justificatifs&action=creationJustificatif&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>"> Ajouter un justificatif </a>
    </form>
        <?php
        }
        ?>

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