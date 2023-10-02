<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Wasda/periksa_model');
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
	}
 
	function index($a,$b)
	{
		$id_objek = $a;
		$id_jadwal = $b;
		$data['area'] = $this->periksa_model->getArea($id_objek);
		$data['subarea'] = $this->periksa_model->getAllSubarea($id_objek);
		$data['jadwal'] = $this->periksa_model->getJadwal($id_jadwal);
		$data['current_user'] = $this->auth_model->current_user();
		$this->template->load('template_wasda', 'Wasda/v_periksa', $data);
	}

	function subarea($a,$b)
	{
		$id_subobjek = $a;
		$id_jadwal = $b;		
		$data['instrumen'] = $this->periksa_model->getInstrumen($id_subobjek, $id_jadwal);
		$data['jadwal'] = $this->periksa_model->getJadwal($id_jadwal);
		$data['subarea'] = $this->periksa_model->getSubjoin($id_subobjek);
		$this->template->load('template_wasda', 'Wasda/v_periksa_subarea', $data);
	}

	function formEdit($a,$b)
	{
		$id_pertanyaan = $a;
		$id_jadwal = $b;
		
		 if ( !empty($_POST)) {
		 	$this->periksa_model->update();
            $this->session->set_flashdata('success ', 'Berhasil disimpan');
		 }
 
		$data['pertanyaan'] = $this->periksa_model->getPertanyaanByID($id_pertanyaan);
		$data['jadwal'] = $this->periksa_model->getJadwal($id_jadwal);
		$data['checklist'] = $this->periksa_model->getChecklist($id_jadwal,$id_pertanyaan);		
		$data['eviden'] = $this->periksa_model->getChecklist($id_jadwal,$id_pertanyaan);
		

		$this->template->load('template_wasda', 'Wasda/v_periksa_subarea_formedit', $data);
	}
}