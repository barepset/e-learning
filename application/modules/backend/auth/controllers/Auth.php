<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_backend {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function index() {

		if (!$this->ion_auth->logged_in()) {
			redirect(admin_dir().'auth/login', 'refresh');
		}
		else {
			redirect(admin_dir().'index.php/backend/foto');
		}
	}

	public function login() {
		$this->load->view('auth');

	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('backend/auth');
	}

	public function getlogin() {
	  $email    = $this->input->post('email');
      $password = $this->input->post('password');
      $pwd 	    = md5($password);
      $this->db->where('email',$email);
      $this->db->where('password',$pwd);
      $query = $this->db->get('users');

        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
              $sesi = array('email' => $row->email);
              $this->session->set_userdata($sesi);
              redirect('/backend/foto');
            }
        }
        else {
          $this->session->set_flashdata('delete_msg','<div class="alert alert-warning">Username dan Password tidak cocok</div>');
          redirect('backend');
        }
	}
	

}
