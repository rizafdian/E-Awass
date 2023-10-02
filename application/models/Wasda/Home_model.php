<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getById2()
    {

        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('jenis',2);
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $this->db->limit(7);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getbyId1($a)
    {

        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('jenis',1);
        $this->db->where('id_pengadilan',$a);
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $this->db->limit(7);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getAll()
    {

        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('jenis',2);
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $query = $this->db->get()->result();
        return $query;
    }

    public function getAllbyId($a)
    {

        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('jenis',1);
        $this->db->where('id_pengadilan',$a);
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $this->db->limit(7);
        $query = $this->db->get()->result();
        return $query;
    }
    
}