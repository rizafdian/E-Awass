<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function getJadwalbyId($a)
    {

        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('tbl_jadwal.id_pengadilan',$a);
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $query = $this->db->get()->result();
        return $query;
    }

    public function getJadwal($a)
    {
        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $query = $this->db->get_where("tbl_jadwal", ["id_jadwal" => $a])->row();
        return $query;
    }

    public function getArea()
    {
        $this->db->from('tbl_objek');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getSubarea()
    {
        $this->db->from('tbl_subobjek');
        $query = $this->db->get()->result();
        return $query;
    }

     public function getTemuan($id)
    {
        $this->db->select('tbl_temuan.*, tbl_objek.id');
        $this->db->from('tbl_temuan');
        $this->db->join('tbl_subobjek','tbl_temuan.id_subobjek = tbl_subobjek.id_subobjek');
        $this->db->join('tbl_objek','tbl_objek.id = tbl_subobjek.id_objek');
        $this->db->where('tbl_temuan.id_jadwal', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getTim($id)
    {
        $this->db->from('tbl_auditor');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get()->result();
        return $query;
    }
}