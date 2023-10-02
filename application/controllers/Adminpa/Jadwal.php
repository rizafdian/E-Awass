<?php

class Jadwal extends CI_Controller
{
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('Adminpa/jadwal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $data['jadwal'] = $this->jadwal_model->getAll($id_pengadilan );
        $this->template->load('template_adminpa', 'Adminpa/v_jadwal',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $jadwal = $this->jadwal_model;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());
        $data['periode'] = $this->jadwal_model->getPeriode();
        if ($validation->run()) {
        $jadwal->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['pengadilan'] = $this->jadwal_model->getPengadilan($id_pengadilan);
        $this->template->load('template_adminpa', 'Adminpa/v_jadwal_tambah', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Admin/jadwal');

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
        $id_pengadilan = $data['current_user']->id_pengadilan;
        $data['pengadilan'] = $this->jadwal_model->getPengadilan($id_pengadilan);
        if (!$data["jadwal"]) show_404();
        
        $this->template->load('template_adminpa', 'Adminpa/v_jadwal_edit', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jadwal_model->delete($id)) {
            redirect(site_url('Adminpa/jadwal'));
        }
    }
}