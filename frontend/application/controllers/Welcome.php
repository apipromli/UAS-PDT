<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{

		// ambil data dari database
		$data['new_sld'] = $this->db->get('tbl_slide')->result();
		// jumlah baris di database
		$data['jml_sld'] = $this->db->get('tbl_slide')->num_rows();

		$data['jadwal'] = $this->db->get('tbl_jadwal')->result();

		$data['sekolah'] = $this->db->get('tbl_sekolah')->row_array();
		
		
		
		$data['title'] = 'PPDB-SMK-RYT';
		$this->load->view('front/meta', $data);
		$this->load->view('front/header');
		$this->load->view('front/content', $data);
		$this->load->view('front/footer');
		$this->load->view('front/script');
	}
}
