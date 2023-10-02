<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Temuan_model extends CI_Model
{

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

    public function getJadwal($id)
    {
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan','tbl_jadwal.id_pengadilan = tbl_pengadilan.id');
        $this->db->where('tbl_jadwal.id_jadwal',$id);
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

    public function getTim($id)
    {
        $this->db->from('tbl_auditor');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->db->set('tindak_lanjut', nl2br($post['tindak_lanjut']));
        $this->db->set('eviden_tindaklanjut', $post['eviden_tindaklanjut']);
        $this->db->where('id_temuan', $post['id_temuan']);
        return $this->db->update('tbl_temuan'); 
    }

    public function delete($id)
    {
         $this->db->set('tindak_lanjut', 'NULL', false);
         $this->db->set('eviden_tindaklanjut', 'NULL', false);
         $this->db->where('id_temuan ', $id);
         return $this->db->update('tbl_temuan');
    }

    
}