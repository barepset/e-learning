<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_video extends CI_Model {


	public function getvideo($where=array(),$row=false) {
		if (count($where)>0) {
			$this->db->where($where);
			}

		$sql = $this->db->get('video');
		if ($row) {
			return $sql->row_array();
		}else{
			return $sql->result_array();
		}
	}

	function simpan($data) {
		$this->db->insert('video',$data);

	}

	function hapus($id_video){
		$this->db->where('id_video',$id_video);
		$this->db->delete('video');

	}

	function ubah($id_video){
		$this->db->where('id_video',$id_video);
		return $this->db->get('video');
	}

	function update($id_video,$data){
		$this->db->where('id_video',$id_video);
		$this->db->update('video',$data);

			}

	public function getsecurity() {
    $email = $this->session->userdata('email');
    if (empty($email)) {
          $this->session->sess_destroy();
          redirect('');
        }
    }
}
