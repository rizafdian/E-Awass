<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subarea extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("subarea_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["subarea"] = $this->subarea_model->getAll();
        $data['current_user'] = $this->auth_model->current_user();
        $this->template->load('template_admin', 'Superadmin/v_subarea',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $subarea = $this->subarea_model;
        $validation = $this->form_validation;
        $validation->set_rules($subarea->rules());

        if ($validation->run()) {
        $subarea->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["area"] = $this->subarea_model->getArea();
        $this->template->load('template_admin', 'Superadmin/v_subarea_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/subarea');
        $data['current_user'] = $this->auth_model->current_user();
        $subarea = $this->subarea_model;
        $validation = $this->form_validation;
        $validation->set_rules($subarea->rules());

        if ($validation->run()) {
            $subarea->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan', $data);
        }

         $data = [
            'subarea' =>  $subarea->getById($id),
            'area' =>  $this->subarea_model->getArea()
        ];

        if (!$data["subarea"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_subarea_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->subarea_model->delete($id)) {
            redirect(site_url('Superadmin/subarea'));
        }
    }
}