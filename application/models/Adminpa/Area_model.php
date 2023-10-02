<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model
{
    private $_table = "tbl_objek";

    public $id;
    public $nama;
    public $tujuan;
    public $metode;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Area',
            'rules' => 'required'],

            ['field' => 'tujuan',
            'label' => 'Tujuan Pengawasan',
            'rules' => 'required'],

            ['field' => 'metode',
            'label' => 'Metode Pengawasan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->tujuan = $post['tujuan'];
        $this->metode = $post['metode'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->tujuan = $post["tujuan"];
        $this->metode = $post['metode'];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}