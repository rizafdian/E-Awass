<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadilan_model extends CI_Model
{
    private $_table = "tbl_pengadilan";

    public $id;
    public $nama;
    public $nip;
    public $pengadilan;
    public $kota;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Ketua',
            'rules' => 'required'],

            ['field' => 'nip',
            'label' => 'NIP Ketua',
            'rules' => 'numeric'],

            ['field' => 'pengadilan',
            'label' => 'Nama Pengadilan',
            'rules' => 'required'],

            ['field' => 'kota',
            'label' => 'Kota',
            'rules' => 'required']
        ];
    }

    public function getAll($id)
    {
        $this->db->from('tbl_pengadilan');
        $this->db->where('tbl_pengadilan.id', $id);
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       
        $this->nama = $post['nama'];
        $this->nip = $post['nip'];
        $this->pengadilan = $post['pengadilan'];
        $this->kota = $post['kota'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama = $post["nama"];
        $this->nip = $post["nip"];
        $this->pengadilan = $post['pengadilan'];
        $this->kota = $post['kota'];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}