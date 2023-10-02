<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $_table = "tbl_jadwal";

    public $id_jadwal;
    public $id_periode;
    public $jenis;
    public $id_pengadilan;
    public $no_sk;
    public $no_st;
    public $tgl_mulai;
    public $tgl_selesai;

    public function rules()
    {
        return [
            
            ['field' => 'no_sk',
            'label' => 'Nomor SK',
            'rules' => 'required'],

            ['field' => 'no_st',
            'label' => 'Nomor ST',
            'rules' => 'required'],

            ['field' => 'tgl_mulai',
            'label' => 'Tanggal Mulai',
            'rules' => 'required'],

            ['field' => 'tgl_selesai',
            'label' => 'Tanggal Selesai',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jadwal" => $id])->row();
    }

    public function getPeriode()
    {
        $this->db->from('tbl_periode');
        $query = $this->db->get()->result();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->jenis = $post['jenis'];
        $this->id_periode = $post['id_periode'];
        $this->id_pengadilan = $post['id_pengadilan'];
        $this->no_sk = $post['no_sk'];
        $this->no_st = $post['no_st'];
        $this->tgl_mulai = $post['tgl_mulai'];
        $this->tgl_selesai = $post['tgl_selesai'];
        $this->status = 'Belum';
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jadwal = $post["id"];
        $this->jenis = $post['jenis'];
        $this->id_periode = $post['id_periode'];
        $this->id_pengadilan = $post['id_pengadilan'];
        $this->no_sk = $post['no_sk'];
        $this->no_st = $post['no_st'];
        $this->tgl_mulai = $post['tgl_mulai'];
        $this->tgl_selesai = $post['tgl_selesai'];
        $this->status = $post['status'];
        return $this->db->update($this->_table, $this, array('id_jadwal' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jadwal" => $id));
    }
}