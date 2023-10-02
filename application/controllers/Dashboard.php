<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengawasan extends CI_Controller
{
	public function index()
	{
		$this->template->load('template_admin', 'admin/v_jadwal_pengawasan', $data);
	}
}