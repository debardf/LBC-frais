<div id="Notes">


	<table border=3 cellspacing=1 width = 150>
	<tr class="affichageNotes">

	<?php
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
		<td width=150><?php echo $matricule ?></td>
		<?php
	}
	?>	
				<td width=150><?php echo $annee ?></td>
				<td width=150><?php echo $mois ?></td>
				<td width=150><?php echo $statut ?></td>
				<td width=150><?php echo $datefiche ?></td>
				<td width=150><?php echo $lienpdf ?></td>
				<td width=150><a href=index.php?uc=frais&ucf=detailNote&matricule=<?php echo $matricule;?>&annne=<?php echo $annee;?>&mois=<?php echo $mois;?>>détail de la note</a></td>
		</tr>	
		<?php
		}
		?>
	</table>
</div>
