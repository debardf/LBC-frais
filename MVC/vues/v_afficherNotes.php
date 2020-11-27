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
		<td><?php echo $annee ?></td>
			<td><?php echo $mois ?></td>
			<td><?php echo $statut ?></td>
			<td><?php echo $datefiche ?></td>
			<td><?php echo $lienpdf ?></td>
			<td><a href=index.php?uc=frais&ucf=detailNote=<?php echo $matricule, $annee, $mois ?>></a></td>
	</tr>	
	<?php					
}
?>	
</table>
</div>
