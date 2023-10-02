<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{
 
	function __construct(){

		parent::__construct();
		$this->load->model('Hawasbid/profile_model');
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }		
	}
 
	function index(){

		 if ( !empty($_POST)) {
		 	$this->profile_model->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		 }
		
		$data['current_user'] = $this->auth_model->current_user();
		$id_user = $this->auth_model->current_user()->id_user;
		$data['user'] = $this->profile_model->getById($id_user);
		$data['pengadilan'] = $this->profile_model->getPengadilan();
		$this->template->load('template_wasbid', 'Hawasbid/v_profile', $data);
	}

	function Pass()
	{
		 if ( !empty($_POST)) {
		 	$this->profile_model->updatepass();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
		 }
 
		$data['current_user'] = $this->auth_model->current_user();
		$id_user = $this->auth_model->current_user()->id_user;
		$data['user'] = $this->profile_model->getById($id_user);
		$data['pengadilan'] = $this->profile_model->getPengadilan();
		$this->template->load('template_wasbid', 'Hawasbid/v_edit_pass', $data);
	}
}