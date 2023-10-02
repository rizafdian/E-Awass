<?php

class Jadwal extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("jadwal_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['jadwal'] = $this->jadwal_model->getAll();
        $this->template->load('template_admin', 'Superadmin/v_jadwal',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $jadwal = $this->jadwal_model;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());
        $data['periode'] = $this->jadwal_model->getPeriode();
        if ($validation->run()) {
        $jadwal->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

       $this->template->load('template_admin', 'Superadmin/v_jadwal_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/jadwal');

        $jadwal = $this->jadwal_model;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

         $data = [
            'jadwal' =>  $jadwal->getById($id),
            'periode' =>  $this->jadwal_model->getPeriode(),
            'current_user' => $this->auth_model->current_user()
        ];
      
        if (!$data["jadwal"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_jadwal_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jadwal_model->delete($id)) {
            redirect(site_url('Superadmin/jadwal'));
        }
    }
}