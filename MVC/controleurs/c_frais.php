 <?php
if(!isset($_REQUEST['ucf']))
     $ucf = 'afficherNotes';
else
	$ucf = $_REQUEST['ucf'];


$pdo = PdoLBC::getPdoLBC();

switch($ucf)
{
	case 'afficherNotes' :
		{ include("controleurs/c_afficherNotes.php");break;}
	case 'connexion' :
		{ include("controleurs/c_connexion.php");break; }
	case 'deconnexion' :
		{ include("controleurs/c_deconnexion.php");break; }
	case 'creerFrais' :
		{include("controleurs/c_noteFrais.php");break;}
	case 'validerFrais' :
		{ include("controleurs/c_validerFrais.php");break;}
	case 'realiserFrais' :
		{ include("controleurs/c_realiserFrais.php");break;}
	case 'forfait' :
		{ include("controleurs/c_forfait.php");break;}
	case 'autreForfait' :
        { include("controleurs/c_autreForfait.php");break;}
    case 'modifierFrais' :
        { include("controleurs/c_modificationFrais.php");break;}
    case 'supprimerFrais' :
        { include("controleurs/c_suppressionFrais.php");break;}
	case 'detailNote' :
        { include("controleurs/c_detailNote.php");break;}
}
include("vues/v_pied.php");
?>