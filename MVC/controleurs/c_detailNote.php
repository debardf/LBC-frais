<?php

$matricule = $_GET['matricule'];
$annee = $_GET['annee'];
$mois = $_GET['mois'];
$lesNotes = $pdo->getLesFraisForfaitaires($matricule, $annee, $mois);
$total = $montant * $quantite ;

var_dump($matricule);
var_dump($mois);
var_dump($annee);
include("vues/v_detailNote.php");



?>