<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subarea_model extends CI_Model
{
    private $_table = "tbl_subobjek";

    public $id_subobjek;
    public $id_objek;
    public $nama;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Sub-Area',
            'rules' => 'required'],

            ['field' => 'id_objek',
            'label' => 'Area Pengawasan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();

        $this->db->select('tbl_subobjek.id_subobjek, tbl_subobjek.id_objek, tbl_subobjek.nama AS nama_subobjek, tbl_objek.nama');
        $this->db->from('tbl_subobjek');
        $this->db->join('tbl_objek', 'tbl_subobjek.id_objek = tbl_objek.id');
        $query = $this->db->get()->result();
        return $query; 
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_subobjek" => $id])->row();
    }

    public function getArea()
    {
        $this->db->from('tbl_objek');
        $query = $this->db->get()->result();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->id_objek= $post['id_objek'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_subobjek = $post["id"];
        $this->nama = $post["nama"];
        $this->id_objek = $post["id_objek"];
        return $this->db->update($this->_table, $this, array('id_subobjek' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_subobjek" => $id));
    }
}