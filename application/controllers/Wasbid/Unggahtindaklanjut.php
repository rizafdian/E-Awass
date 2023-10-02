<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unggahtindaklanjut extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
         
        $this->load->model('unggahtindaklanjut_m');
    }

    public function save()
    {
        $config['upload_path']    = './assets/uploads/';
        $config['allowed_types']  = 'pdf';
        $config['max_size']       = 10000;
        $config['file_name']      = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        $post = $this->input->post(null, true);
        if ($this->upload->do_upload('dokumen')) {
            $post['dokumen'] = $this->upload->data('file_name');
            $this->unggahtindaklanjut_m->edit($post);
            $this->session->set_flashdata('pesan', 'Data berhasil diupload');
            redirect('/userpa/unggahtindaklanjut/' . $post['id_pengadilan']);
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('errors', $error);
            redirect('/userpa/unggahtindaklanjut/' . $post['id_pengadilan']);
        }
    }

    public function hapus($id, $id_pengadilan, $nama_file)
    {
        unlink('./assets/uploads/' . $nama_file);
        $this->unggahtindaklanjut_m->delete($id);
        return redirect('/userpa/unggahtindaklanjut/' . $id_pengadilan);
    }

}
