<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
	}

	public function index()
	{
		$data['data_barang'] = $this->M_barang->get_barang()->result();

		$this->load->view('_layouts/header');		
		$this->load->view('pages/v_barang', $data);		
		// $this->load->view('_layouts/footer');		
	}

	public function tambah_barang(){
		$data = array(
			'kode' => $this->input->post('kode'),
			'barang' => $this->input->post('nama'),
			'harga' => $this->input->post('harga')
		);

		$this->M_barang->tambah_barang($data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil disimpan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('barang', 'refresh');
	}

	public function edit_barang(){
		$where = array('id'=>$id);
		$data['barang'] = $this->M_barang->edit_data($where,'id')->result();
		
		$this->load->view('_layouts/header');
		$this->load->view('pages/barang', $data);
	}

	function edit_data_barang(){
		$id				= $this->input->post('id');
		$kd				= $this->input->post('kode');
		$nama 			= $this->input->post('nama');
		$harga			= $this->input->post('harga');
		
		$data = array(
			'id'			=> $id,
			'kode' 			=> $kd,
			'barang' 		=> $nama,
			'harga' 		=> $harga
		);

		$where = array('id'=>$id);

		$this->M_barang->update_data($where, $data, 'm_barang');
		 $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil diperbarui
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('barang');

	}

	function delete()
	{
		$id = $this->uri->segment(3);
        $this->M_barang->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Data telah berhasil dihapus, silahkan untuk periksa kembali data
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
        redirect('barang', 'referesh');
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */