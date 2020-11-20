<div id="salles">
<?php
	
foreach($lesNotes as $uneNote) 
{
	$matricule = $uneSalle['matricule'];
	$annee = $uneSalle['annee'];
	$mois = $uneSalle['mois'];
	$statut = $uneSalle['statut'];
	$datefiche=$uneSalle['datefiche'];
	$lienpdf=$uneSalle['lienpdf'];
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
