<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_fbar extends CI_Model {

		
	function tampil_tempat(){
	$query=$this->db->query("SELECT * FROM tempat ORDER BY id_tempat DESC");
	return $query->result();
	}

	function tampil_hubungi(){
	$query=$this->db->query("SELECT * FROM hubungi_kami ORDER BY id_hubungi DESC");
	return $query->result();
	}

	function tampil_pemain(){
	$query=$this->db->query("SELECT * FROM pemain ORDER BY id_pemain ");
	return $query->result();
	}

	function tampil_pemainmax(){
	$query=$this->db->query("SELECT max(id_pemain) as kode FROM pemain ");
	return $query->result();
	}

	function tampil_tempatmax(){
	$query=$this->db->query("SELECT  max(id_tempat) as kode FROM tempat ");
	return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);

	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function cek_user($data) {
			$query = $this->db->get_where('admin_login', $data);
			return $query;
		}


	}

?>