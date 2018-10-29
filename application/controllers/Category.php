
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index() 
	{			
		$data = array(
			'record' => $this->Category_model->read(),			
		);
		$this->load->view('pages/category', $data);								
	}	

	public function add_category()
	{		
		$action = $this->uri->segment(3);		

		if ($action == 'add') {			
			$post = $this->input->post();		
			$data = array(
				'nama_kategori' => $post['nama_kategori'],
				'status_kat' => $post['status_kat']
			);
			$this->Category_model->create($data);
			redirect(base_url("category"));
		} else {
			$this->load->view('category');
		}
			
	}				

	public function edit_category($id=0)
	{
		if ($id != 0 && !empty($id)) {			
			$data = array(
				'record' => $this->Category_model->edit($id)
			);						
			$this->load->view('pages/inc/edit_cat', $data);
		} else {
			redirect(base_url('category'));
		}
	}

	public function delete_category($id=0)
	{
		$this->load->model("Category_model");
		$this->Category_model->delete($id);
		redirect(base_url("category"));
	}


}