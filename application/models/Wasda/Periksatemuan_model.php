<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periksatemuan_model extends CI_Model
{

    public function getAllSubarea($id)
    {
        $this->db->from('tbl_subobjek');
        $this->db->where('id_objek',$id);
        $query = $this->db->get()->result();
        return $query;
    } 
  
    public function getSubObj($id)
    {
        $this->db->select('tbl_subobjek.*, tbl_objek.nama as nama_objek');
        $this->db->from('tbl_subobjek');
        $this->db->join('tbl_objek','tbl_objek.id = tbl_subobjek.id_objek');
        $this->db->where('id_subobjek',$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getEviden($a,$b)
    {
        $temp = array();
        $sub_objek = $this->db->query("SELECT id_subobjek FROM tbl_subobjek  WHERE id_objek = $a")->result_array();
        foreach ($sub_objek as $key => $value) {
            $eviden = $this->db->query("SELECT COUNT(id_eviden) as total FROM tbl_eviden  WHERE id_subobjek = $value[id_subobjek] AND id_jadwal = $b")->row();
            $temp [] = $eviden->total;
        }

        return $temp;
    }

    public function getProgresTemuan($a,$b)
    {
        $temp = array();
        $sub_objek = $this->db->query("SELECT id_subobjek FROM tbl_subobjek  WHERE id_objek = $a")->result_array();
        foreach ($sub_objek as $key => $value) {
            $temuan = $this->db->query("SELECT COUNT(id_temuan) as total FROM tbl_temuan as a WHERE id_subobjek = $value[id_subobjek] AND id_jadwal = $b")->row();
            $temp [] = $temuan->total ;
        }
        return $temp;
    }

    public function getJadwal($id)
    {
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_pengadilan','tbl_jadwal.id_pengadilan = tbl_pengadilan.id');
        $this->db->where('tbl_jadwal.id_jadwal',$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getTemuan($a ,$b)
    {
        $this->db->from('tbl_temuan');
        $this->db->where('tbl_temuan.id_subobjek',$a);
        $this->db->where('tbl_temuan.id_jadwal',$b);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getTemuan_byObjek($a ,$b)
    {
        $this->db->select('tbl_temuan.*');
        $this->db->from('tbl_temuan');
        $this->db->join('tbl_subobjek','tbl_subobjek.id_subobjek = tbl_temuan.id_subobjek');
        $this->db->join('tbl_objek','tbl_objek.id = tbl_subobjek.id_objek');
        $this->db->where('tbl_objek.id',$b);
        $this->db->where('tbl_temuan.id_jadwal',$a);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getTemuanbyID($id)
    {
        $this->db->from('tbl_temuan');
        $this->db->where('tbl_temuan.id_temuan',$id);
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

    public function getTim($id)
    {
        $this->db->from('tbl_auditor');
        $this->db->where('id_jadwal',$id);
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

    public function getPertanyaanById($id)
    {
        $this->db->from('tbl_pertanyaan');
        $this->db->where('id_subobjek',$id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getEvidenById($a,$b)
    {
        $this->db->from('tbl_eviden');
        $this->db->where('id_subobjek',$a);
        $this->db->where('id_jadwal',$b);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getSubarea($id)
    {
        $this->db->from('tbl_subobjek');
        $this->db->where('id_subobjek',$id);
        $query = $this->db->get()->row();
        return $query;
    }


    public function update()
    {
        $post = $this->input->post();
        $this->db->set('kondisi', $post['kondisi']);
        $this->db->set('kriteria', $post['kriteria']);
        $this->db->set('sebab', $post['sebab']);
        $this->db->set('akibat', $post['akibat']);
        $this->db->set('rekomendasi', $post['rekomendasi']);
        $this->db->where('id_temuan', $post['id_temuan']);
        return $this->db->update('tbl_temuan'); 
    }

  public function save()
    {
        $post = $this->input->post();
        $data = [
                    'id_subobjek' => $post['id_subobjek'],
                    'id_jadwal' => $post['id_jadwal'],
                    'kondisi' => $post['kondisi'],
                    'kriteria' => $post['kriteria'],
                    'sebab' => $post['sebab'],
                    'akibat' => $post['akibat'],
                    'rekomendasi' => $post['rekomendasi']
                    ];
        return $this->db->insert('tbl_temuan', $data);
    }

    public function delete($id)
    {
         $this->db->where('id_temuan ', $id);
         return $this->db->delete('tbl_temuan');
    } 
}