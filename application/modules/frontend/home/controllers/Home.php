<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_backend
{
    function __construct()
    {
       	parent::__construct();
 		$this->load->model('M_home');
 		$this->data['sql'] = $this->M_home->getData();

    }
	
	function index(){
		$this->load->view('index');
	}


	
}