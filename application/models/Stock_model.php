<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function read() {
		$this->db->from('tbl_barang');
		$this->db->order_by('id_barang', 'DESC');
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
	
	public function create($data) 
	{
		$this->db->insert('tbl_barang', $data);
	}

	public function edit($id) 
	{
		$this->db->where('id_barang', $id);
		$query = $this->db->get('tbl_barang');
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
		$this->db->where('id_barang', $id);
		$this->db->update('tbl_barang', $data);
	}

	public function delete($id) {
		$this->db->where('id_barang', $id);
		$this->db->delete('tbl_barang');
	}

	public function get_category($id_kat)
	{		
		$this->db->select('tbl_kategori.id_kategori, tbl_kategori.nama_kategori');		
		$this->db->from('tbl_barang');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori');
		$this->db->where('tbl_barang.id_barang', $id_kat);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			foreach($query->result_array() as $row) {
				$data[] = $row;
			}
			$query->free_result();
		} else {
			$data=NULL;
		}
		return $data;
	}

}