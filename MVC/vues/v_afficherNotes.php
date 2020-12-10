<div id="Notes">


	<table border=3 cellspacing=1 width = 150>
	<tr class="affichageNotes">
	</br>
	</br>
	<?php
	//permet d'afficher certains éléments supplémentaire si l'utilisateur est un comptable
		if($id == "C")
	{
		?>	
		<th width=150>matricule</th>
		<?php
	}
	?>	
			
			<th width=150>annee</th>
			<th width=150>mois</th>
			<th width=150>statut</th>
			<th width=150>datefiche</th>
			<th width=150>lienpdf</th>
			<th width=150></th>


	</tr>
	<?php

	
		
		foreach($lesNotes as $uneNote) 
		{	
			$matricule = $uneNote['matricule'];
			$annee = $uneNote['annee'];
			$mois = $uneNote['mois'];
			$statut = $uneNote['statut'];
			$datefiche=$uneNote['datefiche'];
			$lienpdf=$uneNote['lienpdf'];	
	?>	
		<tr>
		<?php
		if($id == "C")
		{
		?>	
		<td><?php echo $matricule ?></td>
		<?php
		}
		?>	
			<td><?php echo $annee ?></td>
			<td><?php echo $mois ?></td>
			<td><?php echo $statut ?></td>
			<td><?php echo $datefiche ?></td>
			<td><a id="lien" href=index.php?uc=frais&ucf=justificatifs&action=generepdf&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>>
			<?php 
			//affiche le lien vers le pdf de la note si il existe
			if(!empty($lienpdf))
			{ 
				echo $lienpdf;
			}
			//sinon permet la création d'un justificatif
			else 
			{
				?></a>
				<a id="lien" href=index.php?uc=frais&ucf=justificatifs&action=ajoutLien&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>>Ajouter un lien</a>
				<?php
			}
			?>
			</td>
			<td><a id="lien" href="index.php?uc=frais&ucf=detailNote&action=detNote&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>">détail</a></td>
			<?php

        if($id == "C" && $statut != "V")
    	{
		?>
        	<td width=30><a href=index.php?uc=frais&ucf=valider&action=validerNote&matricule=<?php echo $matricule;?>&annee=<?php echo $annee;?>&mois=<?php echo $mois;?>><img width="30" src="images/valider.png" title="Valider le Frais"></a></td>
        <?php
    	}
    	?>

		</tr>	
		<?php
		}
		?>
	</table>
	</br>
	<p><b>NV = non validé</b></p>
	<p><b>V = validé</b></p>
	</br>
	</br>
	<?php
	if($id == "V")
    {
    ?>  
    	<td width=30><a id="lien" href=index.php?uc=frais&ucf=creerNote&action=creationNote&matricule=<?php echo $matricule?>>Création d'une note</a></td>
    <?php
    }
    ?>

</div>
