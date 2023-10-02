<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model
{

    public function getAllSubarea($id)
    {
        $this->db->from('tbl_subobjek');
        $this->db->where('id_objek',$id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getArea($id)
    {
        $this->db->from('tbl_objek');
        $this->db->where('id',$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getPeriode($id)
    {
        $this->db->select('tbl_periode.*');
        $this->db->from('tbl_periode');
        $this->db->join('tbl_jadwal','tbl_jadwal.id_periode = tbl_periode.id_periode');
        $this->db->where('tbl_jadwal.id_jadwal',$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getJadwal($id)
    {
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan','tbl_jadwal.id_pengadilan = tbl_pengadilan.id');
        $this->db->where('tbl_jadwal.id_jadwal',$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getTim($id)
    {
        $this->db->from('tbl_auditor');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getAllPertanyaan($a,$b)
    {
        $this->db->select('tbl_pertanyaan.*, tbl_checklist.keterangan');
        $this->db->from('tbl_objek');
         $this->db->join('tbl_subobjek', 'tbl_subobjek.id_objek = tbl_objek.id');
        $this->db->join('tbl_pertanyaan','tbl_pertanyaan.id_subobjek = tbl_subobjek.id_subobjek');
        $this->db->join('tbl_checklist','tbl_pertanyaan.id_pertanyaan = tbl_checklist.id_pertanyaan AND tbl_checklist.id_pengawasan='.$a,'left');
        $this->db->where('tbl_objek.id', $b);
        $query = $this->db->get()->result();
        return $query;
    }
}