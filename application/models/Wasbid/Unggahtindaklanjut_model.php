<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unggahtindaklanjut_model extends CI_Model
{
  
    public function add($post)
    {
        $params = [
            'id_pengawasan' => $post['id_pengawasan'],
            'dok_tindaklanjut' => $post['dokumen']
        ];
        $this->db->insert('tbl_dokumen', $params);
    }

    public function edit($post)
    {
        $params = [
            'dok_tindaklanjut' => $post['dokumen']
        ];
        $this->db->where('id', $post['id_pengawasan']);
        $this->db->update('tbl_pengawasan', $params);
    }

    public function delete($id)
    {
        $this->db->set('dok_tindaklanjut',null);
        $this->db->where('id', $id);
       $this->db->update('tbl_pengawasan');
    }
}
