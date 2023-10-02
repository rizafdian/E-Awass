<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa_model extends CI_Model
{
 
    public function getJadwal($id)
    {
        return $this->db->get_where('tbl_jadwal', ["id_jadwal" => $id])->row();
    }

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

    public function getPertanyaanById($id)
    {
        $this->db->from('tbl_pertanyaan');
        $this->db->where('id_pertanyaan',$id);
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

    public function getChecklist($a,$b)
    {
        $this->db->select('tbl_checklist.*, tbl_temuan.id as id_temuan, tbl_temuan.kondisi, tbl_temuan.kriteria, tbl_temuan.sebab, tbl_temuan.akibat, tbl_temuan.rekomendasi');
        $this->db->from('tbl_checklist');
        $this->db->join('tbl_temuan','tbl_temuan.id_checklist = tbl_checklist.id','left');
        $this->db->where('id_pengawasan',$a);
        $this->db->where('id_pertanyaan',$b);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getSubjoin($id)
    {
        $this->db->select('tbl_subobjek.*, tbl_objek.nama as nama_objek');
        $this->db->from('tbl_subobjek');
        $this->db->join('tbl_objek','tbl_objek.id = tbl_subobjek.id_objek');
        $this->db->where('id_subobjek',$id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getEviden($a ,$b)
    {
        $this->db->select('tbl_eviden.*');
        $this->db->from('tbl_eviden');
        $this->db->join('tbl_jadwal','tbl_eviden.id_periode = tbl_jdwal.id_periode');
        $this->db->where('tbl_jadwal.id_jadwal',$a);
        $this->db->where('tbl_eviden.id_pertanyaan',$b);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getInstrumen($id_subobjek, $id_jadwal){
        $this->db->select('tbl_pertanyaan.*, tbl_subobjek.nama as nama_subobjek, tbl_objek.nama as nama_objek, tbl_eviden.eviden, tbl_checklist.id_pengawasan, tbl_checklist.keterangan, tbl_checklist.id');
        $this->db->from('tbl_objek');
        $this->db->join('tbl_subobjek', 'tbl_subobjek.id_objek = tbl_objek.id AND tbl_subobjek.id_subobjek='.$id_subobjek);
        $this->db->join('tbl_pertanyaan', 'tbl_pertanyaan.id_subobjek = tbl_subobjek.id_subobjek');
        $this->db->join('tbl_checklist', 'tbl_pertanyaan.id_pertanyaan = tbl_checklist.id_pertanyaan AND tbl_checklist.id_pengawasan='.$id_jadwal,'left');
        $this->db->join('tbl_eviden', 'tbl_eviden.id_eviden = tbl_checklist.id_eviden','left');
        $query = $this->db->get()->result();
        return $query;
    }

    public function update()
    {
        $post = $this->input->post();
        
        if (!empty($post['id_checklist'])) {
            
            $param = [
            'keterangan' => $post['keterangan']
            ];
            $this->db->where('id', $post['id_checklist']);
            $this->db->update('tbl_checklist', $param);

            if ($post['keterangan'] == 'Tidak') {
                $id = $post['id_checklist'];
                $cek = $this->db->query("SELECT * FROM tbl_temuan WHERE id_checklist = $id")->row();

                if ($cek != null) {

                    $this->db->set('kondisi', $post['kondisi']);
                    $this->db->set('kriteria', $post['kriteria']);
                    $this->db->set('sebab', $post['sebab']);
                    $this->db->set('akibat', $post['akibat']);
                    $this->db->set('rekomendasi', $post['rekomendasi']);
                    $this->db->where('id_checklist', $post['id_checklist']);
                    return $this->db->update('tbl_temuan');
         
                } else { 
                    $data = [
                        'id_checklist' => $post['id_checklist'],
                        'kondisi' => $post['kondisi'],
                        'kriteria' => $post['kriteria'],
                        'sebab' => $post['sebab'],
                        'akibat' => $post['akibat'],
                        'rekomendasi' => $post['rekomendasi']
                    ];
                    return $this->db->insert('tbl_temuan', $data);
                }
            }

            if ($post['keterangan'] == 'Ya') {
                $this->db->where('id_checklist ', $post['id_checklist']);
                return $this->db->delete('tbl_temuan');
            }

        } else {
             $param = [
                'id_pengawasan' => $post['id_pengawasan'],
                'id_pertanyaan' => $post['id_pertanyaan'],
                'keterangan' => $post['keterangan']
            ];
            

            if ($post['keterangan'] == 'Tidak') {
                
                $this->db->insert('tbl_checklist', $param);
                $data = [
                    'id_checklist' => $this->db->insert_id(),
                    'kondisi' => $post['kondisi'],
                    'kriteria' => $post['kriteria'],
                    'sebab' => $post['sebab'],
                    'akibat' => $post['akibat'],
                    'rekomendasi' => $post['rekomendasi']
                ];
                return $this->db->insert('tbl_temuan', $data);
            }
            else{

                return $this->db->insert('tbl_checklist', $param);
            }
        }
        
    }
}