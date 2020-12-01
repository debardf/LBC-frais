<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modifFrais':
		{
            $id = $_REQUEST['idforfait'];
            $leForfait = $pdo->getLeForfait($id);
            $recuplibelle = $pdo->getLibelle();
            $recupannee = $pdo->getAnnee();
            $recupmois = $pdo->getMois();
			include("vues/v_modifierFrais.php");
			break;
		}
		case 'confirmModifCLient':
		{
			$numE = $_REQUEST['NumC'];
			$nomE = $_REQUEST['NomC'];
			$prenomE = $_REQUEST['PrenomC'];
			$adresseE = $_REQUEST['AdresseC'];
			$codepostalE = $_REQUEST['CodepostalC'];
			$villeE = $_REQUEST['VilleC'];
			$regionE = $_REQUEST['regionC'];
			$pdo->modifClient($numE,$nomE,$prenomE,$adresseE,$codepostalE,$villeE,$regionE);
			
			//soit ce code :
			$lesClients = $pdo->getLesClients();
			include("vues/v_clients.php");
			
			// ou ce code : (attention pas d'espace avant location)
			//header('Location: index.php');
			break;
		}
	}
?>