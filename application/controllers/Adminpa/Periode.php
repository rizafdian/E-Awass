<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("periode_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data["periode"] = $this->periode_model->getAll();
        $this->template->load('template_admin', 'Superadmin/v_periode',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $periode = $this->periode_model;
        $validation = $this->form_validation;
        $validation->set_rules($periode->rules());

        if ($validation->run()) {
        $periode->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->template->load('template_admin', 'Superadmin/v_periode_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/periode');
        $data['current_user'] = $this->auth_model->current_user();
        $periode = $this->periode_model;
        $validation = $this->form_validation;
        $validation->set_rules($periode->rules());

        if ($validation->run()) {
            $periode->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["periode"] = $periode->getById($id);
        if (!$data["periode"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_periode_edit', $data);
    }
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->periode_model->delete($id)) {
            redirect(site_url('Superadmin/periode'));
        }
    }
}