<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Hawasbid/detail_model');
		$this->load->model('auth_model');
		 if(!$this->auth_model->current_user()){
		 	redirect('auth/login');
		 }
		
	} 
 
	function index($id = null)
	{
		$data['area'] = $this->detail_model->getArea();
		$data['jadwal'] = $this->detail_model->getDetail($id);
		$data['tim'] = $this->detail_model->getTim($id);
		$data['pe'] = $this->detail_model->getProgresEviden($id);
		$data['jt'] = $this->detail_model->getProgresTemuan($id);
		$data['tl'] = $this->detail_model->getProgresTL($id);
		$data['current_user'] = $this->auth_model->current_user();
		$this->template->load('template_wasbid', 'Hawasbid/v_detail', $data);
	}

	public function uploadtemuan($a)
    {
        $config['upload_path']    = './assets/upload/';
        $config['allowed_types']  = 'pdf';
        $config['max_size']       = 10000;
        $config['file_name']      = 'temuan-'. $a;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $post = $this->input->post();

        if (!$this->upload->do_upload('temuan')) {
        	print_r($config['upload_path']);
      		print_r($this->upload->display_errors()) ;
      	}
      	else{
      		$post['temuan'] = $this->upload->data('file_name');
	        $this->detail_model->update_temuan($post);
	        $this->session->set_flashdata('pesan', 'Data berhasil diupload');
	        redirect(site_url('Hawasbid/Detail/index/'.$a));
      	}
    } 

    public function uploadlhp($a)
    {
        $config['upload_path']    = './assets/upload/';
        $config['allowed_types']  = 'pdf';
        $config['max_size']       = 10000;
        $config['file_name']      = 'temuan-'. $a;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $post = $this->input->post();

        if (!$this->upload->do_upload('lhp')) {
        	print_r($config['upload_path']);
      		print_r($this->upload->display_errors()) ;
      	}
      	else{
      		$post['lhp'] = $this->upload->data('file_name');
	        $this->detail_model->update_lhp($post);
	        $this->session->set_flashdata('pesan', 'Data berhasil diupload');
	        redirect(site_url('Hawasbid/Detail/index/'.$a));
      	}
    }
}