<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends MY_backend
{
    function __construct()
    {
       	parent::__construct();
 		$this->load->model("m_mapel");
		$this->m_mapel->getsecurity();
 		$this->data['sql'] = $this->m_mapel->getmapel();

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
	
	// public function simpan() {
	// 	if(isset($_FILES['cover']))
	// 	{
	// 		$this->upload->initialize(array(
	// 			'upload_path' => './uploads/foto/',
	// 			'create_thumb' => FALSE,
	// 			'allowed_types' => 'png|jpg|gif',
	// 			'max_size' => '5000',
	// 			'max_width' => '3000',
	// 			'max_height' => '3000'
	// 		));

	// 		if($this->upload->do_upload('cover')){

	// 			$data_upload = $this->upload->data();
	// 			$ext = pathinfo($data_upload, PATHINFO_EXTENSION);
	// 			$this->image_lib->initialize(array(

	// 				'image_library' => 'gd2',
	// 				'source_image' => './uploads/foto/'.$data_upload['file_name'],
	// 				'new_image' => './thumbs/foto/',
	// 				'maintain_ratio' => TRUE,
	// 				'create_thumb' => FALSE,
	// 				'quality' => '20%',
	// 				'width' => 75,
	// 				'height' => 50


	// 			));
	// 			chmod($data_upload, 0777);
	// 			if(!$this->image_lib->resize()){
	// 			redirect('backend/foto/add');
	// 			}

	// 		}

	// 		$data = array(
	// 			'cover'	=> $data_upload['file_name'],
	// 			'judul' 	=> $this->input->post('judul'),
	// 			'deskripsi' 	=> $this->input->post('deskripsi')
	// 			);
	// 	$this->m_foto->simpan($data);
	// 	$this->session->set_flashdata('success_msg','<div class="alert alert-success">Data Sukses Di Simpan </div>');
	// 	redirect('backend/foto');


	// 	}	else {
	// 	$this->session->set_flashdata('delete_msg','<div class="alert alert-warning"> Data  gagal di  Tambah</div>');

	// 			redirect('backend/foto/add');
	// 		}
	// 	}

	// 	function update(){
		
	// 	$judul 		= $this->input->post('judul');
	// 	$deskripsi 	= $this->input->post('deskripsi');
	// 	$cover		= $this->input->post('cover');
		
	// 	$data 	= array(
	// 		'judul' => $judul,
	// 		'deskripsi' => $deskripsi,
	// 		'cover'	=> $cover
			
	// 		);
	// 	$id = $this->input->post('id');

	// 	$this->m_foto->update($id,$data);

	// 	$this->session->set_flashdata('success_msg','<div class="alert alert-info">Data Sukses Di Ubah </div>');
	// 	redirect('backend/foto');
	// }

	public function simpan() {
    $this->m_mapel->getsecurity();
    $id_mapel  	= $this->input->post('id_mapel');
	$mapel  	= $this->input->post('mapel');
    $data   	= array(
      		'id_mapel' 	=> $id_mapel,
      		'mapel' 	=> $mapel
      			);
		$this->m_mapel->simpan($data);
		$this->session->set_flashdata('success_msg','<div class="alert alert-success">Data Sukses Ditambah </div>');
		redirect('backend/mapel');
  }

		public function hapus($id){
		$e= $this->m_mapel->ubah($id)->row_array();
		if ($e!='') {
			unlink('./uploads/foto/'.$e['cover']);
		}else{
			echo 'kosong';
		}
		$this->m_mapel->hapus($id);
		$this->session->set_flashdata('delete_msg','<div class="alert alert-warning">success dihapus </div>');

		// redirect('backend/mapel');
	}

	public function ubah($id)	{
		$data['ed'] = 'update';
		$data['sql'] = $this->m_foto->ubah($id);
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('form',$data);
		$this->load->view('v_footer');
	}

	public function detail($id)	{
	
	$data['sql'] = $this->m_foto->getfoto(array('id'=> $id),true);
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('detail',$data);
		$this->load->view('v_footer');
	}
}