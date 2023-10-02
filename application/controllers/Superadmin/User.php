<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("auth_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data["user"] = $this->user_model->getAll();
        $this->template->load('template_admin', 'Superadmin/v_user',  $data);
    }

    public function add()
    {
        $data['current_user'] = $this->auth_model->current_user();        
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules_user());
        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['pengadilan'] = $this->user_model->getPengadilan();
        $this->template->load('template_admin', 'Superadmin/v_user_tambah', $data); 
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('Superadmin/user');
       
        $data['current_user'] = $this->auth_model->current_user();
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules_user());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data['user'] = $user->getById($id);
        $data['pengadilan'] = $this->user_model->getPengadilan();
        if (!$data["user"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_user_edit', $data);
    }

    public function editpass($id = null)
    {
        if (!isset($id)) redirect('Superadmin/user');
       
        $data['current_user'] = $this->auth_model->current_user();
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules_password());

        if ($validation->run()) {
            $user->updatepass();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->template->load('template_admin', 'Superadmin/v_user_edit_pass', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->user_model->delete($id)) {
            redirect(site_url('Superadmin/user'));
        }
    }
}