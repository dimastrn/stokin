<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainlib{
	
	public function file_upload_load(){
		$_this =& get_instance();

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;

		$_this->load->library('upload', $config);

	}
	
}