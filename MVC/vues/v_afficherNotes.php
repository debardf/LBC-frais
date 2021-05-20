<div id="Notes">

	<table border=3 cellspacing=1 width = 150>
	<tr class="affichageNotes">
	
	<?php
	//permet d'afficher certains éléments supplémentaire si l'utilisateur est un comptable
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
		$estSupprimable = false;

		$nbF = $pdo->compterForfaitFiche($matricule, $annee, $mois);
		$nbAF = $pdo->compterAutreForfaitFiche($matricule, $annee, $mois);

		if ($nbF[0][0] == 0 && $nbAF[0][0] == 0){
			$estSupprimable = true;
		}
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
		<td>
			<form id="lien" action="index.php?uc=frais&ucf=justificatifs&action=generepdf" method="post">
				<input type="hidden" name="matricule" value="<?php echo $matricule?>">
				<input type="hidden" name="annee" value="<?php echo $annee?>">
				<input type="hidden" name="mois" value="<?php echo $mois?>">
				<?php 
				//affiche le lien vers le pdf de la note s'il existe
				if(!empty($lienpdf))
				{ 
				?>
					<input type="submit" value="<?php echo $lienpdf?>">
					</form>
				<?php
				}			
				//sinon permet la création d'un pdf
				else 
				{
				?>
					<form id="lien" action="index.php?uc=frais&ucf=justificatifs&action=ajoutLien" method="post">
						<input type="hidden" name="matricule" value="<?php echo $matricule?>">
						<input type="hidden" name="annee" value="<?php echo $annee?>">
						<input type="hidden" name="mois" value="<?php echo $mois?>">
						<input type="submit" value="Ajouter un lien">
					</form>
				<?php
				}
				?>
		</td>
		<td>
			<form id="lien" action="index.php?uc=frais&ucf=detailNote&action=detNote" method="post">
				<input type="hidden" name="matricule" value="<?php echo $matricule?>">
				<input type="hidden" name="annee" value="<?php echo $annee?>">
				<input type="hidden" name="mois" value="<?php echo $mois?>">
				<input type="submit" value="détail">
			</form>
		</td>
		<?php

        if($id == "C" && $statut != "V")
    	{
		?>
        	<td width=30>
				<form action="index.php?uc=frais&ucf=valider&action=validerNote" method="post">
					<input type="hidden" name="matricule" value="<?php echo $matricule?>">
					<input type="hidden" name="annee" value="<?php echo $annee?>">
					<input type="hidden" name="mois" value="<?php echo $mois?>">
					<input width="30px" type="image" src="images/valider.png" title="Valider la note">
				</form>	
			</td>
        <?php
		}
		
    	if($estSupprimable == true)
    	{
		?>
        	<td width=30>
				<form action="index.php?uc=frais&ucf=noteFrais&action=supprimerNote" method="post">
					<input type="hidden" name="matricule" value="<?php echo $matricule?>">
					<input type="hidden" name="annee" value="<?php echo $annee?>">
					<input type="hidden" name="mois" value="<?php echo $mois?>">
					<input width="30px" type="image" src="images/suppression.jpg" title="supprimer la note">
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

	<p><b>NV = non validé</b></p>
	<p><b>V = validé</b></p>
	

	<?php
	if($id == "V")
    {
    ?>  

    	<td width=30>
			<form id="new" action="index.php?uc=frais&ucf=noteFrais&action=creationNote" method="post">
				<input type="hidden" name="matricule" value="<?php echo $matricule?>">
				<input class="btn btn-secondary" type="submit" value="Création d'une note">
			</form>
		</td>

    	
    <?php
    }
    ?>

</div>
