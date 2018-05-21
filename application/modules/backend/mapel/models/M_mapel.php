<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapel extends CI_Model {


	public function getmapel($where=array(),$row=false) {
		if (count($where)>0) {
			$this->db->where($where);
			}

		$sql = $this->db->get('mapel');
		if ($row) {
			return $sql->row_array();
		}else{
			return $sql->result_array();
		}
	}

	function simpan($data) {
		$this->db->insert('mapel',$data);

	}

	function hapus($id){
		$this->db->where("id_mapel",$id);
		$this->db->delete('mapel');

	}

	function ubah($id){
		$this->db->where("id_mapel",$id);
		return $this->db->get('mapel');
	}

	function update($id,$data){
		$this->db->where('id_mapel',$id);
		$this->db->update('mapel',$data);

			}

	public function getsecurity() {
    $email = $this->session->userdata('email');
    if (empty($email)) {
          $this->session->sess_destroy();
          redirect('');
        }
    }
}
