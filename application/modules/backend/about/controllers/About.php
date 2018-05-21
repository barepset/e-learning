<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_backend
{
    function __construct()
    {
       	parent::__construct();
 		$this->load->model("m_about");
		$this->m_about->getsecurity();
		$this->data['sql'] = $this->m_about->getabout();
    }
	
	function index(){
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('index',$this->data);
		$this->load->view('v_footer');
	}

	public function add() {
		$data['ed'] = 'simpan';
		$this->load->view('v_sidebar');
		$this->load->view('form',$data);
		$this->load->view('v_footer');
	}

	public function simpan() {
	    $this->m_about->getsecurity();
	    $id_about  	= $this->input->post('id_about');
		$about_desc  	= $this->input->post('about_desc');
	    $data   	= array(
	      		'id_about' 	=> $id_about,
	      		'about_desc' 	=> $about_desc );
		$this->m_about->simpan($data);
		$this->session->set_flashdata('success_msg','<div class="alert alert-success">Data Sukses Ditambah </div>');
		redirect('backend/about');
	  }

	public function hapus($id_about){
		$e= $this->m_about->ubah($id_about)->row_array();
		$this->m_about->hapus($id_about);
		$this->session->set_flashdata('delete_msg','<div class="alert alert-warning">success dihapus </div>');
		redirect('backend/about');
		}

		public function ubah($id_about)	{
			$data['ed'] = 'update';
			$data['sql'] = $this->m_about->ubah($id_about);
			$this->load->view('v_header');
			$this->load->view('v_sidebar');
			$this->load->view('form',$data);
			$this->load->view('v_footer');
		}

		public function detail($id_about)	{
		
			$data['sql'] = $this->m_about->getabout(array('id_about'=> $id_about),true);
			$this->load->view('v_header');
			$this->load->view('v_sidebar');
			$this->load->view('detail',$data);
			$this->load->view('v_footer');
		}
}