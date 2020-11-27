<?php
$valeur = $_SESSION['valeur'];

$lesNotes = $pdo->getLesNotes($valeur);
$lesFrais =  $pdo->getLesFrais($valeur);
	include("vues/v_detailNote.php");

$_REQUEST['matricule'];



?>