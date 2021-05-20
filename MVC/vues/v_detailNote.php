<!doctype html>
<html>

<body>
    
    <p><H1 id="partie">Détail de la note :</H1>
    </br>
    <h3 id="partie">Frais Forfaitaires</h3>
    <?php
    //affiche un message si aucun forfait n'est lié à la fiche
    if($cumulForfait==0)
    {
        echo "<p>Il n'existe pas de forfaits</p> ";
           
    }
    //sinon affiche la liste des forfaits liés à la fiche dans un tableau
    else
    {
    ?>
        <table border=3 cellspacing=1>
            <tr>
                <th width = 200px>Frais Forfaitaires</th>
                <th width = 120px>Quantité </th>  
                <th width = 120px>Montant Unitaire</th>
                <th width = 120px>Total</th>
                <th width = 120px>validé ?</th>
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
            $sommeForfait = 0;
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
                
                $sommeForfait = ($montant*$qte) + $sommeForfait;

            //permet d'acceder à la page de validation le forfait si l'utilisateur est un comptable et si le forfait n'est pas déja validé
            if($idProfil == "C" && $vforfait == 0)
            {
                ?>
                <td id="cache">
                    <form action="index.php?uc=frais&ucf=valider&action=validerForfait" method="post">
                        <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                        <input type="hidden" name="annee" value="<?php echo $annee?>">
                        <input type="hidden" name="mois" value="<?php echo $mois?>">
                        <input type="hidden" name="id" value="<?php echo $idforfait?>">
                        <input width="30px" type="image" src="images/valider.png" title="Valider le Frais">
                    </form>	
                </td>
                <?php
            }
            //permet d'acceder à la page de modification et de suppression d'un forfait si l'utilisateur est un visiteur et si la fiche n'est pas validée
            if($idProfil == "V" && $statut != "V") 
            {
                ?>
                <td id="icone" >
                    <form action="index.php?uc=frais&ucf=forfait&action=modifForfait" method="post">
                        <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                        <input type="hidden" name="annee" value="<?php echo $annee?>">
                        <input type="hidden" name="mois" value="<?php echo $mois?>">
                        <input type="hidden" name="idforfait" value="<?php echo $idforfait?>">
                        <input width="20px" type="image" src="images/modifier.gif" title="Modif">
                    </form>	
                </td>
                <td id="icone" >
                    <form action="index.php?uc=frais&ucf=forfait&action=supprForfait" method="post">
                        <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                        <input type="hidden" name="annee" value="<?php echo $annee?>">
                        <input type="hidden" name="mois" value="<?php echo $mois?>">
                        <input type="hidden" name="idforfait" value="<?php echo $idforfait?>">
                        <input width="20px" type="image" src="images/supp.png" title="Suppr">
                    </form>	
                </td>
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
        
        <form id="new" action="index.php?uc=frais&ucf=forfait&action=creationForfait" method="post">
			<input type="hidden" name="matricule" value="<?php echo $matricule?>">
			<input type="hidden" name="annee" value="<?php echo $annee?>">
			<input type="hidden" name="mois" value="<?php echo $mois?>">
			<input class="btn btn-secondary" type="submit" value="Ajouter un forfait">
		</form>
        <?php
        }
        ?>
        
        
            <h3 id="partie">Autre Forfait</h3>
        
        <?php
        //si cumulFrais = 0 envoi un message pour signifier qu'il n'y a pas d'autres forfaits
        if($cumulFrais==0)
        {
            echo "<p>Il n'existe pas d'autres forfaits</p> ";
            ?>
            
            <?php
        }
        //Sinon la liste des autres forfaits associés à la fiches sont affichés dans le tableau
        else
        {
        ?>
        <table border=3 cellspacing="1">
            <tr>

            <th width=200px>Libellé</th>
            <th width=200px>Date</th>
            <th width = 120px>Montant</th>
            <th width = 120px>validé ?</th>

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
            $sommeFrais = 0;
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
                $sommeFrais = $montantFrais + $sommeFrais;
                if($idProfil == "C" && $vfrais == 0)
                {
                ?>  
                    <td id="cache">
                        <form action="index.php?uc=frais&ucf=valider&action=validerAutreFrais" method="post">
                            <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                            <input type="hidden" name="annee" value="<?php echo $annee?>">
                            <input type="hidden" name="mois" value="<?php echo $mois?>">
                            <input type="hidden" name="id" value="<?php echo $idfrais?>">
                            <input width="30px" type="image" src="images/valider.png" title="Valider le Frais">
                        </form>	
                    <?php
                }
                if($idProfil == "V" && $statut != "V") 
                {
                    ?>
                    <td id="icone" >
                        <form action="index.php?uc=frais&ucf=autreForfait&action=modifAutreForfait" method="post">
                            <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                            <input type="hidden" name="annee" value="<?php echo $annee?>">
                            <input type="hidden" name="mois" value="<?php echo $mois?>">
                            <input type="hidden" name="idfrais" value="<?php echo $idfrais?>">
                            <input width="20px" type="image" src="images/modifier.gif" title="Modif">
                        </form>	
                    </td>
                    <td id="icone" >
                        <form action="index.php?uc=frais&ucf=autreForfait&action=supprAutreForfait" method="post">
                            <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                            <input type="hidden" name="annee" value="<?php echo $annee?>">
                            <input type="hidden" name="mois" value="<?php echo $mois?>">
                            <input type="hidden" name="idfrais" value="<?php echo $idfrais?>">
                            <input width="20px" type="image" src="images/supp.png" title="Suppr">
                        </form>	
                    </td>
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
        if ($idProfil =="V" && $statut != "V")
        {
        ?>
        <form id="new" action="index.php?uc=frais&ucf=autreForfait&action=creationAutreForfait" method="post">
			<input type="hidden" name="matricule" value="<?php echo $matricule?>">
			<input type="hidden" name="annee" value="<?php echo $annee?>">
			<input type="hidden" name="mois" value="<?php echo $mois?>">
			<input class="btn btn-secondary" type="submit" value="Ajouter un autre forfait">
		</form>
        <?php
        }
        ?>
        
        <?php

        if($cumulForfait!=0 && $cumulFrais!=0)
        {
            $total = $sommeFrais + $sommeForfait;
        }
        else if ($cumulForfait!=0 && $cumulFrais==0)
        {
            $total = $sommeForfait;
        } 
        else if ($cumulForfait==0 && $cumulFrais!=0)
        {
            $total = $sommeFrais;
        } else
        {
            $total = 0;
        }
        if($total!=0){
            ?>
            <table>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Montant Total :</th>
                <th><?php echo $total?></th>
            </table>
            <?php
        }
        
        ?>
        <h3 id="partie">Justificatifs</h3>
        <?php
        if($cumulJustif==0)
        {
            echo "<p>Il n'y a pas de justificatif</p>";
            
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
                <form action="index.php?uc=frais&ucf=justificatifs&action=supprimerJustificatif" method="post">
                    <li id="justif">
                        <?php echo $pdf?>
                        <input type="hidden" name="matricule" value="<?php echo $matricule?>">
                        <input type="hidden" name="annee" value="<?php echo $annee?>">
                        <input type="hidden" name="mois" value="<?php echo $mois?>">
                        <input type="hidden" name="idjustificatif" value="<?php echo $idjustificatif?>">
                        <input width="20px" type="image" src="images/supp.png" title="Suppr">
                    </li>
                    </form>
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
        
        
        <form id="new" action="index.php?uc=frais&ucf=justificatifs&action=creationJustificatif" method="post">
			<input type="hidden" name="matricule" value="<?php echo $matricule?>">
			<input type="hidden" name="annee" value="<?php echo $annee?>">
			<input type="hidden" name="mois" value="<?php echo $mois?>">
			<input class="btn btn-secondary" type="submit" value="Ajouter un justificatif">
		</form>
        <?php
        }
        ?>

        <?php 
        foreach($lesSignatures as $laSignature)
            {
                ?>
                <li id="signature"><img src="images/signature/<?php echo $laSignature["signature"]?>" title="Signature"></a></li>
                <?php
            }
            ?>

    <form id="new" action="index.php?uc=frais&ucf=afficherNotes"method="post"> 
        <input class="btn btn-secondary" type="submit" value="retour">
    </form>

</body>
</html>