<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getAll($id)
    {

        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('id_pengadilan',$id);
        $this->db->where('jenis',1);
        $this->db->order_by("tbl_jadwal.id_jadwal", "desc");
        $this->db->limit(7);
        $query = $this->db->get()->result();
        return $query;
    }
    
}