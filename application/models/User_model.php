<?php 

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function user_register($input){
		$this->load->helper('site_helper');
		$encrypt_password = bCrypt($input['password'],12);
		$array_user = array(
				'username' => $input['username'],
				'password' => $encrypt_password,
				'status' => $input['status']
			);

		$this->db->insert('tbl_admin', $array_user);
		
	}
	
	public function read() {
		$this->db->from('tbl_admin');
		$this->db->order_by('id_admin', 'DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			$query->free_result();
		} else {
			$data = NULL;
		}
		return $data;
	}

}

 ?>