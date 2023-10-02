<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// panggil autoload dompdf nya
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator {
    public function generate($html, $filename='', $paper = '', $orientation = '', $stream=TRUE)
    {   
        $options = new Options();
        $options->setChroot(FCPATH);
        // $dompdf->set_base_path("../../../assets/template/dist/css/");
        // $options->setDefaultFont('Times New Roman');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $text = "Halaman $pageNumber dari $pageCount";
            $font = $fontMetrics->getFont('arial');
            $pageWidth = $canvas->get_width();
            $pageHeight = $canvas->get_height();
            $size = 10;
            $width = $fontMetrics->getTextWidth($text, $font, $size);
            $canvas->text($pageWidth - $width - 20, $pageHeight - 30, $text, $font, $size);
        });
        $dompdf->stream($filename.".pdf", array("Attachment" => false));
        
    }
}