<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	public function get_data(){
		$data = $this->db->query("SELECT t_sales.kode, LEFT(t_sales.tgl,10) as tanggal, m_customer.nama as custnama, t_sales.subtotal, t_sales.diskon, t_sales.ongkir, t_sales.total_bayar, SUM(t_sales_det.qty) as qty FROM t_sales JOIN m_customer ON t_sales.cust_id = m_customer.id JOIN t_sales_det ON t_sales.kode = t_sales_det.kode_sales GROUP BY t_sales.kode");
		return $data;
	}

	public function hitung_barang(){
		$query =  $this->db->select('count(barang) as jumlah_barang')
		->from('m_barang');

		return $query->get()->row();

	}	

	public function hitung_customer(){
		$query =  $this->db->select('count(nama) as jumlah_customer')
		->from('m_customer');

		return $query->get()->row();
	}

	public function hitung_transaksi(){
		$query =  $this->db->select('count(kode) as jumlah_transaksi')
		->from('t_sales');

		return $query->get()->row();
	}

}

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */