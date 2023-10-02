<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('t_user.*,tbl_pengadilan.pengadilan');
        $this->db->from('t_user');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = t_user.id_pengadilan');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getPengadilan()
    {
       $this->db->from('tbl_pengadilan');
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        $this->db->select('t_user.*,tbl_pengadilan.pengadilan, tbl_pengadilan.kota');
        $this->db->from('t_user');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = t_user.id_pengadilan');
        $this->db->where('t_user.id_user', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->db->set('nama', $post['nama']);
        $this->db->set('id_pengadilan', $post['id_pengadilan']);
        $this->db->set('username', $post['username']);
        $this->db->set('role', $post['role']);
        $this->db->where('id_user', $post['id']);
        return $this->db->update('t_user'); 
    }

    public function updatepass()
    {
        $post = $this->input->post();
        $password = password_hash($post['password'], PASSWORD_DEFAULT);
        $data = array(
            'password' => $password
        );
        return $this->db->update('t_user', $data, array('id_user' => $post['id']));
    }
}