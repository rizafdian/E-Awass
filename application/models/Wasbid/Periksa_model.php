<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa_model extends CI_Model
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

    public function getJadwal($id)
    {
        return $this->db->get_where('tbl_jadwal', ["id_jadwal" => $id])->row();
    }

    public function getTemuan($a, $b)
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

     public function getEvidenbyId($a, $b)
    {
       $this->db->from('tbl_eviden');
        $this->db->where('tbl_eviden.id_subobjek',$a);
        $this->db->where('tbl_eviden.id_jadwal',$b);
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
        $this->db->set('eviden', $post['eviden']);
        $this->db->where('id_eviden', $post['id_eviden']);
        return $this->db->update('tbl_eviden'); 
    }

    public function update_tl()
    {
        $post = $this->input->post();
        $this->db->set('tindak_lanjut', nl2br($post['tindak_lanjut']));
        $this->db->set('eviden_tindaklanjut', $post['eviden_tindaklanjut']);
        $this->db->where('id_temuan', $post['id_temuan']);
        return $this->db->update('tbl_temuan'); 
    }

  public function save()
    {
        $post = $this->input->post();
        $data = [
                    'id_subobjek' => $post['id_subobjek'],
                    'id_jadwal' => $post['id_jadwal'],
                    'eviden' => $post['eviden']
                    ];
        return $this->db->insert('tbl_eviden', $data);
    }

    public function delete($id)
    {
         $this->db->where('id_eviden ', $id);
         return $this->db->delete('tbl_eviden');
    }

    public function delete_tl($id)
    {
         $this->db->set('tindak_lanjut', 'NULL', false);
         $this->db->set('eviden_tindaklanjut', 'NULL', false);
         $this->db->where('id_temuan ', $id);
         return $this->db->update('tbl_temuan');
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
}