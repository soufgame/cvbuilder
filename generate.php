<?php
// Inclure la bibliothèque TCPDF
require_once('tcpdf/tcpdf.php');

// Vérifier si les données ont été envoyées via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $poste = $_POST['poste'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $competences = $_POST['competences'];
    $langues = $_POST['langues'];
    $interets = $_POST['interets'];
    $profil = $_POST['profil'];
    $experiences = $_POST['experiences'];
    $formation = $_POST['formation'];
    $certifications = $_POST['certifications'];
    $projets = $_POST['projets'];
    $references = $_POST['references'];

    // Créer une classe personnalisée qui étend TCPDF
    class MYPDF extends TCPDF {
        protected $nom;
        protected $poste;
        
        // Définir les propriétés nom et poste au lieu de remplacer setHeaderData
        public function setNomPoste($nom, $poste) {
            $this->nom = $nom;
            $this->poste = $poste;
        }

        // En-tête de page
        public function Header() {
            // Couleurs
            $mainBlue = array(41, 128, 185); // Bleu plus vif
            $darkBlue = array(44, 62, 80); // Bleu foncé
            
            // En-tête avec dégradé
            $this->Rect(0, 0, $this->getPageWidth(), 40, 'F', array(), $mainBlue);
            
            // Position pour le nom et le poste
            $this->SetY(12);
            $this->SetTextColor(255, 255, 255);
            $this->SetFont('helvetica', 'B', 28);
            $this->Cell(0, 12, $this->nom, 0, 1, 'C');
            
            $this->SetFont('helvetica', '', 16);
            $this->Cell(0, 8, $this->poste, 0, 1, 'C');
            
            // Ligne de séparation élégante
            $this->SetDrawColor(255, 255, 255);
            $this->SetLineWidth(0.5);
            $this->Line(40, 42, $this->getPageWidth() - 40, 42);
        }

        // Pied de page
        public function Footer() {
            // Position à 15 mm du bas
            $this->SetY(-15);
            $this->SetFont('helvetica', 'I', 8);
            $this->SetTextColor(128, 128, 128);
            // Numéro de page à gauche
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'L');
            // Année à droite
            $this->Cell(0, 10, date('Y'), 0, 0, 'R');
        }
    }

    // Créer un objet PDF personnalisé
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // Utiliser notre méthode personnalisée au lieu de setHeaderData
    $pdf->setNomPoste($nom, $poste);

    // Définir les informations du document
    $pdf->SetCreator('CV Generator');
    $pdf->SetAuthor($nom);
    $pdf->SetTitle('Curriculum Vitae - ' . $nom);
    $pdf->SetSubject('CV Professional');
    $pdf->SetKeywords('CV, Resume, ' . $nom . ', ' . $poste);

    // Définir les marges
    $pdf->SetMargins(20, 50, 20);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Définir la césure automatique
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Définir le facteur d'échelle des images
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Ajouter une page
    $pdf->AddPage();

    // Couleurs
    $mainBlue = array(41, 128, 185); // Bleu plus vif
    $lightBlue = array(52, 152, 219); // Bleu clair
    $darkBlue = array(44, 62, 80); // Bleu foncé
    $textGrey = array(85, 85, 85); // Gris pour le texte

    // Section Contact et informations personnelles
    $pdf->SetFillColor(240, 248, 255); // Bleu très clair
    $pdf->Rect(20, 47, $pdf->getPageWidth() - 40, 30, 'F', array('BR' => 5, 'BL' => 5));
    
    // Structure des contacts en colonnes
    $pdf->SetTextColor($darkBlue[0], $darkBlue[1], $darkBlue[2]);
    $pdf->SetY(50);
    $pdf->SetX(25);
    $pdf->SetFont('helvetica', 'B', 11);
    
    // Email
    $pdf->SetX(25);
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->Cell(25, 7, 'Email:', 0, 0);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->Cell(0, 7, $email, 0, 1);
    
    // Téléphone
    $pdf->SetX(25);
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->Cell(25, 7, 'Téléphone:', 0, 0);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->Cell(0, 7, $telephone, 0, 1);
    
    // Adresse
    $pdf->SetX(25);
    $pdf->SetFont('helvetica', 'B', 11);
    $pdf->Cell(25, 7, 'Adresse:', 0, 0);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 7, $adresse, 0, 'L');

    // Fonction pour créer des titres de section avec style
    function addSectionTitle($pdf, $title) {
        $pdf->Ln(5);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetTextColor(41, 128, 185);
        $pdf->Cell(0, 10, mb_strtoupper($title, 'UTF-8'), 0, 1, 'L');
        $pdf->SetDrawColor(41, 128, 185);
        $pdf->SetLineWidth(0.8);
        $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 80, $pdf->GetY());
        $pdf->SetLineWidth(0.2);
        $pdf->Ln(3);
    }

    // Profil Professionnel
    addSectionTitle($pdf, 'Profil Professionnel');
    $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, $profil, 0, 'J');
    
    // Expériences Professionnelles
    addSectionTitle($pdf, 'Expériences Professionnelles');
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, $experiences, 0, 'J');
    
    // Formation
    addSectionTitle($pdf, 'Formation');
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, $formation, 0, 'J');
    
    // Mise en page à deux colonnes pour les sections courtes
    $startY = $pdf->GetY() + 5;
    $columnWidth = ($pdf->getPageWidth() - 50) / 2;
    
    // Première colonne
    $pdf->SetY($startY);
    $pdf->SetX(20);
    
    // Compétences
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetTextColor(41, 128, 185);
    $pdf->Cell($columnWidth, 10, 'COMPÉTENCES', 0, 1, 'L');
    $pdf->SetDrawColor(41, 128, 185);
    $pdf->SetLineWidth(0.8);
    $pdf->Line(20, $pdf->GetY(), 20 + 65, $pdf->GetY());
    $pdf->SetLineWidth(0.2);
    $pdf->Ln(3);
    
    // Liste des compétences
    $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
    $pdf->SetFont('helvetica', '', 11);
    $competencesArray = explode(',', $competences);
    foreach ($competencesArray as $comp) {
        $comp = trim($comp);
        if (!empty($comp)) {
            $pdf->SetX(25);
            $pdf->Cell(5, 6, '•', 0, 0); // Bullet point
            $pdf->Cell(0, 6, $comp, 0, 1);
        }
    }
    
    // Langues
    $pdf->SetY($pdf->GetY() + 5);
    $pdf->SetX(20);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetTextColor(41, 128, 185);
    $pdf->Cell($columnWidth, 10, 'LANGUES', 0, 1, 'L');
    $pdf->SetDrawColor(41, 128, 185);
    $pdf->SetLineWidth(0.8);
    $pdf->Line(20, $pdf->GetY(), 20 + 40, $pdf->GetY());
    $pdf->SetLineWidth(0.2);
    $pdf->Ln(3);
    
    // Liste des langues
    $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
    $pdf->SetFont('helvetica', '', 11);
    $languesArray = explode(',', $langues);
    foreach ($languesArray as $langue) {
        $langue = trim($langue);
        if (!empty($langue)) {
            $pdf->SetX(25);
            $pdf->Cell(5, 6, '•', 0, 0); // Bullet point
            $pdf->Cell(0, 6, $langue, 0, 1);
        }
    }
    
    // Deuxième colonne
    $secondColumnX = 20 + $columnWidth + 10;
    $pdf->SetY($startY);
    $pdf->SetX($secondColumnX);
    
    // Certifications
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetTextColor(41, 128, 185);
    $pdf->Cell($columnWidth, 10, 'CERTIFICATIONS', 0, 1, 'L');
    $pdf->SetDrawColor(41, 128, 185);
    $pdf->SetLineWidth(0.8);
    $pdf->Line($secondColumnX, $pdf->GetY(), $secondColumnX + 70, $pdf->GetY());
    $pdf->SetLineWidth(0.2);
    $pdf->Ln(3);
    
    // Liste des certifications
    $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
    $pdf->SetFont('helvetica', '', 11);
    $certificationsArray = explode(',', $certifications);
    foreach ($certificationsArray as $cert) {
        $cert = trim($cert);
        if (!empty($cert)) {
            $pdf->SetX($secondColumnX + 5);
            $pdf->Cell(5, 6, '•', 0, 0); // Bullet point
            $pdf->Cell(0, 6, $cert, 0, 1);
        }
    }
    
    // Centres d'intérêt
    $interetY = $pdf->GetY() + 5;
    $pdf->SetY($interetY);
    $pdf->SetX($secondColumnX);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetTextColor(41, 128, 185);
    $pdf->Cell($columnWidth, 10, 'CENTRES D\'INTÉRÊT', 0, 1, 'L');
    $pdf->SetDrawColor(41, 128, 185);
    $pdf->SetLineWidth(0.8);
    $pdf->Line($secondColumnX, $pdf->GetY(), $secondColumnX + 80, $pdf->GetY());
    $pdf->SetLineWidth(0.2);
    $pdf->Ln(3);
    
    // Liste des centres d'intérêt
    $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
    $pdf->SetFont('helvetica', '', 11);
    $interetsArray = explode(',', $interets);
    foreach ($interetsArray as $interet) {
        $interet = trim($interet);
        if (!empty($interet)) {
            $pdf->SetX($secondColumnX + 5);
            $pdf->Cell(5, 6, '•', 0, 0); // Bullet point
            $pdf->Cell(0, 6, $interet, 0, 1);
        }
    }
    
    // Déterminer la position Y maximale entre les deux colonnes
    $maxY = max($pdf->GetY(), $interetY + 60);
    $pdf->SetY($maxY + 5);
    
    // Projets notables
    addSectionTitle($pdf, 'Projets Notables');
    $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->MultiCell(0, 6, $projets, 0, 'J');
    
    // Références
    if (!empty($references)) {
        $pdf->SetY(max($pdf->GetY() + 5, 240));
        $pdf->SetFillColor(240, 248, 255); // Bleu très clair
        $pdf->Rect(20, $pdf->GetY(), $pdf->getPageWidth() - 40, 15, 'F', array('BR' => 5, 'BL' => 5));
        $pdf->Ln(2);
        
        $pdf->SetFont('helvetica', 'B', 11);
        $pdf->SetTextColor($darkBlue[0], $darkBlue[1], $darkBlue[2]);
        $pdf->Cell(0, 6, 'Références disponibles sur demande:', 0, 1, 'C');
        
        $pdf->SetFont('helvetica', 'I', 10);
        $pdf->SetTextColor($textGrey[0], $textGrey[1], $textGrey[2]);
        $pdf->MultiCell(0, 5, $references, 0, 'C');
    }

    // Sortie du PDF
    $pdf->Output('CV_' . $nom . '.pdf', 'I');
} else {
    echo "Aucune donnée soumise.";
}
?>