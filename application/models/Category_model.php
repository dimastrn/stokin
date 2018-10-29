<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function read() {
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori', 'DESC');
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

	public function get_by_category($id_kat)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori');
		$this->db->where('kategori', $id_kat);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_category($id_kat)
	{
		$this->db->select('id_kategori, nama_kategori');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori', $id_kat);
		$query = $this->db->get();
		return $query->result_array();	
	}

	// public function get_category_by_id($id_kat)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_kategori');
	// 	$this->db->where($id_kat);
	// 	$query = $this->db->get();
	// 	return $query->result_array();		
	// }

	public function create($data) 
	{
		$this->db->insert('tbl_kategori', $data);
	}

	public function edit($id) 
	{
		$this->db->where('id_kategori', $id);
		$query = $this->db->get('tbl_kategori');
		if($query->num_rows() > 0){
			$data = $query->row();
			$query->free_result();
		} else {
			$data = NULL;
		}
		return $data;
	}

	public function update($id, $data) 
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('tbl_kategori', $data);
	}

	public function delete($id) {
		$this->db->where('id_kategori', $id);
		$this->db->delete('tbl_kategori');
	}
}