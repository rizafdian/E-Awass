<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindaklanjut extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Wasda/tindaklanjut_model');
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
	}
 
	function index($a)
	{
		$data['temuan'] = $this->tindaklanjut_model->getTemuan($a);
		$data['jadwal'] = $this->tindaklanjut_model->getJadwal($a);
		$this->template->load('template_wasda', 'Wasda/v_tindak_lanjut', $data);
	}

	public function pdfmake($a)
	{
		$this->load->library('pdfgenerator');
 
		$data['area'] = $this->tindaklanjut_model->getArea();
		$data['periode'] = $this->tindaklanjut_model->getPeriode($a);
		$data['jadwal'] = $this->tindaklanjut_model->getJadwal($a);
		$data['temuan'] = $this->tindaklanjut_model->getTemuan($a);
		

		// filename dari pdf ketika didownload
        $file_pdf = 'laporan_tindaklanjut';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";
		 
	    $html = $this->load->view('Wasda/v_tindak_lanjut_pdf', $data, true);
	    
	    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
}