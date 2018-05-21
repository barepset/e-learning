<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_about extends CI_Model {


	public function getabout($where=array(),$row=false) {
		if (count($where)>0) {
			$this->db->where($where);
			}

		$sql = $this->db->get('about');
		if ($row) {
			return $sql->row_array();
		}else{
			return $sql->result_array();
		}
	}

	function simpan($data) {
		$this->db->insert('about',$data);

	}

	function hapus($id_about){
		$this->db->where("id_about",$id_about);
		$this->db->delete('about');

	}

	function ubah($id_about){
		$this->db->where("id_about",$id_about);
		return $this->db->get('about');
	}

	function update($id_about,$data){
		$this->db->where('id_about',$id_about);
		$this->db->update('about',$data);

			}

	public function getsecurity() {
    $email = $this->session->userdata('email');
    if (empty($email)) {
          $this->session->sess_destroy();
          redirect('');
        }
    }
}
