<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("instrumen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data["instrumen"] = $this->instrumen_model->getAll();
        $this->template->load('template_admin', 'Superadmin/v_instrumen',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $instrumen_model = $this->instrumen_model;
        $validation = $this->form_validation;
        $validation->set_rules($instrumen_model->rules());
        if ($validation->run()) {
            $instrumen_model->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["subarea"] = $this->instrumen_model->getSubarea();
        $this->template->load('template_admin', 'Superadmin/v_instrumen_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/instrumen');

        // $data['current_user'] = $this->auth_model->current_user();

        $instrumen_model = $this->instrumen_model;
        $validation = $this->form_validation;
        $validation->set_rules($instrumen_model->rules());

        if ($validation->run()) {
            $instrumen_model->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

         $data = [
            'instrumen' =>  $instrumen_model->getById($id),
            'subarea' =>  $this->instrumen_model->getSubarea(),
            'current_user' => $this->auth_model->current_user()
        ];
        
        if (!$data["instrumen"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_instrumen_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->instrumen_model->delete($id)) {
            redirect(site_url('Superadmin/instrumen'));
        }
    }
}