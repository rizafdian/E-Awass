<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Wasbid/periksa_model');
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
		$data['eviden'] = $this->periksa_model->getEviden($id_objek,$id_jadwal);
		$data['temuan'] = $this->periksa_model->getProgresTemuan($id_objek,$id_jadwal);
		$data['jadwal'] = $this->periksa_model->getJadwal($id_jadwal);
		$data['current_user'] = $this->auth_model->current_user();
		$this->template->load('template_pegawai', 'Wasbid/v_periksa', $data);
	}

	function eviden($a,$b)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_subobjek = $a;
		$id_jadwal = $b;		
		$data['subobjek'] = $this->periksa_model->getSubObj($id_subobjek);
		$data['pertanyaan'] = $this->periksa_model->getPertanyaanByID($id_subobjek);
		$data['jadwal'] = $this->periksa_model->getJadwal($id_jadwal);
		$data['temuan'] = $this->periksa_model->getTemuan($id_subobjek,$id_jadwal);
		$data['eviden'] = $this->periksa_model->getEvidenbyId($id_subobjek,$id_jadwal);
		$this->template->load('template_pegawai', 'Wasbid/v_eviden', $data);
	}

	function formEdit($a,$b)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_subobjek = $a;
		$id_jadwal = $b;
		
		 if ( !empty($_POST)) {
		 	$this->periksa_model->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		 }
 
		redirect(site_url('Wasbid/Periksa/eviden/'.$a.'/'.$b));
	}

	function formEdit_tl($a, $b)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$id_jadwal = $a;
		
		 if ( !empty($_POST)) {
		 	$this->periksa_model->update_tl();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		 }
 
		redirect(site_url('Wasbid/Periksa/eviden/'.$b.'/'.$a));

	}

	function formTambah($a,$b)
	{
		$data['current_user'] = $this->auth_model->current_user();

		 if ( !empty($_POST)) {
		 	$this->periksa_model->save();
            $this->session->set_flashdata('success ', 'Berhasil disimpan');
		 }	

		redirect(site_url('Wasbid/Periksa/eviden/'.$a.'/'.$b));
	}

	 public function delete($a,$b,$id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->periksa_model->delete($id)) {
           redirect(site_url('Wasbid/Periksa/eviden/'.$a.'/'.$b));
        } 
    } 

    public function delete_tl($a,$b,$id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->periksa_model->delete_tl($id)) {
           redirect(site_url('Wasbid/Periksa/eviden/'.$a.'/'.$b));
        } 
    }
}