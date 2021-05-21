 <?php
 ob_start();
if(!isset($_REQUEST['ucf']))
     $ucf = 'afficherNotes';
else
	$ucf = $_REQUEST['ucf'];


$pdo = PdoLBC::getPdoLBC();
//permet d'aiguiller le site web dans les controlleurs principaux à l'aide de la variable $ucf
switch($ucf)
{
	case 'afficherNotes' :
		{ include("controleurs/c_afficherNotes.php");break;}
	case 'connexion' :
		{ include("controleurs/c_connexion.php");break; }
	case 'deconnexion' :
		{ include("controleurs/c_deconnexion.php");break; }
	case 'detailNote' :
		{ include("controleurs/c_detailNote.php");break;}
	case 'noteFrais' :
		{include("controleurs/c_noteFrais.php");break;}
	case 'forfait' :
		{ include("controleurs/c_forfait.php");break;}
	case 'autreForfait' :
        { include("controleurs/c_autreForfait.php");break;}
	case 'justificatifs' :
		{ include("controleurs/c_justificatif.php");break;}
	case 'valider' :
		{ include("controleurs/c_valider.php");break;}
	case 'realiserFrais' :
		{ include("controleurs/c_realiserFrais.php");break;}
}
include("vues/v_pied.php");
ob_end_flush();
?>