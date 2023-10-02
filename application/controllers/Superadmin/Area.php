<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("area_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data["area"] = $this->area_model->getAll();
        $this->template->load('template_admin', 'Superadmin/v_area',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $area = $this->area_model;
        $validation = $this->form_validation;
        $validation->set_rules($area->rules());

        if ($validation->run()) {
        $area->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->template->load('template_admin', 'Superadmin/v_area_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/area');
        $data['current_user'] = $this->auth_model->current_user();
        $area = $this->area_model;
        $validation = $this->form_validation;
        $validation->set_rules($area->rules());

        if ($validation->run()) {
            $area->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["area"] = $area->getById($id);
        if (!$data["area"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_area_edit', $data);
    
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->area_model->delete($id)) {
            redirect(site_url('Superadmin/area'));
        }
    }
}