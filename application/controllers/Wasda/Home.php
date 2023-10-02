<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
 
	function __construct(){

		parent::__construct();
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
		$this->load->model('Wasda/home_model');
	}
 
	function index(){
		
		$data['current_user'] = $this->auth_model->current_user();
		$id_pengadilan = $this->auth_model->current_user()->id_pengadilan;
		$data['jadwal_daerah'] = $this->home_model->getById2();
		$data['jadwal_bidang'] = $this->home_model->getById1($id_pengadilan);
		$this->template->load('template_wasda', 'Wasda/v_home', $data);
	}

	function Daerah(){
		
		$data['current_user'] = $this->auth_model->current_user();
		$data['jadwal'] = $this->home_model->getAll();
		$this->template->load('template_wasda', 'Wasda/v_home_all', $data);
	}

	function Bidang(){
		
		$data['current_user'] = $this->auth_model->current_user();
		$id_pengadilan = $this->auth_model->current_user()->id_pengadilan;
		$data['jadwal'] = $this->home_model->getAllbyId($id_pengadilan);
		$this->template->load('template_wasda', 'Wasda/v_home_all', $data);
	}
}