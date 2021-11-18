<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function get_barang(){
		return $this->db->get('m_barang');
	}

	public function get_barang_where($kode){
		return $this->db->query("SELECT * FROM m_barang WHERE kode = '$kode' ");
	}

	public function tambah_barang($data){
		$this->db->insert('m_barang', $data);
	}

	public function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}


	function update_data($where,$data,$table){

    $this->db->where($where);
    $this->db->update($table,$data);

    }   

    public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('m_barang');
	}  


}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */