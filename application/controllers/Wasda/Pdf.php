<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pdf extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->model("Wasda/pdf_model");
    }
 
	public function pdfmake($a,$b)
	{
		$this->load->library('pdfgenerator');
 
		$id_objek = $a;
		$id_jadwal = $b;
		$data['area'] = $this->pdf_model->getArea($id_objek);
		$data['subarea'] = $this->pdf_model->getAllSubarea($id_objek);
		$data['periode'] = $this->pdf_model->getPeriode($id_jadwal);
		$data['jadwal'] = $this->pdf_model->getJadwal($id_jadwal);
		$data['tim'] = $this->pdf_model->getTim($id_jadwal);
		$data['pertanyaan'] = $this->pdf_model->getAllPertanyaan($id_jadwal, $id_objek);

		// filename dari pdf ketika didownload
        $file_pdf = 'laporan_kkp';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";
		 
	    $html = $this->load->view('coba', $data, true);
	    
	    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
}