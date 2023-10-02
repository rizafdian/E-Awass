<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('Adminpa/tim_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $data['tim'] = $this->tim_model->getAll($id_pengadilan);
        $this->template->load('template_adminpa', 'Adminpa/v_tim',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $tim_model = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim_model->rules());
        if ($validation->run()) {
            $tim_model->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['jadwal'] = $this->tim_model->getJadwal($id_pengadilan);
        $this->template->load('template_adminpa', 'Adminpa/v_tim_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Admin/tim');
        $tim_model = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim_model->rules());
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        if ($validation->run()) {
            $tim_model->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan' , $data);
        }
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $data['tim'] = $this->tim_model->getById($id);
        $data['jadwal'] = $this->tim_model->getJadwal($id_pengadilan);    
        if (!$data['tim']) show_404();
        
        $this->template->load('template_adminpa', 'Adminpa/v_tim_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->tim_model->delete($id)) {
            redirect(site_url('Admin/tim'));
        }
    }
}