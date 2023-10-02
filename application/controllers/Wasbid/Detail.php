<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller{
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Wasbid/detail_model');
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
		$this->template->load('template_pegawai', 'Wasbid/v_detail', $data);
	}

	public function upload($a)
    {
        $config['upload_path']    = './assets/upload/';
        $config['allowed_types']  = 'pdf';
        $config['max_size']       = 10000;
        $config['file_name']      = 'tlhp-'. $a;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $post = $this->input->post();

        if (!$this->upload->do_upload('tlhp')) {
        	print_r($config['upload_path']);
      		print_r($this->upload->display_errors()) ;
      	}
      	else{
      		$post['tlhp'] = $this->upload->data('file_name');
      		// print_r($post);
	        $this->detail_model->update($post);
	        $this->session->set_flashdata('pesan', 'Data berhasil diupload');
	        redirect(site_url('Wasbid/Detail/index/'.$a));
      	}
    }
}