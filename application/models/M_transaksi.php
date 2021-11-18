<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function cekkode(){
		$query = $this->db->query("SELECT MAX(kode) as kodetrans from t_sales");
		$hsl = $query->row();

		return $hsl->kodetrans;
	}

	public function cari_barang($kode){
		$this->db->like('kode',$kode);
		$query = $this->db->get('m_customer');
		return $query->result();
	}	

	public function get_cust($kode){
		$q=$this->db->query("SELECT * FROM m_customer WHERE kode = '$kode'");
		return $q;
	}

	public function simpan_penjualan($gbg, $tgl_waktu, $id_cust, $subtot, $diskon, $ongkir, $totbay){
		$this->db->query(" INSERT INTO t_sales (kode, tgl, cust_id, subtotal, diskon, ongkir, total_bayar) VALUES('$gbg', '$tgl_waktu', '$id_cust', '$subtot', '$diskon', '$ongkir', '$totbay') ");

		foreach($this->cart->contents() as $items){
			$id_brg = $this->db->query("SELECT * FROM m_barang where kode = '".$items['id']."' ");
			$idbrg = $id_brg->row_array();

			$data = array(
				'kode_sales' 	=> $gbg,
				'barang_id'		=> $idbrg['id'],
				'harga_bandrol'	=> $items['price'],
				'qty'			=> $items['qty'],
				'diskon_pct'	=> $items['disc'],
				'diskon_nilai'	=> $items['hardisk'],
				'harga_diskon'	=> $items['totdisk'],
				'total'			=> $totbay
			);
			$this->db->insert('t_sales_det', $data);
		}
		return true;
	}

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */