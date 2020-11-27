<?php


$laNote = $pdo->getLaNote($matricule, $annee, $mois);
$matricule = $_GET['matricule'];
var_dump($matricule);





$lesNotes = $pdo->getLesNotes($valeur);
$lesFrais =  $pdo->getLesFrais($valeur);
	include("vues/v_detailNote.php");

$_REQUEST['matricule'];



?>