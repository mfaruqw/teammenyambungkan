<?php
	include "koneksi.php";
	$id = $_POST['id_tempat'];
	$query = mysql_query("SELECT * FROM tempat_futsal WHERE id_tempat='".$id."'");
	while ($row = mysql_fetch_array($query)){
		$char ='"';
		$tgl	= date("d M Y", strtotime($row['tanggal']));
		$string = $row['detail'];
		$json = '{
				"id_tempat": "'.str_replace($char,'`',strip_tags($row['id_tempat'])).'", 
				"nama_tempat": "'.str_replace($char,'`',strip_tags($row['nama_tempat'])).'",
				"tanggal": "'.str_replace($char,'`',strip_tags($tgl)).'", 
				"isi": "'.str_replace($char,'`', $string).'",
				"gambar": "'.$row['gambar'].'"}';
	}
	echo $json;
	mysql_close($connect);
?>