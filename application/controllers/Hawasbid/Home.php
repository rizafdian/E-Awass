<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
 
	function __construct(){

		parent::__construct();
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
		$this->load->model('Hawasbid/home_model');
	}
 
	function index(){

		$data['current_user'] = $this->auth_model->current_user();
		$id_pengadilan = $this->auth_model->current_user()->id_pengadilan;
		$data['jadwal'] = $this->home_model->getAll($id_pengadilan);
		$this->template->load('template_wasbid', 'Hawasbid/v_home', $data);
	}
}