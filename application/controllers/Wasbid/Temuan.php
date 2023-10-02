<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Temuan extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Wasbid/temuan_model');
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
		$this->template->load('template_pegawai', 'Wasbid/v_temuan', $data);
	}

	function formEdit($a)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_jadwal = $a;
		
		 if ( !empty($_POST)) {
		 	$this->temuan_model->update();
            $this->session->set_flashdata('success ', 'Berhasil disimpan');
		 }
 
		redirect(site_url('Wasbid/Temuan/index/'.$a));
	}

	 public function delete($a,$id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->temuan_model->delete($id)) {
           redirect(site_url('Wasbid/Temuan/index/'.$a));
        } 
    }

	public function pdfmake($a)
	{
		$this->load->library('pdfgenerator');
 
 		// $data['area'] = $this->temuan_model->getArea();
		// $data['subarea'] = $this->temuan_model->getSubarea();
		// $data['periode'] = $this->temuan_model->getPeriode($a);
		// $data['jadwal'] = $this->temuan_model->getJadwal($a);
		// $data['temuan'] = $this->temuan_model->getTemuan($a);
		// $data['tim'] = $this->temuan_model->getTim($a);

		$data['area'] = $this->temuan_model->getArea();
		$data['subarea'] = $this->temuan_model->getSubarea();
		$data['periode'] = $this->temuan_model->getPeriode($a);
		$data['jadwal'] = $this->temuan_model->getJadwal($a);
		$data['temuan'] = $this->temuan_model->getTemuan($a);
		// $data['tim'] = $this->temuan_model->getTim($a);

		// filename dari pdf ketika didownload
        $file_pdf = 'laporan_tindak lanjut';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";
		 
	    $html = $this->load->view('Wasbid/v_tindaklanjut_pdf', $data, true);
	    
	    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);


	}
}