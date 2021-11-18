<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
		$this->load->model('M_transaksi');
	}

	public function index()
	{
		$h_cek = $this->M_transaksi->cekkode();
		$urutan = substr($h_cek, 7, 4);
		$kode_skr = $urutan + 1;


		$data['list_barang'] = $this->M_barang->get_barang()->result();
		$data['kode_transaksi'] = $kode_skr;
		
		$this->load->view('_layouts/header');		
		$this->load->view('pages/v_transaksi', $data);		
		// $this->load->view('_layouts/footer');

	}

	public function set_customer(){
		$no = $this->input->post('nomor');
		$tgl = $this->input->post('tanggal');
		$kode = $this->input->post('kode_cust');
		$nama = $this->input->post('nama_cust');
		$telp = $this->input->post('telepon');
		$this->session->set_userdata('nomor', $no);
		$this->session->set_userdata('tanggal', $tgl);
		$this->session->set_userdata('kode_cust', $kode);
		$this->session->set_userdata('nama_cust', $nama);
		$this->session->set_userdata('telepon', $telp);
		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil di set
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
				redirect('transaksi','refresh');
		redirect('transaksi');

	}

	public function simpan_penjualan(){
		$nomor = $this->session->userdata('nomor');
		$tanggal = $this->session->userdata('tanggal');
		$kd_cust = $this->session->userdata('kode_cust');
		$cust = $this->M_transaksi->get_cust($kd_cust)->row_array();
		$id_cust = $cust['id'];
		$nama = $cust['nama'];
		$telp = $cust['telp'];

		$subtot = $this->input->post('subtot');
		$diskon = $this->input->post('diskon');
		$ongkir = $this->input->post('ongkir');
		$totbay = $this->input->post('totbay');


		$tgl_waktu = date('Y-m-d h:m:s', strtotime($tanggal));
		$tgl = date('Ym', strtotime($tanggal));
		
		// digabung
		$gbg = $tgl.'-'.$nomor;

		if (!empty($totbay)) {
			if (empty($this->cart->contents())) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Mohon masukan barang terlebih dahulu
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
				redirect('transaksi','refresh');
			} else {
				// valid
				$order_proses = $this->M_transaksi->simpan_penjualan($gbg, $tgl_waktu, $id_cust, $subtot, $diskon, $ongkir, $totbay);
				if ($order_proses) {
					$this->cart->destroy();
					$this->session->unset_userdata('nomor');
					$this->session->unset_userdata('tanggal');
					$this->session->unset_userdata('kode_cust');

					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil disimpan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
					redirect('transaksi', 'refresh');
				} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Mohon periksa kembali data yang anda masukan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');			
				}
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Terdapat form input yang masih kosong, mohon periksa kembali
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
				redirect('transaksi','refresh');
		}
	}

	public function add_to_cart(){
		$kode = $this->input->post('kode');
		$tanggal = $this->input->post('tanggal');
		
		// $barang = $this->M_barang->get_barang_where($kode)->row_array();
		// $id_barang = $barang['id'];
		$harga = $this->input->post('harga');
		$diskon = $this->input->post('disc');
		$disk_persen = $diskon / 100;
		$harga_disk = $disk_persen * $harga;
		$totdisk = $harga - $harga_disk ;
		$kali = $totdisk * $this->input->post('qty');
		$subtot = $kali;
		$data = array(
			'id' => $this->input->post('kode'),
			'name' => $this->input->post('barang'),
			'price' => $harga,
			'qty' =>$this->input->post('qty'),
			'disc' => $diskon,
			'hardisk' => $harga_disk,
			'totdisk' => $totdisk,
			'amount' => $totdisk
		);

		if (!empty($this->cart->total_items())) {
			foreach($this->cart->contents() as $items){
				$this->cart->insert($data);
				$this->session->set_flashdata('trans', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil ditambahkan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
				redirect('transaksi#cart', 'refresh');
			}
		} else {
			$this->cart->insert($data);
		}
		$this->session->set_flashdata('trans', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil ditambahkan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
			redirect('transaksi#cart', 'refresh');
	}

	public function get_customer(){
		// get cust
		$cust = $this->input->post('kode_cust');
		$data['cust'] = $this->M_transaksi->get_cust($cust);
		$this->load->view('part/cust_detail', $data);
		
	}

	function remove(){
		$row_id=$this->uri->segment(3);
		$this->cart->update(array(
			'rowid' => $row_id,
			'qty' => 0
		));

		$this->session->set_flashdata('trans', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Data telah berhasil dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
					
		redirect('transaksi#cart','refresh');
	}

	// autocomplete
	public function data(){
		$kode = $this->input->post('kode_cust', TRUE);
		$cari_kode = $this->M_transaksi->cari_barang($kode);
		foreach($cari_kode as $cust){
			$json_array[] = $cust->kode;
			echo json_encode($json_array); 
		}
	}


}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */