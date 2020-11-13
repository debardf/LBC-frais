<?php

$lesNotes = $pdo->getLaNote($matricule, $mois, $annee);
	include("vues/v_detailNote.php");	


$lesForfaits = $pdo->getlesForfaits();
	include("vues/v_detailNote.php");


?>