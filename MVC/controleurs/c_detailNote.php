<?php
$valeur = $_SESSION['valeur'];

$lesNotes = $pdo->getLesNotes($valeur);
	include("vues/v_detailNote.php");
?>