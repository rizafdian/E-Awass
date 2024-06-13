<?php
defined('BASEPATH') or exit('No direct script access allowed');
// include_once(APPPATH . "third_party/PhpWord/TemplateProcessor.php");
// include_once(APPPATH . "third_party/PhpWord/PhpWord.php");
// include_once(APPPATH . "third_party/PhpWord/Settings.php");
// include_once(APPPATH . "third_party/PhpWord/Shared/ZipArchive.php");
// include_once(APPPATH . "third_party/PhpWord/Shared/Text.php");

class Detail extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Wasda/detail_model');
		$this->load->model('auth_model');
		if (!$this->auth_model->current_user()) {
			redirect('auth/login');
		}
	}

	function index($id = null)
	{
		$data['area'] = $this->detail_model->getArea();
		$data['jadwal'] = $this->detail_model->getDetail($id);
		$data['tim'] = $this->detail_model->getTim($id);
		$data['pe'] = $this->detail_model->getProgresEviden($id);
		$data['jt'] = $this->detail_model->getProgresTemuan($id);
		$data['tl'] = $this->detail_model->getProgresTL($id);
		$data['current_user'] = $this->auth_model->current_user();
		$this->template->load('template_wasda', 'Wasda/v_detail', $data);
	}

	public function uploadtemuan($a)
	{
		$config['upload_path']    = './assets/upload/';
		$config['allowed_types']  = 'pdf';
		$config['max_size']       = 1000000;
		$config['file_name']      = 'temuan-' . $a;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);
		$post = $this->input->post();

		if (!$this->upload->do_upload('temuan')) {
			print_r($config['upload_path']);
			print_r($this->upload->display_errors());
		} else {
			$post['temuan'] = $this->upload->data('file_name');
			$this->detail_model->update_temuan($post);
			$this->session->set_flashdata('pesan', 'Data berhasil diupload');
			redirect(site_url('Wasda/Detail/index/' . $a));
		}
	}

	public function uploadlhp($a)
	{
		$config['upload_path']    = './assets/upload/';
		$config['allowed_types']  = 'pdf';
		$config['max_size']       = 0;
		$config['file_name']      = 'temuan-' . $a;
		$config['overwrite'] = true;

		$this->load->library('upload', $config);
		$post = $this->input->post();

		if (!$this->upload->do_upload('lhp')) {
			print_r($config['upload_path']);
			print_r($this->upload->display_errors());
		} else {
			$post['lhp'] = $this->upload->data('file_name');
			$this->detail_model->update_lhp($post);
			$this->session->set_flashdata('pesan', 'Data berhasil diupload');
			redirect(site_url('Wasda/Detail/index/' . $a));
		}
	}

	public function lhp($a)
	{
		$data = $this->detail_model->getDetail($a);
		$this->load->library('Phpword');
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(FCPATH . '/assets/upload/lhp_bab12.docx');

		$templateProcessor->setValues([
			'pengadilan'     => $data->pengadilan,
			'tgl_mulai'     => $data->tgl_mulai,
			'tgl_selesai'     => $data->tgl_selesai,
			'no_st'     => $data->no_st,
			'periode'     => $data->nama,
			'kota' => $data->kota
		]);

		// header('Content-Type: application/msword');
		header("Content-Disposition: attachment; filename=LHP_Bab_1_2.docx");
		// header('Cache-Control: max-age=0');
		$templateProcessor->saveAs('php://output');
		// echo('hello world');
	}

	public function bab_3($a)
	{
		$this->load->library('Phpword');
		$data['area'] = $this->detail_model->getArea();
		$data['subarea'] = $this->detail_model->getSubarea();
		$data['temuan'] = $this->detail_model->getTemuan($a);
		$data['tim'] = $this->detail_model->getTim($a);


		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$phpWord->getCompatibility()->setOoxmlVersion(14);
		$phpWord->getCompatibility()->setOoxmlVersion(15);
		$phpWord->setDefaultFontSize(12);
		$phpWord->setDefaultFontName('Arial');

		$targetFile = "./assets/uploads/";
		$filename = 'LHP_Bab_III.rtf';

		$section = $phpWord->addSection();

		// $header = $section->addHeader();
		// $header->addText('This is my fabulous header!');

		// $footer = $section->addFooter();
		// $footer->addText('Footer text goes here.');

		// $textrun = $section->addTextRun();
		// $textrun->addText('Some text. ');
		// $textrun->addText('And more Text in this Paragraph.');

		// $textrun = $section->addTextRun();
		// $textrun->addText('New Paragraph! ', ['bold' => true]);
		// $textrun->addText('With text...', ['italic' => true]);


		$section->addText('BAB II', ['size' => 14, 'bold' => true, 'align' => 'center']);
		$section->addText('HASIL PENGAWASAN', ['size' => 14, 'bold' => true, 'align' => 'center']);



		$nomor = 1;
		$nmr_temuan = 1;
		foreach ($data['area'] as $areas) {
			$styleTable = ['borderSize' => 6, 'borderColor' => '999999'];
			$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
			$styleHeader = ['size' => 12, 'bold' => true, 'align' => 'center'];
			$styleDetail = ['size' => 11, 'bold' => true, 'align' => 'center'];
			$styleKondisi = ['size' => 10, 'bold' => true, 'align' => 'center'];
			$styleTemuan = ['size' => 10, 'bold' => false, 'align' => 'center'];
			$table = $section->addTable('Colspan Rowspan');
			$table->addRow();
			$table->addCell(800)->addText($nomor++, $styleHeader);
			$table->addCell(9000, ['gridspan' => 20])->addText($areas->nama, $styleHeader);
			foreach ($data['subarea'] as $subareas) {
				if ($subareas->id_objek == $areas->id) {
					$number = 1;
					foreach ($data['temuan'] as $temuans) {
						if ($temuans->id_subobjek == $subareas->id_subobjek) {
							if ($number == 1) {
								$table->addRow();
								$table->addCell(9800, ['gridspan' => 20])->addText($subareas->nama, $styleDetail);
							}
							$number++;
							$table->addRow();
							$table->addCell(800, ['vMerge' => 'restart'])->addText($nmr_temuan++);
							$table->addCell(2000, ['gridspan' => 10, 'bold' => true])->addText('Kondisi', $styleKondisi);
							$table->addCell(7000, ['gridspan' => 10])->addText($temuans->kondisi, $styleTemuan);
							$table->addRow();
							$table->addCell(800, ['vMerge' => 'continue']);
							$table->addCell(2000, ['gridspan' => 10, 'bold' => true])->addText('Kriteria', $styleKondisi);
							$table->addCell(7000, ['gridspan' => 10])->addText($temuans->kriteria, $styleTemuan);
							$table->addRow();
							$table->addCell(800, ['vMerge' => 'continue']);
							$table->addCell(2000, ['gridspan' => 10, 'bold' => true])->addText('Sebab', $styleKondisi);
							$table->addCell(7000, ['gridspan' => 10])->addText($temuans->sebab, $styleTemuan);
							$table->addRow();
							$table->addCell(800, ['vMerge' => 'continue']);
							$table->addCell(2000, ['gridspan' => 10, 'bold' => true])->addText('Akibat', $styleKondisi);
							$table->addCell(7000, ['gridspan' => 10])->addText($temuans->akibat, $styleTemuan);
							$table->addRow();
							$table->addCell(800, ['vMerge' => 'continue']);
							$table->addCell(2000, ['gridspan' => 10, 'bold' => true])->addText('Rekomendasi', $styleKondisi);
							$table->addCell(7000, ['gridspan' => 10])->addText($temuans->rekomendasi, $styleTemuan);
						}
					}
				}
			}
		}

		$textrun = $section->addTextRun();
		$textrun->addText('                                  ');

		$nomor = 1;
		foreach ($data['tim'] as $tims) {
			$textrun = $section->addTextRun();
			$textrun->addText($nomor++);
			$textrun->addText('.  ');
			$textrun->addText($tims->nama, ['bold' => true]);
			$textrun->addText(' sebagai ');
			$textrun->addText($tims->role);
		}

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save($filename);
		// send results to browser to download
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $filename);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		flush();
		readfile($filename);
		unlink($filename); // deletes the temporary file
		exit;
	}
}
