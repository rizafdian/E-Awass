<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Instrumen_model extends CI_Model
{
    private $_table = "tbl_pertanyaan";

    public $id_pertanyaan;
    public $id_subobjek;
    public $pertanyaan;
    public $subjek;
    public $dokumen;

    public function rules()
    {
        return [
            ['field' => 'pertanyaan',
            'label' => 'Pertanyaan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('tbl_pertanyaan.*, tbl_subobjek.nama as nama_subobjek, tbl_objek.nama as nama_objek');
        $this->db->from('tbl_objek');
        $this->db->join('tbl_subobjek', 'tbl_subobjek.id_objek = tbl_objek.id');
        $this->db->join('tbl_pertanyaan', 'tbl_pertanyaan.id_subobjek = tbl_subobjek.id_subobjek');
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pertanyaan" => $id])->row();
    }

    public function getSubarea()
    {
        $this->db->from('tbl_subobjek');
        $query = $this->db->get()->result();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_subobjek= $post['id_subobjek'];
        $this->pertanyaan = $post['pertanyaan'];
        $this->subjek = $post['subjek'];
        $this->dokumen= $post['dokumen'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pertanyaan = $post["id"];
        $this->id_subobjek= $post['id_subobjek'];
        $this->pertanyaan = $post['pertanyaan'];
        $this->subjek = $post['subjek'];
        $this->dokumen= $post['dokumen'];
        return $this->db->update($this->_table, $this, array('id_pertanyaan' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pertanyaan" => $id));
    }
}