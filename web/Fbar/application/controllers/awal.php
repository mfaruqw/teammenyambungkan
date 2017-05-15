<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class awal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('model_fbar');
		$this->load->helper('text');
		
	}

public function index(){

	$data['a'] = $this->model_fbar->tampil_tempat();
	$data['pe'] = $this->model_fbar->tampil_pemainmax();
	$this->load->view('v_index',$data);	
}


	function insert_hubungi(){

	$nama = $this->input->post('name');
	$email = $this->input->post('email');
	$subjek = $this->input->post('subject');
	$pesan = $this->input->post('message');

if($nama != ' ' && $email!= ' ' && $subjek != ' '  && $pesan != ''){
	$data = array(
	'nama_pengirim' => $nama,
	'email' => $email,
	'subjek' => $subjek,
	'pesan' => $pesan,
	'tanggal' => date('Y-m-d h:i:s')
	);

	$this->model_fbar->input_data($data,'hubungi_kami');
	redirect('awal');

	}

else{
        echo "<script type='text/javascript'>alert('Inputan harus diisi') ;</script>";
		echo "<script>window.location=('javascript:history.go(-1)')</script>";
		}
}

function insert_daftar(){
	$id_baru = $this->input->post('id_pe');
	$nama = $this->input->post('nama');
	$jk = $this->input->post('jk');
	$alamat = $this->input->post('alamat');
	$tgl = $this->input->post('tgl');
	$pos = $this->input->post('pos');
	$no = $this->input->post('no');
	$email = $this->input->post('email');
	$password = md5($this->input->post('password'));

	

	

if($nama != ' ' && $jk != ' ' && $alamat != ' '  && $tgl != '' && $pos != '' && $no != '' && $email != '' && $password != '' ){
	$data = array(
	'id_pemain' => $id_baru,	
	'nama' => $nama,
	'jk' => $jk,
	'tgl_lahir' => $tgl,
	'alamat' => $alamat,
	'posisi' =>$pos,
	'no_tlp' =>$no,
	'email' =>$email,
	'password' => $password,
	'tgl_gabung' => date('Y-m-d h:i:s')
		);

	$this->model_fbar->input_data($data,'pemain');
	redirect('awal');

	}

else{
        echo "<script type='text/javascript'>alert('Inputan harus diisi') ;</script>";
		echo "<script>window.location=('javascript:history.go(-1)')</script>";
		}
}


	
}

?>