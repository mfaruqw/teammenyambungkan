<?php
session_start();
class c_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username')=="") {
			redirect('anonymous/auth');
		}
		$this->load->model('model_fbar');
		$this->load->helper('text');
		
	}

	public function index() {
		$data['username'] = $this->session->userdata('username');
		$data['anonymous'] = $this->model_fbar->tampil_tempat();
		$data['a'] = $this->model_fbar->tampil_tempatmax();
		$data['ans'] = $this->model_fbar->tampil_hubungi();
		$this->load->view('anonymous/index',$data);
	}

	
	function tambahtempat_aksi(){
	$id_tem = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$no_telp = $this->input->post('no');
	$desk= $this->input->post('desk');



		$this->load->library('upload');
        $nmfile = "file_".$id_tem; //nama file + fungsi time
        $config['upload_path'] = './assets/img/tempat/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
     
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
				'id_tempat' => $id_tem,
				'nama_tempat' => $nama,
				'alamat' => $alamat,
				'no_tlp' => $no_telp,
				'gambar' => $gbr['file_name'],
				'deskripsi' => $desk

	);
                //akses model untuk menyimpan ke database
				$this->model_fbar->input_data($data,'tempat');
                  
              

                
                //dibawah ini merupakan code untuk resize
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/img/tempat/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 500; //lebar setelah resize menjadi 100 px
                $config2['height'] = 500; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
               redirect('anonymous/c_admin'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
              redirect('anonymous/c_admin/kk'); //jika gagal maka akan ditampilkan form upload
           
        }



	
	 
	
	
	}

function hapus($id){

$where = array('gambar' => $id);
$namafile='assets/img/tempat/'.$id;

$this->model_fbar->hapus_data($where,'tempat');
 unlink ($namafile); 
redirect('anonymous/c_admin');
}



 
function edittempat($id){
$where = array('id_tempat' => $id);
$data['edit'] = $this->model_fbar->edit_data($where,'tempat')->result();
$this->load->view('anonymous/v_edittempat',$data);
}


 
 function edit_aksi(){
 	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$no_telp = $this->input->post('no');
	$desk= $this->input->post('desk');
	$idg = $this->input->post('idgam');

	$namafile='assets/img/tempat/'.$idg;

	
    unlink ($namafile); 
	

	$this->load->library('upload');
    $nmfile = "file_".$id; //nama file + fungsi time
    $config['upload_path'] = './assets/img/tempat/'; //Folder untuk menyimpan hasil upload
	$config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	$config['max_size'] = '3072'; //maksimum besar file 3M
	$config['max_width']  = '5000'; //lebar maksimum 5000 px
	$config['max_height']  = '5000'; //tinggi maksimu 5000 px
	$config['file_name'] =$nmfile; //nama yang terupload nantinya

    $this->upload->initialize($config);

      if ($this->upload->do_upload('filefoto'))
            {
    $gbr = $this->upload->data();


		     $data = array(
               //	'id_tempat' => $id,
				'nama_tempat' => $nama,
				'alamat' => $alamat,
				'no_tlp' => $no_telp,
				'gambar' => $gbr['file_name'],
				'deskripsi' => $desk

	);
                $where = array(
		'id_tempat' => $id
	);

	$this->model_fbar->update_data($where,$data,'tempat');

	//dibawah ini merupakan code untuk resize
                $config2['image_library'] = 'gd2'; 
                $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config2['new_image'] = './assets/img/tempat/'; // folder tempat menyimpan hasil resize
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 500; //lebar setelah resize menjadi 100 px
                $config2['height'] = 500; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config2); 
       if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
               redirect('anonymous/c_admin'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
              redirect('anonymous/c_admin/kk'); //jika gagal maka akan ditampilkan form upload
           
        }

}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('anonymous/auth');
	}
}
?>