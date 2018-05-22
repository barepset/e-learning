<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_backend
{
    function __construct()
    {
       	parent::__construct();
 		$this->load->model("m_video");
		$this->m_video->getsecurity();
 		$this->data['sql'] = $this->m_video->getvideo();

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
		if(isset($_FILES['gambar']))
		{
			$this->upload->initialize(array(
				'upload_path' => './uploads/video/',
				'create_thumb' => FALSE,
				'allowed_types' => 'png|jpg|gif',
				'max_size' => '5000',
				'max_width' => '3000',
				'max_height' => '3000'
			));

			if($this->upload->do_upload('gambar')){

				$data_upload = $this->upload->data();
				$ext = pathinfo($data_upload, PATHINFO_EXTENSION);
				$this->image_lib->initialize(array(

					'image_library' => 'gd2',
					'source_image' => './uploads/video/'.$data_upload['file_name'],
					'new_image' => './thumbs/video/',
					'maintain_ratio' => TRUE,
					'create_thumb' => FALSE,
					'quality' => '20%',
					'width' => 75,
					'height' => 50


				));
				chmod($data_upload, 0777);
				if(!$this->image_lib->resize()){
				redirect('backend/video/add');
				}

			}

			$data = array(
				'gambar'	=> $data_upload['file_name'],
				'judul_video' 	=> $this->input->post('judul_video'),
				'deskripsi' 	=> $this->input->post('deskripsi'),
				'video_url' 	=> $this->input->post('video_url')
				);
		$this->m_video->simpan($data);
		$this->session->set_flashdata('success_msg','<div class="alert alert-success">Data Sukses Di Simpan </div>');
		redirect('backend/video');


		}	else {
		$this->session->set_flashdata('delete_msg','<div class="alert alert-warning"> Data  gagal di  Tambah</div>');

				redirect('backend/video/add');
			}
		}

		function update(){
		
		$judul_video 		= $this->input->post('judul_video');
		$deskripsi 	= $this->input->post('deskripsi');
		$video_url = $this->input->post('video_url');
		$gambar		= $this->input->post('gambar');

		$data 	= array(
			'judul_video' => $judul_video,
			'deskripsi' => $deskripsi,
			'video_url' => $video_url,
			'gambar'	=> $gambar
			
			);
		$id_video = $this->input->post('id_video');

		$this->m_video->update($id_video,$data);

		$this->session->set_flashdata('success_msg','<div class="alert alert-info">Data Sukses Di Ubah </div>');
		redirect('backend/video');
	}

		public function hapus($id_video){
		$e= $this->m_video->ubah($id_video)->row_array();
		if ($e!='') {
			unlink('./uploads/video/'.$e['gambar']);
		}else{
			echo 'kosong';
		}
		$this->m_video->hapus($id_video);
		$this->session->set_flashdata('delete_msg','<div class="alert alert-warning">success dihapus </div>');

		redirect('backend/video');
	}

	public function ubah($id_video)	{
		$data['ed'] = 'update';
		$data['sql'] = $this->m_video->ubah($id_video);
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('form',$data);
		$this->load->view('v_footer');
	}

	public function detail($id_video)	{
	
	$data['sql'] = $this->m_video->getvideo(array('id_video'=> $id_video),true);
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('detail',$data);
		$this->load->view('v_footer');
	}
}