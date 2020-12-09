<?php

class PdoLBC
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=lbc';		
      	private static $user='root';
		private static $mdp='';
		private static $monPdo;
		private static $monPdoLBC = null;
			
	private function __construct()
	{
    
		if ($_SERVER['SERVER_NAME'] == 'localhost'){
    		PdoLBC::$monPdo = new PDO(PdoLBC::$serveur.';'.PdoLBC::$bdd, PdoLBC::$user, PdoLBC::$mdp);
			PdoLBC::$monPdo->query("SET CHARACTER SET utf8");
		}else{
			PdoLBC::$monPdo = new PDO('mysql:host=db718502955.db.1and1.com;dbname=db718502955','dbo718502955','BMw1234*'); 
			PdoLBC::$monPdo->query("SET CHARACTER SET utf8");
		}
			

	}
	public function _destruct(){
		PdoLBC::$monPdo = null;
	}

	public  static function getPdoLBC()
	{
		if(PdoLBC::$monPdoLBC == null)
		{
			PdoLBC::$monPdoLBC= new PdoLBC();
		}
		return PdoLBC::$monPdoLBC;  
	}

	
	//recupération du login et du mdp
	
	public function getInformationsConnexion($login,$mdp)
	{
		$req = "SELECT * FROM profil WHERE login='$login' and mdp ='$mdp' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	
	//récupérer les notes du visiteur
	
	public function getLesNotes($valeur)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$valeur' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		
	}
	
	//récupérer toutes les notes pour le comptable
	
	public function getToutesLesNotes()
	{
		$req = "SELECT * FROM fiche ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		
	}
	
	//récupération d'une note selon le matricule, l'année et le mois
	
	public function getLaNote($matricule, $mois, $annee)
	{
		$req = "SELECT * FROM fiche WHERE matricule = '$matricule' and annee = '$annee' and mois = '$mois' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	
	//obtenir la liste des forfaits du visiteur
	
	public function getLesForfaits($matricule, $annee, $mois)
	{
		$req = "SELECT * FROM ajouteforfait inner join forfait on forfait.idforfait=ajouteforfait.idforfait WHERE matricule='$matricule' and annee='$annee' and mois='$mois'";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//obtenir un forfait d'un visiteur

	public function getLeForfait($matricule,$annee,$mois,$id)
	{
		$req = "SELECT * FROM ajouteforfait inner join forfait on forfait.idforfait=ajouteforfait.idforfait WHERE matricule ='$matricule' AND  annee='$annee' AND mois='$mois' AND ajouteforfait.idforfait = '$id'";
		$res = PdoLBC::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
	}

	//obtenir l'autre forfait d'un visiteur

	public function getAutreForfait($matricule,$annee,$mois,$id)
	{
		$req = "SELECT * FROM frais WHERE matricule ='$matricule' AND  annee='$annee' AND mois='$mois' AND idfrais = '$id'";
		$res = PdoLBC::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
	}

    //liste des années

	public function getAnnee($matricule)
	{
		$req = "select distinct annee from fiche where matricule = '$matricule'";
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

    //liste des mois

	public function getMois($matricule)
	{
		$req = "select distinct mois from fiche where matricule = '$matricule'";
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

    //liste des libellés

	public function getLibelle()
	{
		$req = "SELECT * FROM forfait";
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

	//recupere le libelle associé à un forfait

	public function getUnLibelle($id)
	{
		$req = "SELECT libelleforfait from forfait where idforfait = '$id'";
		$res = PdoLBC::$monPdo->query($req);
		$Ligne = $res->fetch();
		return $Ligne;
	}
	
	//obtenir la liste des autres frais du visiteur

	public function getLesFrais($matricule, $annee, $mois)
	{
		$req = ("SELECT * from frais WHERE matricule = '$matricule' and annee= '$annee' and mois = '$mois'");
		$res = PdoLBC::$monPdo->query($req);
		$Ligne = $res->fetchAll();
		return $Ligne;
	}

	
	//associer le matricule au login(profil)
	
	public function getMatricule($login)
	{
		$req = "SELECT matricule FROM visiteur WHERE matricule = $login";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	
	//a voir si elle sert a quelque chose

	public function getLesFraisForfaitaires($matricule, $annee, $mois)
	{
	$req = ( "SELECT libelleforfait, quantite, montant FROM ajouteforfait INNER JOIN forfait ON ajouteForfait.idforfait = forfait.idforfait WHERE matricule = '$matricule' AND annee = '$annee' AND mois = '$mois' " );
	$res = PdoLBC::$monPdo->query($req);
	$lesLignes = $res->fetchAll();	
	return $lesLignes;

	}

	// recupere la liste des justificatifs associées à une note de frais

	public function getLesJustificatifs($matricule, $annee, $mois)
	{
	$req = ( "SELECT * FROM justificatif WHERE matricule = '$matricule' And annee = '$annee' AND mois = '$mois'" );
	$res = PdoLBC::$monPdo->query($req);
	$lesLignes = $res->fetchAll();	
	return $lesLignes;

	}

	//recupère un justificatif en particulier

	public function getLeJustificatif($matricule, $annee, $mois, $id)
	{
	$req = ( "SELECT pdfjustificatif FROM justificatif WHERE matricule = '$matricule' And annee = '$annee' AND mois = '$mois' AND idjustificatif = '$id'" );
	$res = PdoLBC::$monPdo->query($req);
	$lesLignes = $res->fetch();	
	return $lesLignes;

	}

	
	//création d'une note de frais

	public function creerFrais($matricule,$annee,$mois,$statut,$datefiche,$lienpdf)
	{
		$res = PdoLBC::$monPdo->prepare('INSERT INTO fiche (matricule,
		annee, mois, statut, datefiche, lienpdf) VALUES( :matriculeN, 
		:anneeN, :moisN, :statutN, :dateficheN, :lienpdfN)');
		$res->bindValue('matriculeN',$matricule, PDO::PARAM_INT);
		$res->bindValue('anneeN', $annee, PDO::PARAM_STR);
		$res->bindValue('moisN', $mois, PDO::PARAM_INT);
		$res->bindValue('statutN', $statut, PDO::PARAM_STR);
		$res->bindValue('dateficheN', $datefiche, PDO::PARAM_STR);
		$res->bindValue('lienpdfN', $lienpdf, PDO::PARAM_STR);
		$res->execute();
	}

	//création d'un nouveau forfait
	
	public function creerForfait($matricule,$annee, $mois, $idforfait, $quantite, $valideForfait)
	{
		
		$res = PdoLBC::$monPdo->prepare('INSERT INTO ajouteforfait (matricule, annee, mois, idforfait, quantite, valideForfait)
				VALUES(:matricule, :annee, :mois, :id, :quantite, :valideForfait)');
		$res->bindValue('matricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('annee',$annee, PDO::PARAM_STR);
		$res->bindValue('mois',$mois, PDO::PARAM_INT);
		$res->bindValue('id',$idforfait, PDO::PARAM_STR);
		$res->bindValue('quantite',$quantite, PDO::PARAM_INT);
		$res->bindValue('valideForfait',$valideForfait, PDO::PARAM_INT);
		$res->execute();
	}

	//count du nombre de ligne dans frais pour récupérer la valeur de l'id

	public function cumulId()
	{
		$req = "SELECT count(*) FROM frais";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	//count du nombre de ligne dans justificatif pour récupérer la valeur de l'id

	public function compterId()
	{
		$req = "SELECT count(*) FROM justificatif";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	//création d'un autre forfait

	public function creerAutreForfait($idfrais, $matricule, $annee, $mois, $datefrais, $libelle, $montant, $validefrais)
	{

		$res = PdoLBC::$monPdo->prepare('INSERT INTO frais (idfrais, matricule, 
		annee, mois, datefrais, libelle, montant, validefrais) VALUES( :Aid, :Amatricule, 
		:Aannee, :Amois, :Adate, :Alibelle, :Amontant, :Avalidefrais)');
		$res->bindValue('Aid',$idfrais, PDO::PARAM_INT);
		$res->bindValue('Amatricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('Aannee', $annee, PDO::PARAM_INT);
		$res->bindValue('Amois', $mois, PDO::PARAM_INT);
		$res->bindValue('Adate', $datefrais, PDO::PARAM_STR);
		$res->bindValue('Alibelle', $libelle, PDO::PARAM_STR);
		$res->bindValue('Amontant', $montant, PDO::PARAM_STR);
		$res->bindValue('Avalidefrais', $validefrais, PDO::PARAM_STR);
		$res->execute();
	}

	//création d'un justificatif

	public function creerJustificatif($id, $matricule, $annee, $mois, $pdfjustificatif )
	{
		$res = PdoLBC::$monPdo->prepare("INSERT INTO justificatif (idjustificatif, pdfjustificatif, matricule, annee, mois)
		VALUES (:id, :pdfjustificatif, :matricule, :annee, :mois)");
		$res->bindValue('id',$id, PDO::PARAM_INT);
		$res->bindValue('matricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('annee', $annee, PDO::PARAM_INT);
		$res->bindValue('mois', $mois, PDO::PARAM_INT);
		$res->bindValue('pdfjustificatif', $pdfjustificatif, PDO::PARAM_STR);
		$res->execute();

	}


	//modification frais

	public function modifFrais($matricule, $idO,$anneeO,$moisO, $id,$annee,$mois,$qte)
	{
		$res = PdoLBC::$monPdo->prepare("UPDATE ajouteforfait
		SET idforfait = :idforfaitM, annee = :anneeM, mois = :moisM, quantite =  :quantiteM WHERE annee = :annee and mois = :mois and idforfait = :idforfait and matricule = :matricule");
		$res->bindValue('idforfaitM',$id, PDO::PARAM_INT);
		$res->bindValue('anneeM', $annee, PDO::PARAM_INT);
		$res->bindValue('moisM', $mois, PDO::PARAM_INT);
		$res->bindValue('quantiteM', $qte, PDO::PARAM_INT);
		$res->bindValue('matricule', $matricule, PDO::PARAM_INT);
		$res->bindValue('idforfait',$idO, PDO::PARAM_INT);
		$res->bindValue('annee', $anneeO, PDO::PARAM_INT);
		$res->bindValue('mois', $moisO, PDO::PARAM_INT);

		$res->execute();
	}

	//modification autre forfait

	public function modifAutreForfait($matricule,$anneeO,$moisO,$idfrais,$annee,$mois,$montant,$libelle,$datefrais)
	{
		$res = PdoLBC::$monPdo->prepare("UPDATE frais
		SET annee = :anneeM, mois = :moisM, montant =  :montantM, libelle = :libelleM, datefrais = :datefrais  WHERE annee = :annee and mois = :mois and idfrais = :idfrais and matricule = :matricule");
		$res->bindValue('idfrais',$idfrais, PDO::PARAM_INT);
		$res->bindValue('anneeM', $annee, PDO::PARAM_INT);
		$res->bindValue('moisM', $mois, PDO::PARAM_INT);
		$res->bindValue('libelleM', $libelle, PDO::PARAM_STR);
		$res->bindValue('montantM', $montant, PDO::PARAM_INT);
		$res->bindValue('datefrais', $datefrais, PDO::PARAM_INT);
		$res->bindValue('matricule', $matricule, PDO::PARAM_INT);
		$res->bindValue('annee', $anneeO, PDO::PARAM_INT);
		$res->bindValue('mois', $moisO, PDO::PARAM_INT);

		$res->execute();
	}

	//suppression frais

	public function supprFrais($matricule, $annee, $mois, $id)
	{
        $res = PdoLBC::$monPdo->prepare("DELETE FROM ajouteforfait WHERE matricule = :matricule AND annee = :annee AND mois = :mois AND idforfait = :id ");
        $res->bindValue('matricule', $matricule, PDO::PARAM_INT);
        $res->bindValue('annee', $annee, PDO::PARAM_STR);
        $res->bindValue('mois', $mois, PDO::PARAM_STR);
        $res->bindValue('id', $id, PDO::PARAM_INT);
        $res->execute();
	}



	//valider frais forfaitaires
	public function validerForfait($id, $matricule, $annee, $mois)
	{
		$res = PdoLBC::$monPdo->prepare("UPDATE ajouteforfait SET valideForfait = 1 WHERE annee = :annee and mois = :mois and idforfait = :idforfait and matricule = :matricule");
		$res->bindValue('matricule', $matricule, PDO::PARAM_INT);
        $res->bindValue('annee', $annee, PDO::PARAM_INT);
        $res->bindValue('mois', $mois, PDO::PARAM_INT);
        $res->bindValue('idforfait', $id, PDO::PARAM_INT);
		$res->execute();
	}
	

	//validation d'un autre frais
	public function validerAutreFrais($id, $matricule, $annee, $mois)
	{
		$res = PdoLBC::$monPdo->prepare("UPDATE frais SET validefrais = 1 WHERE annee = :annee and mois = :mois and idfrais = :id and matricule = :matricule");
		$res->bindValue('matricule', $matricule, PDO::PARAM_INT);
        $res->bindValue('annee', $annee, PDO::PARAM_INT);
        $res->bindValue('mois', $mois, PDO::PARAM_INT);
        $res->bindValue('id', $id, PDO::PARAM_INT);
		$res->execute();
	}

	//permmet de supprimer un autre fofait de la base de donnée
	
	public function supprAutreForfait($matricule, $annee, $mois, $id)
	{
        $res = PdoLBC::$monPdo->prepare("DELETE FROM frais WHERE matricule = :matricule AND annee = :annee AND mois = :mois AND idfrais = :id ");
        $res->bindValue('matricule', $matricule, PDO::PARAM_INT);
        $res->bindValue('annee', $annee, PDO::PARAM_INT);
        $res->bindValue('mois', $mois, PDO::PARAM_INT);
        $res->bindValue('id', $id, PDO::PARAM_INT);
        $res->execute();

	}

	//validation d'une note

	public function validerNote($matricule,$annee,$mois)
	{
		$res = PdoLBC::$monPdo->prepare("UPDATE fiche SET statut = 'V' WHERE matricule = :matricule AND annee = :annee AND mois = :mois");
		$res->bindValue('matricule', $matricule, PDO::PARAM_INT);
        $res->bindValue('annee', $annee, PDO::PARAM_INT);
        $res->bindValue('mois', $mois, PDO::PARAM_INT);
		$res->execute();
	}

	//permet de supprimer un justificatif de la base de donnée

	public function supprJustificatif($matricule, $annee, $mois, $idjustificatif)
	{
        $res = PdoLBC::$monPdo->prepare("DELETE FROM justificatif WHERE matricule = :matricule AND annee = :annee AND mois = :mois AND idjustificatif = :idjustificatif ");
        $res->bindValue('matricule', $matricule, PDO::PARAM_INT);
        $res->bindValue('annee', $annee, PDO::PARAM_INT);
        $res->bindValue('mois', $mois, PDO::PARAM_INT);
        $res->bindValue('idjustificatif', $idjustificatif, PDO::PARAM_INT);
        $res->execute();

	}

	//premet de recuperer les comptables qui sont associés à une fiche

	public function comptableDejaAssocieFiche($matricule, $annee, $mois, $idcomptable)
	{
		$req = "SELECT count(*) FROM envoye WHERE matricule = $matricule AND annee = $annee AND mois = $mois AND idcomptable = $idcomptable ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	//permet d'associé un comptable à une fiche

	public function associerComptableFiche($matricule, $annee, $mois, $idcomptable)
	{
		$res = PdoLBC::$monPdo->prepare("INSERT INTO envoye (matricule, annee, mois, idcomptable)
		VALUES (:matricule, :annee, :mois, :idcomptable)");
		$res->bindValue('matricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('annee',$annee, PDO::PARAM_INT);
		$res->bindValue('mois', $mois, PDO::PARAM_INT);
		$res->bindValue('idcomptable', $idcomptable, PDO::PARAM_INT);
		$res->execute();
	}

	//permet de compter les forfait dans la table ajouter forfait

	public function compterForfaitFiche($matricule, $annee, $mois)
	{
		$req = "SELECT count(*) FROM ajouteforfait WHERE matricule = ".$matricule." AND annee = ".$annee." AND mois = ".$mois."";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//permet de compter les forfait validés pour une fiche

	public function compterForfaitFicheValide($matricule, $annee, $mois)
	{
		$req = "SELECT count(*) FROM ajouteforfait WHERE matricule = ".$matricule." AND annee = ".$annee." AND mois = ".$mois." AND valideForfait = 1";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//permet de compter les autres forfaits dans la table frais

	public function compterAutreForfaitFiche($matricule, $annee, $mois)
	{
		$req = "SELECT count(*) FROM frais WHERE matricule = ".$matricule." AND annee = ".$annee." AND mois = ".$mois."";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//permet de compter les autres forfaits de la fiches qui sont validés

	public function compterAutreForfaitFicheValide($matricule, $annee, $mois)
	{
		$req = "SELECT count(*) FROM frais WHERE matricule = ".$matricule." AND annee = ".$annee." AND mois = ".$mois." AND validefrais = 1";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//permet de retourner les signatures asssociées à une fiche
	public function getSignaturesByFiches($matricule, $annee, $mois)
	{
		$req = "SELECT signature FROM comptable INNER JOIN envoye ON comptable.idcomptable = envoye.idcomptable where matricule = $matricule AND annee = $annee AND mois = $mois";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

}
