<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model
{
    private $_table = "tbl_periode";

    public $id_periode;
    public $nama;
    public $tahun;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Periode',
            'rules' => 'required|numeric'],

            ['field' => 'tahun',
            'label' => 'Tahun',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_periode" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       
        $this->nama = $post['nama'];
        $this->tahun = $post['tahun'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_periode = $post["id"];
        $this->nama = $post["nama"];
        $this->tahun = $post["tahun"];
        return $this->db->update($this->_table, $this, array('id_periode' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_periode" => $id));
    }
}