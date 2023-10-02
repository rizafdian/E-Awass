<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("Adminpa/pengadilan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $data["pengadilan"] = $this->pengadilan_model->getAll($id_pengadilan);
        $this->template->load('template_adminpa', 'Adminpa/v_pengadilan',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $pengadilan = $this->pengadilan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengadilan->rules());

        if ($validation->run()) {
        $pengadilan->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->template->load('template_adminpa', 'Adminpa/v_pengadilan_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/pengadilan');
        $data['current_user'] = $this->auth_model->current_user();
        $pengadilan = $this->pengadilan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengadilan->rules());

        if ($validation->run()) {
            $pengadilan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan', $data);
        }

        $data["pengadilan"] = $pengadilan->getById($id);
        if (!$data["pengadilan"]) show_404();
        
        $this->template->load('template_adminpa', 'Adminpa/v_pengadilan_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pengadilan_model->delete($id)) {
            redirect(site_url('Adminpa/pengadilan'));
        }
    }
}