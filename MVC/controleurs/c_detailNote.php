<?php
$valeur = $_SESSION['valeur'];

$lesNotes = $pdo->getLesNotes($valeur);
	include("vues/v_detailNote.php");

$_REQUEST['matricule'];


$lesFrais =  $pdo->getLesFrais($valeur);
	include("vues/v_detailNote.php");
?>