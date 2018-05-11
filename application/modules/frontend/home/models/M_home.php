<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {


	// public function gethome($where=array(),$row=false) {
	// 	if (count($where)>0) {
	// 		$this->db->where($where);
	// 		}

	// 	$sql = $this->db->get('trip');
	// 	if ($row) {
	// 		return $sql->row_array();
	// 	}else{
	// 		return $sql->result_array();
	// 	}
	// }

	public function getData()
	{
		$query = $this->db->get('foto');
		return $query->result();

	}

}
