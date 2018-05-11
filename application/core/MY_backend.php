<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_backend extends CI_Controller {
	public 	$data;
	private $dependenci_table;
	private $relation_status;
	private $delete_tree;
	
	function __construct(){
		parent::__construct();
		$this->lang->load('auth');
		$this->load->library('wd_validation');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('urlcrypt');
		
		$this->ion_auth_setup();
		$this->data['tables'] = $this->config->item('tables','ion_auth');
		$this->data['privilege'] = array('A' => 1, 'R' => 1,'C' => 1, 'U' => 1, 'D' => 1);

		$this->online_users();
		
	}

	public function online_users(){
	
		$data =  array(
			'session' => session_id(),
			'time' => time()
			);

		$time_check = $data['time']-100;
		
		$this->query = $this->db->select('*')->from('online_users')->where('session', $data['session'])->get()->num_rows();

		if($this->query === 0){

			$this->db->insert('online_users',$data);

		}else{

			$this->db->set('time', $data['time']);
			$this->db->where('session', $data['session']);
			$this->db->update('online_users');

		}
		
		$this->db->select('*')->from('online_users')->get()->num_rows();
		$this->db->where('time < ', $time_check );
		$this->db->delete('online_users');	

	}
	
	function ion_auth_setup(){
		if (!$this->ion_auth->logged_in()){
			$this->data['users'] ='';
		}else{
			$this->data['users'] = $this->ion_auth->user()->row();
		}
	}

}

?>