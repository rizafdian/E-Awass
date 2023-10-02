<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Temuan extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Hawasbid/temuan_model');
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
	}
 
	function index($a)
	{
		$data['area'] = $this->temuan_model->getArea();
		$data['subarea'] = $this->temuan_model->getSubarea();
		$data['temuan'] = $this->temuan_model->getTemuan($a);
		$data['jadwal'] = $this->temuan_model->getJadwal($a);
		$this->template->load('template_wasbid', 'Hawasbid/v_temuan', $data);
	}

	public function pdfmake($a)
	{
		$this->load->library('pdfgenerator');
 
		$data['area'] = $this->temuan_model->getArea();
		$data['periode'] = $this->temuan_model->getPeriode($a);
		$data['jadwal'] = $this->temuan_model->getJadwal($a);
		$data['temuan'] = $this->temuan_model->getTemuan($a);
		$data['tim'] = $this->temuan_model->getTim($a);

		// filename dari pdf ketika didownload
        $file_pdf = 'laporan_temuan';
        // setting paper
        $paper = 'F4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";
		 
	    $html = $this->load->view('Hawasbid/v_temuan_pdf', $data, true);
	    
	    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}
}