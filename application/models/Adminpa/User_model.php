<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "t_user";

    public $id_user;
    public $nama;
    public $id_pengadilan;
    public $role;
    public $username;

    public function rules_user()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'id_pengadilan',
            'label' => 'id_pengadilan',
            'rules' => 'required'],

            ['field' => 'role',
            'label' => 'Role',
            'rules' => 'required|numeric'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required']
        ];
    }

    public function rules_password()
    {
        return [
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']
        ];
    }

    public function getUser($id)
    {
       // return $this->db->get($this->_table)->result();

        $this->db->select('t_user.*,tbl_pengadilan.pengadilan');
        $this->db->from('t_user');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = t_user.id_pengadilan');
        $this->db->where('t_user.id_pengadilan', $id);
        $this->db->where('role >', 3); 
        $query = $this->db->get()->result();
        return $query;
    }

    public function getPengadilan($id)
    {
       $this->db->from('tbl_pengadilan');
       $this->db->where('tbl_pengadilan.id', $id);
        $query = $this->db->get()->row();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->id_pengadilan = $post['id_pengadilan'];
        $this->role = $post['role'];
        $this->username = $post['username'];
        $this->password =  password_hash($post['password'], PASSWORD_DEFAULT);
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id"];
        $this->nama = $post['nama'];
        $this->id_pengadilan = $post['id_pengadilan'];
        $this->role = $post['role'];
        $this->username = $post['username'];
        return $this->db->update($this->_table, $this, array('id_user' => $post['id']));
    }

    public function updatepass()
    {
        $post = $this->input->post();
        $password = password_hash($post['password'], PASSWORD_DEFAULT);
        $data = array(
            'password' => $password
        );
        return $this->db->update($this->_table, $data, array('id_user' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }
}