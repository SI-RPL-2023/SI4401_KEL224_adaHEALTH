<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FPDF;

class CertificateController extends Controller
{
    public function generate(Request $request)
    {
        $name = $request->input('name');
        
        // Create a new FPDF instance
        $pdf = new FPDF('L', 'mm', [1920, 1080]);
        $pdf->AddPage();
        
        // Add background image for PDF
        $pdf->Image(public_path('images/template.png'), 0, 0, 1920, 1080);
        
        // Set font and text color
        $pdf->SetFont('Helvetica', 'B', 150);
        $pdf->SetTextColor(0, 0, 0);
        
        // Get the width and height of the PDF page
        $pageWidth = $pdf->GetPageWidth();
        $pageHeight = $pdf->GetPageHeight();
        
        // Calculate the position for the name text
        $textWidth = $pdf->GetStringWidth($name);
        $textHeight = 10; // Adjust this value as needed
        $x = ($pageWidth - $textWidth) / 2;
        $y = ($pageHeight - $textHeight) / 2;
        
        // Add the name to the certificate
        $pdf->Text($x, $y, $name);

        // Output the PDF
        return $pdf->Output('certificate.pdf', 'I');
    }
}