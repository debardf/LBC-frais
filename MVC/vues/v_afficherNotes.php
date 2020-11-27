<div id="salles">
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
	<ul class="affichageSalles">
			<li>annee <?php echo $annee ?></li>
			<li>mois<?php echo $mois ?></li>
			<li>statut<?php echo $statut ?></li>
			<li>datefiche : <?php echo $datefiche ?></li>
			<li>lienpdf : <?php echo $lienpdf ?></li>
			<li><a href=index.php?uc=frais&ucf=detailNote=<?php echo $matricule, $annee, $mois ?>>
			
	</ul>
			
			
			
<?php			
}
?>
</div>
