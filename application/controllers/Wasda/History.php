<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class History extends CI_Controller{
 
	function __construct(){

		parent::__construct();
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
		$this->load->model('Wasda/history_model');
	}
 
	function index($a, $b)
	{
		
		$data['current_user'] = $this->auth_model->current_user();
		$data['jadwal'] = $this->history_model->getJadwalbyId($a);
		$data['jdw'] = $this->history_model->getJadwal($b);
		$this->template->load('template_wasda', 'Wasda/v_history', $data);
	}

	function Detail($a)
	{
		$data['area'] = $this->history_model->getArea();
		$data['subarea'] = $this->history_model->getSubarea();
		$data['temuan'] = $this->history_model->getTemuan($a);
		$data['tim'] = $this->history_model->getTim($a);
		$data['current_user'] = $this->auth_model->current_user();
		$data['jadwal'] = $this->history_model->getJadwal($a);
		$this->template->load('template_wasda', 'Wasda/v_history_detail', $data);
	}

	// function Bidang(){
		
	// 	$data['current_user'] = $this->auth_model->current_user();
	// 	$id_pengadilan = $this->auth_model->current_user()->id_pengadilan;
	// 	$data['jadwal'] = $this->home_model->getAllbyId($id_pengadilan);
	// 	$this->template->load('template_wasda', 'Wasda/v_home_all', $data);
	// }
}