<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(array('Stock_model', 'Category_model'));
		$this->load->library(array('mainlib'));
		$this->load->helper('form');		
		// $this->mainlib->file_upload_load();
		// $data = $this->upload->data();
		// print_r($data);
	}

	public function category($id)
	{		
		$data = array(
			'record' => $this->Category_model->get_by_category($id),
			'option' => $this->Category_model->get_category($id)
		);
		$this->load->view('pages/stock', $data);
	}

	public function add_stock()
	{
		$action = $this->uri->segment(3);		

		if ($action == 'add') {			
			$post = $this->input->post();

			// Load Upload Method
			$this->mainlib->file_upload_load();

			if ($this->upload->do_upload('userfile')) {
				$upload_data = $this->upload->data();
				$foto = base_url().'uploads/'.$upload_data['file_name'];

				$data = array(
					'kategori' => $post['kategori'],
					'nama_barang' => $post['nama_barang'],
					'supplier' => $post['supplier'],
					'foto' => $foto,
					'tgl_expired' => $post['tgl_expired'],
					'stok' => $post['stok'],
					'status' => $post['status']
				);

				$this->Stock_model->create($data);				
				// $this->load->view("stock/category/".$post['kategori'], $data);
				redirect(base_url('stock/category/').$post['kategori']);

			} else {
				// redirect(base_url("stock/category/").$post['kategori']);
				echo $this->upload->display_errors();
			}
			
		}		
	}

	public function edit_stock($id=0)
	{				
		if ($id != 0 && !empty($id)) {			
			$data = array(
				'record' => $this->Stock_model->edit($id),
				'option' => $this->Stock_model->get_category($id)
			);						
			$this->load->view('pages/inc/edit', $data);
		} else {
			redirect(base_url('barang/data_barang'));
		}
	}

	public function update_stock()
	{
		$post = $this->input->post();
		$id = $post['id_barang'];

		$data = array(
			'kategori' => $post['kategori'],
			'nama_barang' => $post['nama_barang'],
			'supplier' => $post['supplier'],				
			'tgl_expired' => $post['tgl_expired'],
			'stok' => $post['stok'],
			'status' => $post['status']
		);
		$this->Stock_model->update($id, $data);			
		redirect(base_url('stock/category/').$post['kategori']);
	}

	public function delete_stock()
	{
		$id = $this->input->post();
		$this->Stock_model->delete($id['id_barang']);
		redirect(base_url("stock/category/").$id['id_kategori']);
	}

}