<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends MY_backend {

  public function getlogin($email,$password) {
        $pwd   = md5($password);
        $this->db->where('email',$email);
        $this->db->where('password',$pwd);
        $query = $this->db->get('users');

        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
              $sesi = array('email' => $row->email);
              $this->session->set_userdata($sesi);
              redirect('dashboard');
            }
        }
        else {
          $this->session->set_flashdata('delete_msg','<div class="alert alert-danger">Email atau Password Salah </div class="fa fa-info" >');
          redirect('backend');
        }
    }

    public function getsecurity() {
    $email = $this->session->userdata('email');
    if (empty($email)) {
          $this->session->sess_destroy();
          redirect('');
        }
    }

}
