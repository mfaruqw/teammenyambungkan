<?php
	include "koneksi.php";
	
	$nama_match	= $_POST['nama_match'];
	$pilih_tempat = $_POST['pilih_tempat'];
	$max_pemain = $_POST['max_pemian'];
	
	class emp{}
	
	if (empty($nama_match) || empty($pilih_tempat)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysql_query("INSERT INTO pertandingan (id_pertandingan,nama_match,pilih_tempat,max_pemain) VALUES('','".$nama_match."','".$pilih_tempat."','".$max_pemain."')");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di simpan";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error simpan Data";
			die(json_encode($response)); 
		}	
	}
?>