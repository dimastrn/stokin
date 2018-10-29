<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('User_model');
		$data = array(
			'record' => $this->User_model->read()
		);
		$this->load->view('pages/user', $data);
	}

	public function register()
	{
		$this->load->model('User_model');
		$this->User_model->user_register($this->input->post(NULL,TRUE));
		redirect(base_url('user'));
	}

	public function login(){			

		redirect(base_url('dashboard'));		
	}
}

