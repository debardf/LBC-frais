<?php

$lesNotes = $pdo->getLaNoteByID($idValeur);
	include("vues/v_detailNote.php");
?>