<?php
include_once('./util/libs/fpdf.php');
require_once ('./controleurs/c_justificatif.php');


// paramètres en entrée
$annee=$_REQUEST["annee"];
$mois=$_REQUEST["mois"];
$matricule=$_REQUEST['matricule'];

class PDF extends FPDF
{
    function Write($h,$txt,$link='') // Surcharge de la fonction Write() afin d'accepter l'encodage utf8
    {
        parent::Write($h,utf8_decode($txt),$link);
    }
 function Writem ($h,$txtm) // Surcharge de la fonction Writem() afin d'accepter l'encodage utf8
    {
        parent::Writem($h,utf8_decode($txtm));
    }

    function Header()
    {
		global $annee;
		global $mois;
		global $matricule;
        $this->SetFont('Arial','B',20);
        $this->Cell(80);
        $this->Cell(30,10,'Note '.$mois.'/'.$annee,0,0,'C');
	    // $this->Cell(30,10,'Note ');
        $this->Ln(20);
    }

    function Footer()    {
        // On se positionne à 1.5 cm du bas
        $this->SetY(-10);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'le '.date("d/m/Y"),0,0,'C');
        $this->Cell(0,10,' page '.$this->PageNo().'/{nb}',0,0,'R');
    }
}

// Change la localisation afin de gérer les formats de date
// setlocale(LC_ALL, 'fr_FR');
date_default_timezone_set('Europe/Paris');
// --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
setlocale(LC_TIME, 'fr_FR.utf8','fra');

// Requête SQL
$result = $pdo->pdfmois($matricule,$annee,$mois);
$data = $result->fetch(PDO::FETCH_OBJ);
$leProfil=$pdo->getLeProfil($matricule);
$lesForfaits = $pdo->getLesForfaits($matricule, $annee, $mois);
$lesFrais = $pdo->getLesFrais($matricule, $annee, $mois);
$sommeForfait = 0;
$sommeFrais = 0;
// Création du PDF
$pdf = new PDF();
$pdf->AliasNbPages();

$i = 0;
$j = 0;
$marginLeft = $pdf->GetX();
$lastY = 0;

$pdf->AddPage();
$pdf->SetLineWidth(0.5);
$pdf->SetXY(10,28);

$pdf->SetFont('Arial','B',10); // En gras
$pdf->SetTextColor(0,0,0);

$pdf->SetFont('Arial','B',10); // En gras
$date=utf8_encode(strftime('%A %e %B %Y',strtotime($data->datefiche)));
$date=ucfirst($date);
$date=ucwords($date);
$pdf->Writem(4,$date);
$pdf->Ln(2);
$pdf->Writem(4,$leProfil['nom']);
$pdf->Writem(4,$leProfil['prenom']);
$pdf->Ln(5);

$pdf->Writem(4,'Forfait');
$pdf->Ln(2);

while($data && $j<count($lesForfaits))
{	

		$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Writem(4,$lesForfaits[$j]['libelleforfait']);
		$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(0,0,255);
		$pdf->Writem(4,$lesForfaits[$j]['montant']*$lesForfaits[$j]['quantite'].' Euros ');
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','B',9); // En gras
		$pdf->Ln(2);
		$sommeForfait = $lesForfaits[$j]['montant']*$lesForfaits[$j]['quantite'] + $sommeForfait;
   
    $j++;
}

$pdf->Ln(2);
$pdf->Writem(4,'Autre Forfait');
$pdf->Ln(2);

while($data && $i<count($lesFrais))
{	

		$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(0,0,0);
		$pdf->Writem(4,$lesFrais[$i]['libelle']);
		$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(0,0,255);
		$pdf->Writem(4,$lesFrais[$i]['montant'].' Euros ');
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','B',9); // En gras
		$pdf->Ln(2);
		$sommeFrais = $lesFrais[$i]['montant'] + $sommeFrais;
   
    $i++;
}

$pdf->Ln(5);

$total = $sommeForfait + $sommeFrais;
$pdf->SetFont('Arial','',9);
		$pdf->SetTextColor(255,0,0);
		$pdf->SetFont('Arial','B',9); 
		$pdf->Writem(4, 'Montant total : '.$total.' Euros');
		
$nomPDF = "Note".$annee."_".$mois;
$pdf->Output('F',$nomPDF.".pdf");

?>
	<h1><center>PDF du mois</h1>
	<div class="pdf-container">
	<iframe class="pdf-viewer" type="application/pdf" src="<?php echo $nomPDF?>.pdf">
	
	</iframe>
	</div>

	<style>
        .pdf-container {
            width: initial;
            padding: 20px;
            height: 600px;
        }

        .pdf-viewer {
            width: 100%;
            height: 100%;
        }
    </style>


	