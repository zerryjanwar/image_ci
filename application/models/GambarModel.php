<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GambarModel extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
//public function view(){
	//return $this->db->get('gambar')->result();	
	//}
 public function view($sampai, $dari, $like = ''){
 
   if($like)
    $this->db->where($like);
 
   $query = $this->db->get('gambar',$sampai,$dari);
  // return $this->db->get('gambar')->result();	
   return $query->result();
  }
 
  //hitung jumlah row
 public function jumlah($like=''){
   
   if($like)
    $this->db->where($like);
     
   $query = $this->db->get('gambar');
   return $query->num_rows();
  }
	// Fungsi untuk menampilkan data siswa berdasarkan ID nya
	public function view_by($id){
		$this->db->where('id', $id);
		return $this->db->get('gambar')->row();
	}

	public function upload(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); 
		if($this->upload->do_upload('input_gambar')){ 
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	

	public function save($upload){
		$data = array(
			'card_id'=>$this->input->post('input_card_id'),
			'nama'=>$this->input->post('input_nama'),
			'nama_file' => $upload['file']['file_name'],
			'jenis_kelamin' => $this->input->post('input_jeniskelamin'),
			'telp' => $this->input->post('input_telp'),
			'alamat' => $this->input->post('input_alamat')
		);
		
		$this->db->insert('gambar', $data);
	}

	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save")
			$this->form_validation->set_rules('input_card_id', 'Card_ID', 'required|numeric|max_length[11]');
			$this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
			$this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('input_telp', 'telp', 'required|numeric|max_length[15]');
			$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
		if($this->form_validation->run())
			return TRUE; 
		else 
			return FALSE; 
	}	

	public function edit($id, $upload){
	$img = $upload['file']['file_name'];
	//$tes = $upload['file']['file_name'];
		if ($img == FALSE ){	
			$data = array(
				'card_id' => $this->input->post('input_card_id'),
				'nama' => $this->input->post('input_nama'),
				//'nama_file' => $upload['file']['file_name'],
				'jenis_kelamin' => $this->input->post('input_jeniskelamin'),
				'telp' => $this->input->post('input_telp'),
				'alamat' => $this->input->post('input_alamat'),
				'nama_file' => $this->input->post('input_img')

				);
		} else {
			$data = array(
				'card_id' => $this->input->post('input_card_id'),
				'nama' => $this->input->post('input_nama'),
				'nama_file' => $upload['file']['file_name'],
				'jenis_kelamin' => $this->input->post('input_jeniskelamin'),
				'telp' => $this->input->post('input_telp'),
				'alamat' => $this->input->post('input_alamat')
				);
			
		}
			//$upload['file']['file_name'];
			$this->db->where('id', $id);
			$this->db->update('gambar', $data); 
	}

	public function delete($id){

	//	$this->db->where('id', $id);
	//	$this->db->delete('gambar', $hps_img); 

		$this->db->where('id',$id);
     	$query = $this->db->get('gambar');
    	$row = $query->row();

     	unlink("./images/$row->nama_file");

     	$this->db->delete('gambar', array('id' => $id));
	}





}
//model table employee
