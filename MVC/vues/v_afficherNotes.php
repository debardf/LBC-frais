<div id="Notes">


	<table border=3 cellspacing=1 width = 150>
	<tr class="affichageNotes">

	<?php
		if($id == "C")
	{
		?>	
		<th>matricule</th>
		<?php
	}
	?>	
			<th>annee</th>
			<th>mois</th>
			<th>statut</th>
			<th>datefiche</th>
			<th>lienpdf</th>
			<th></th>
			
			
	</tr>
	<?php
		
		foreach($lesNotes as $uneNote) 
		{	
			echo "une note :" ;
			 var_dump($uneNote);
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
				<td><?php echo $lienpdf ?></td>
				<td><a href=index.php?uc=frais&ucf=detailNote=<?php echo $matricule, $annee, $mois ?>>détail de la note</a></td>
		</tr>	
		<?php
		}					

?>	
</table>
</div>
