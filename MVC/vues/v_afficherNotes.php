<div id="Notes">


	<table border=3 cellspacing=1 width = 150>
	<tr class="affichageNotes">
	</br>
	</br>
	<?php
		if($id == "C")
	{
		?>	
		<th width=150>Matricule</th>
		<?php
	}
	?>	
			
			<th width=150>Année</th>
			<th width=150>Mois</th>
			<th width=150>Statut</th>
			<th width=150>Date fiche</th>
			<th width=150>Lienpdf</th>
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
			if(!empty($lienpdf))
			{ 
				echo $lienpdf;
			} 
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
	
	</br>
	</br>
	<?php
	if($id == "V")
    {
    ?>  
    	<a id="lien" class="diff" href=index.php?uc=frais&ucf=creerNote&action=creationNote&matricule=<?php echo $matricule?>><button type="button" class="btn btn-dark">Création d'une note</button></a>
    <?php
    }
    ?>

</div>
