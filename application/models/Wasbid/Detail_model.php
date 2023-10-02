<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_model extends CI_Model
{
 
    public function getDetail($id)
    {
        $this->db->select('tbl_jadwal.*, tbl_pengadilan.pengadilan, tbl_periode.*');
        $this->db->join('tbl_pengadilan', 'tbl_pengadilan.id = tbl_jadwal.id_pengadilan');
        $this->db->join('tbl_periode', 'tbl_jadwal.id_periode = tbl_periode.id_periode');
        $query = $this->db->get_where("tbl_jadwal", ["id_jadwal" => $id])->row();
        return $query;
    }

    public function getTim($id)
    {
        $this->db->from('tbl_auditor');
        $this->db->where('id_jadwal',$id);
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_subobjek" => $id])->row();
    }

    public function getArea()
    {
        $this->db->from('tbl_objek');
        $query = $this->db->get()->result();
        return $query;
    }

    public function update($post)
    {
        $this->db->set('dok_tindaklanjut', $post['tlhp']);
        $this->db->where('id_jadwal', $post['id_jadwal']);
        return $this->db->update('tbl_jadwal'); 
    }

     public function getProgresEviden($id)
    {
        $temp = array();
        $object = $this->db->query("SELECT id FROM tbl_objek")->result_array();
        foreach ($object as $key => $value) {
        $sub_objek = $this->db->query("SELECT id FROM tbl_subobjek as a, tbl_objek as b WHERE a.id_objek = b.id AND b.id = $value[id]")->num_rows();
        $eviden = $this->db->query("SELECT COUNT(id_eviden) as total FROM tbl_eviden as a, tbl_subobjek as b WHERE a.id_subobjek = b.id_subobjek AND b.id_objek = $value[id] AND a.id_jadwal = $id")->row();
        $temp [] = $eviden->total .'/'. $sub_objek;
        }

        return $temp;
    }

    public function getProgresTemuan($id)
    {
        $temp = array();
        $object = $this->db->query("SELECT id FROM tbl_objek")->result_array();
        foreach ($object as $key => $value) {
        $sub_objek = $this->db->query("SELECT id FROM tbl_subobjek as a, tbl_objek as b WHERE a.id_objek = b.id AND b.id = $value[id]")->num_rows();
        $temuan = $this->db->query("SELECT COUNT(id_temuan) as total FROM tbl_temuan as a, tbl_subobjek as b WHERE a.id_subobjek = b.id_subobjek AND b.id_objek = $value[id] AND a.id_jadwal = $id")->row();
        $temp [] = $temuan->total ;
        }
        return $temp;
    }

     public function getProgresTL($id)
    {
        $temp = array();
        $object = $this->db->query("SELECT id FROM tbl_objek")->result_array();
        foreach ($object as $key => $value) {
        $sub_objek = $this->db->query("SELECT id FROM tbl_subobjek as a, tbl_objek as b WHERE a.id_objek = b.id AND b.id = $value[id]")->num_rows();
        $temuan = $this->db->query("SELECT COUNT(id_temuan) as total FROM tbl_temuan as a, tbl_subobjek as b WHERE a.id_subobjek = b.id_subobjek AND b.id_objek = $value[id] AND a.id_jadwal = $id")->row();
        $tl = $this->db->query("SELECT COUNT(id_temuan) as total FROM tbl_temuan as a, tbl_subobjek as b WHERE a.id_subobjek = b.id_subobjek AND b.id_objek = $value[id] AND a.id_jadwal = $id AND a.tindak_lanjut != ''")->row();
        $temp [] = $tl->total .'/'. $temuan->total;
        }
        return $temp;
    }
}