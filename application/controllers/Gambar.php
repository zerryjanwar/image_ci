<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('GambarModel');
		$this->load->library('pagination');
		$this->load->helper(array('html','url','form'));
		//  $this->load->helper('html');
  		//	$this->load->library('table'); 
	}

	
	public function index(){
	    // Untuk redirect ke function lists
	//    $data['gambar'] = $this->GambarModel->view();

		//$this->load->view('gambar/view', $data);
		//$this->load->view('gambar/view',$data);
		//$this->load->view('index', $data);
            $dari      = $this->uri->segment('3');
            $sampai = 5;
            $like      = '';
             
            //hitung jumlah row
            $jumlah= $this->GambarModel->jumlah();
 
            //inisialisasi array
            $config = array();
 
            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/gambar/index/';
 
            //hitung jumlah row
           $config['total_rows'] = $jumlah;
 
           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;
 
           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;
 
           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous';
 
           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);
           
           
 
           //inisialisasi array
            $data = array();
 
            //ambil data buku dari database
           $data['gambar'] = $this->GambarModel->view($sampai, $dari, $like);
 
           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
         //  $data['title'] = 'Tutorial Pagination CodeIgniter | https://recodeku.blogspot.com';
 
           $this->load->view('gambar/view',$data);
 	 }
 	   public function cari()
       {
 
            //mengambil nilai keyword dari form pencarian
     $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';
 
     //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
     $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
 
     //mengambil nilari segmen 4 sebagai offset
            $dari      = $this->uri->segment('4');
 
            //limit data yang ditampilkan
            $sampai = 5;
 
            //inisialisasi variabel $like
            $like      = '';
 
            //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
            if($search) $like = "(nama LIKE '%$search%')";
             
            //hitung jumlah row
            $jumlah= $this->GambarModel->jumlah($like);
 
            //inisialisasi array
            $config = array();
 
            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'index.php/cari/'.$search;
 
            //hitung jumlah row
           $config['total_rows'] = $jumlah;
 
           //mengatur total data yang tampil per page
           $config['per_page'] = $sampai;
 
           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;
 
           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous';
 
           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);
           
           
 
           //inisialisasi array
            $data = array();
 
            //ambil data buku dari database
           $data['gambar'] = $this->GambarModel->view($sampai, $dari, $like);
 
           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
         //  $data['title'] = 'Tutorial Searching with Pagination CodeIgniter | https://recodeku.blogspot.com';
 
           $this->load->view('gambar/search',$data);
      }  

	public function tambah(){
		$data = array();
		
		if($this->input->post('submit')){ 

			if($this->GambarModel->validation("save")){
				$upload = $this->GambarModel->upload();
				if($upload['result'] == "success"){ 
					$this->GambarModel->save($upload);
					redirect('gambar'); 
				}else{ 
					$data['message'] = $upload['error'];
				}
			}
		}
		
		$this->load->view('gambar/form', $data);
	}

	public function hapus($id) {
		//$upload = $this->GambarModel->upload();
		$this->GambarModel->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
		redirect('gambar');
	}

	public function ubah($id){
		$data = array();
		//$upload="";
		if($this->input->post('submit')){
			$upload = $this->GambarModel->upload();
			if($this->GambarModel->validation("update")) { 	
				
				$this->GambarModel->edit($id, $upload); 
				redirect('gambar');
			}

		}
		$data['gambar'] = $this->GambarModel->view_by($id);
		$this->load->view('gambar/ubah', $data);
	}


} // Penutup fungsi class


 



