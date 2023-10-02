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
        return $this->db->get_where('tbl_jadwal', ["id_jadwal" => $id])->row();
    }

     public function getTemuan($a ,$b)
    {
        $this->db->from('tbl_temuan');
        $this->db->where('tbl_temuan.id_subobjek',$a);
        $this->db->where('tbl_temuan.id_jadwal',$b);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getTemuanbyID($id)
    {
        $this->db->from('tbl_temuan');
        $this->db->where('tbl_temuan.id',$id);
        $query = $this->db->get()->row();
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
        $this->db->set('kondisi', nl2br($post['kondisi']));
        $this->db->set('kriteria', nl2br($post['kriteria']));
        $this->db->set('sebab', nl2br($post['sebab']));
        $this->db->set('akibat', nl2br($post['akibat']));
        $this->db->set('rekomendasi', nl2br($post['rekomendasi']));
        $this->db->where('id_temuan', $post['id_temuan']);
        return $this->db->update('tbl_temuan'); 
    }

  public function save()
    {
        $post = $this->input->post();
        $data = [
                    'id_subobjek' => $post['id_subobjek'],
                    'id_jadwal' => $post['id_jadwal'],
                    'kondisi' => nl2br($post['kondisi']),
                    'kriteria' => nl2br($post['kriteria']),
                    'sebab' => nl2br($post['sebab']),
                    'akibat' => nl2br($post['akibat']),
                    'rekomendasi' => nl2br($post['rekomendasi'])
                    ];
        return $this->db->insert('tbl_temuan', $data);
    }

    public function delete($id)
    {
         $this->db->where('id_temuan ', $id);
         return $this->db->delete('tbl_temuan');
    }
}