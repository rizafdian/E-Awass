<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksatemuan extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Hawasbid/periksatemuan_model');
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
	} 
 
	function index($a,$b)
	{
		$id_objek = $a;
		$id_jadwal = $b;
		$data['area'] = $this->periksatemuan_model->getArea($id_objek);
		$data['subarea'] = $this->periksatemuan_model->getAllSubarea($id_objek);
		$data['eviden'] = $this->periksatemuan_model->getEviden($id_objek,$id_jadwal);
		$data['temuan'] = $this->periksatemuan_model->getProgresTemuan($id_objek,$id_jadwal);
		$data['jadwal'] = $this->periksatemuan_model->getJadwal($id_jadwal);
		$data['current_user'] = $this->auth_model->current_user();
		$this->template->load('template_wasbid', 'Hawasbid/v_periksa', $data);
	}

	function subarea($a,$b)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_subobjek = $a;
		$id_jadwal = $b;		
		$data['subobjek'] = $this->periksatemuan_model->getSubObj($id_subobjek);
		$data['pertanyaan'] = $this->periksatemuan_model->getPertanyaanById($id_subobjek);
		$data['jadwal'] = $this->periksatemuan_model->getJadwal($id_jadwal);
		$data['temuan'] = $this->periksatemuan_model->getTemuan($id_subobjek,$id_jadwal);
		$data['eviden'] = $this->periksatemuan_model->getEvidenById($id_subobjek,$id_jadwal);
		$this->template->load('template_wasbid', 'Hawasbid/v_periksa_temuan', $data);
	}

	function formEdit($a,$b,$c)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_subobjek = $a;
		$id_jadwal = $b;
		$id_temuan = $c;
		
		 if ( !empty($_POST)) {
		 	$this->periksatemuan_model->update();
            $this->session->set_flashdata('success ', 'Berhasil disimpan');
		 }
 
		$data['subobjek'] = $this->periksatemuan_model->getSubObj($id_subobjek);
		$data['jadwal'] = $this->periksatemuan_model->getJadwal($id_jadwal);
		$data['temuan'] = $this->periksatemuan_model->getTemuanbyID($c);
		

		$this->template->load('template_wasbid', 'Hawasbid/v_edit_temuan', $data);
	}

	function formTambah($a,$b)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_subobjek = $a;
		$id_jadwal = $b;
		
		 if ( !empty($_POST)) {
		 	$this->periksatemuan_model->save();
            $this->session->set_flashdata('success ', 'Berhasil disimpan');
		 }
 		
		$data['subobjek'] = $this->periksatemuan_model->getSubObj($id_subobjek);
		$data['jadwal'] = $this->periksatemuan_model->getJadwal($id_jadwal);
		
		$this->template->load('template_wasbid', 'Hawasbid/v_tambah_temuan', $data);
	}

	 public function delete($a,$b,$id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->periksatemuan_model->delete($id)) {
            redirect(site_url('Hawasbid/Periksatemuan/subarea/'.$a.'/'.$b));
        } 
    }
}