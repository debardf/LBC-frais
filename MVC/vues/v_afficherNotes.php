<div id="Notes">


	<table border=3 cellspacing=1>
	<tr class="affichageNotes">
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
	$matricule = $uneNote['matricule'];
	$annee = $uneNote['annee'];
	$mois = $uneNote['mois'];
	$statut = $uneNote['statut'];
	$datefiche=$uneNote['datefiche'];
	$lienpdf=$uneNote['lienpdf'];	
	?>	
	<tr>
		<td width=150><?php echo $annee ?></td>
		<td width=150><?php echo $mois ?></td>
		<td width=150><?php echo $statut ?></td>
		<td width=150><?php echo $datefiche ?></td>
		<td width=150><?php echo $lienpdf ?></td>
		<td width=150><a href=index.php?uc=frais&ucf=detailNote=<?php echo $matricule, $annee, $mois ?>></a></td>
	</tr>	
	<?php					
	}
	?>	
	</table>
</div>
