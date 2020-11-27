<?php

$matricule = $_GET['matricule'];
$annee = $_GET['annee'];
$mois = $_GET['mois'];
$laNote = $pdo->getLaNote($matricule, $annee, $mois);

var_dump($matricule);
var_dump($mois);
var_dump($annee);



?>