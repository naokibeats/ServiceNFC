<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of core
 *
 * @author tafitasoa.andriamana
 */
require('tfpdf.php');
class Core extends tFPDF {
    //put your code here
    function entete($entete)
    {
            $this->Ln(10);
            // Logo
            $this->Image(base_url() . 'images/logo.png',10,10,30);
            // Police Arial gras 15
            $this->SetFont('Arial','B',15);
            // Décalage à droite
            $this->Cell(80);
            // Titre
            $this->Cell(30,10,$entete,0,0,'C');
            // Saut de ligne
            $this->Ln(25);
    }

    // Pied de page
    function Footer()
    {
            // Positionnement à 1,5 cm du bas
            $this->SetY(-10);
            // Police Arial italique 8
            //$this->SetFont('Arial','I',8);
            $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
            $this->SetFont('DejaVu','',9);
            
            $this->SetTextColor(95,97,97);
            // Numéro de page
            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            $this->Cell(0,10,"Maison de l'Emploi de la Région Anosy - Bazaribe 614 FORT DAUPHIN - E-mail : meraanosy@yahoo.fr - Site : www.mera.mg",0,0,'C');
            
            $this->SetY(-15);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    
    function date($date)
    {       
            $this->SetFont('Arial','',11);
            // Décalage à droite
            $this->Cell(80);
            // Titre
            $this->Cell(30,10,$date,0,0,'R');
            // Saut de ligne
            $this->Ln(25);
    }
    
    function titre($libelle, $date){
        // Arial 12
        //$this->SetFont('Arial','',12);
        // Ajoute une police Unicode (utilise UTF-8)
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',12);
        
        // Couleur de fond
        $this->SetFillColor(223,230,229);
        // Titre
        $this->Cell(0,6,"Objet: $libelle",0,0,'L',true);
        
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',10);
        $this->Cell(0,6,"le $date",0,1,'R',true);
        // Saut de ligne
        $this->Ln(10);
    }
    
    function corps($texte, $fin){
        // Lecture du fichier texte
        //$txt = file_get_contents($fichier);
        // Times 12
        // Ajoute une police Unicode (utilise UTF-8)
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',11);
        // Sortie du texte justifié
        $this->MultiCell(0,5,$texte);
        // Saut de ligne
        $this->Ln(15);
        
        $this->SetX(125);
        
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',12);
        
        $this->Cell(0,6, $fin);
        // Mention en italique
//        $this->SetFont('','I');
//        $this->Cell(0,5,"(fin de l'extrait)");
    }
    
    
    
    function BasicTable($header, $data)
    {
        // En-tête
        foreach($header as $col){
            $this->Cell(30,7,$col,1);
        }
        $this->Ln();
        foreach($data as $row){
            foreach($row as $col){
                $this->Cell(30,7,$col,1);
            }
            $this->Ln();
        }
      
    }

   
    
    
}

?>
