<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_customer');
	}

	public function index()
	{
		$data['data_customer'] = $this->M_customer->get_cust()->result();

		$this->load->view('_layouts/header');		
		$this->load->view('pages/v_customer', $data);			
	}

	public function tambah_customer(){
		$data = array(
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'telp' => $this->input->post('telepon')
		);
		$this->M_customer->tambah_customer($data);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil disimpan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('customer', 'refresh');
	}

	public function edit_customer(){
		$where = array('id'=>$id);
		$data['customer'] = $this->M_customer->edit_data($where,'id')->result();
		
		$this->load->view('_layouts/header');
		$this->load->view('pages/customer', $data);
	}

	function edit_data_customer(){
		$id				= $this->input->post('id');
		$kd				= $this->input->post('kode');
		$nama 			= $this->input->post('nama');
		$telepon		= $this->input->post('telepon');
		
		$data = array(
			'id'			=> $id,
			'kode' 			=> $kd,
			'nama' 			=> $nama,
			'telp' 			=> $telepon
		);

		$where = array('id'=>$id);

		$this->M_customer->update_data($where, $data, 'm_customer');
		 $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Data telah berhasil diperbarui
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('customer');

	}


	public function delete(){
		$id = $this->uri->segment(3);
        $this->M_customer->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Data telah berhasil dihapus, silahkan untuk periksa kembali data
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
        redirect('customer', 'referesh');
	}


}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */