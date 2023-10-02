<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tim_model extends CI_Model
{
    private $_table = "tbl_auditor";

    public $id_tim;
    public $id_jadwal;
    public $nama;
    public $role;
    public $jabatan;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Pengawas',
            'rules' => 'required'],

            ['field' => 'id_jadwal',
            'label' => 'Jadwal Pengawasan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('tbl_auditor.*, tbl_jadwal.*, tbl_pengadilan.pengadilan');
        $this->db->from('tbl_auditor');
        $this->db->join('tbl_jadwal', 'tbl_auditor.id_jadwal = tbl_jadwal.id_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_jadwal.id_pengadilan = tbl_pengadilan.id');
        $this->db->order_by("tbl_auditor.id_jadwal", "desc");
        $this->db->order_by("tbl_auditor.id_tim", "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tim" => $id])->row();
    }

    public function getJadwal()
    {
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $query = $this->db->get()->result();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->id_jadwal= $post['id_jadwal'];
        $this->role = $post['role'];
        $this->jabatan= $post['jabatan'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_tim = $post["id"];
        $this->nama = $post['nama'];
        $this->id_jadwal= $post['id_jadwal'];
        $this->role = $post['role'];
        $this->jabatan= $post['jabatan'];
        return $this->db->update($this->_table, $this, array('id_tim' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_tim" => $id));
    }
}