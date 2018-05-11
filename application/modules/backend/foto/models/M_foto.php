<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_foto extends CI_Model {


	public function getfoto($where=array(),$row=false) {
		if (count($where)>0) {
			$this->db->where($where);
			}

		$sql = $this->db->get('foto');
		if ($row) {
			return $sql->row_array();
		}else{
			return $sql->result_array();
		}
	}

	function simpan($data) {
		$this->db->insert('foto',$data);

	}

	function hapus($id){
		$this->db->where("id",$id);
		$this->db->delete('foto');

	}

	function ubah($id){
		$this->db->where("id",$id);
		return $this->db->get('foto');
	}

	function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('foto',$data);

			}

	public function getsecurity() {
    $email = $this->session->userdata('email');
    if (empty($email)) {
          $this->session->sess_destroy();
          redirect('');
        }
    }
}
