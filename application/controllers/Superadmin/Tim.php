<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("tim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data["tim"] = $this->tim_model->getAll();
        $this->template->load('template_admin', 'Superadmin/v_tim',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $tim_model = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim_model->rules());
        if ($validation->run()) {
            $tim_model->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jadwal"] = $this->tim_model->getJadwal();
        $this->template->load('template_admin', 'Superadmin/v_tim_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/tim');
    
        $tim_model = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim_model->rules());

        $data = [
            'tim' =>  $tim_model->getById($id),
            'jadwal' =>  $this->tim_model->getJadwal(),
            'current_user' => $this->auth_model->current_user()
        ];

        if ($validation->run()) {
            $tim_model->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan' , $data);
        }
        
        if (!$data["tim"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_tim_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->tim_model->delete($id)) {
            redirect(site_url('Superadmin/tim'));
        }
    }
}