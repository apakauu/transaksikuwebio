<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
	}

	public function index()
	{
		$data['jumlah_barang'] = $this->M_home->hitung_barang()->jumlah_barang;
		$data['jumlah_customer'] = $this->M_home->hitung_customer()->jumlah_customer;
		$data['jumlah_transaksi'] = $this->M_home->hitung_transaksi()->jumlah_transaksi;
		$data['data_dashboard'] = $this->M_home->get_data()->result();
		$this->load->view('_layouts/header', $data);		
		$this->load->view('pages/v_home');			
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */