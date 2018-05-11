<?php

class Rule {
	private $CI;

	function __construct() {
		$this->CI = get_instance();
		$this->CI->load->library('ion_auth');
		$this->CI->load->model('m_auth');

		//initialize db tables data
		$this->CI->tables = $this->CI->config->item('tables', 'ion_auth');
	}

	
	protected function array_multi_sum($arr2ay, $property) {
		$total = '';
		foreach ($arr2ay as $key => $value) {
			if (is_array($value)) {
				$total += $this->array_multi_sum($value, $property);
			} else if ($key == $property) {
				$total += $value;
			}
		}
		return $total;
	}

	
	public $active_menu = array();
	function active_menu($url){
		$this->active_menu = array();
		$this->generate_active_menu($url);
		return $this->active_menu;
	}
	
	
	function generate_active_menu($module_url,$parent=''){
		if($parent==''){
			$data_module = $this->CI->m_auth->get_module_by_url($module_url);
		}
		else{
			$data_module = $this->CI->m_auth->get_module_by_parent($parent);	
		}
		
		foreach($data_module as $row){
			$this->active_menu[]['url'] = $row['id'];
			$this->generate_active_menu('',$row['parent']);
		}
	}
	
	public $sidebar = "";
	function sidebar_menu(){
		$this->sidebar = '';
		$this->generate_sidebar_menu();
		return $this->sidebar;
	}
	

}