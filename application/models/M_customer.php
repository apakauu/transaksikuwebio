<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

	public function get_cust(){
		return $this->db->get('m_customer');
	}	

	public function tambah_customer($data){
		$this->db->insert('m_customer', $data);
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('m_customer');
	}  

	public function edit_data($where, $table){
		return $this->db->get_where($table, $where);
	}


	function update_data($where,$data,$table){

    $this->db->where($where);
    $this->db->update($table,$data);

    }   


}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */