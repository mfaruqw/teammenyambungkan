<?php
	include "koneksi.php";
	sleep(2);
	$offset = isset($_GET['offset']) && $_GET['offset'] != '' ? $_GET['offset'] : 0;
	$all = mysql_query("SELECT * FROM tempat_futsal ORDER BY id_tempat DESC");
	$count_all = mysql_num_rows($all);
	$query = mysql_query("SELECT * FROM tempat_futsal ORDER BY id_tempat DESC LIMIT $offset,10");
	$count = mysql_num_rows($query);
	$json_kosong = 0;
	if($count<10){
		if($count==0){
			$json_kosong = 1;
		}else{
			$query = mysql_query("SELECT * FROM tempat_futsal ORDER BY id_tempat DESC LIMIT $offset,$count");
			$count = mysql_num_rows($query);
			if(empty($count)){
				$query = mysql_query("SELECT * FROM tempat_futsal ORDER BY id_tempat DESC LIMIT 0,10");
				$num = 0;
			}else{
				$num = $offset;
			}
		}
	} else{
		$num = $offset;
	}
	$json = '[';
	while ($row = mysql_fetch_array($query)){
		$num++;
		$char ='"';
		$tgl	= date("d M Y", strtotime($row['tanggal']));
		$string = substr(strip_tags($row['value']), 0, 200);
		$json .= '{
			"no": '.$num.',
			"id_tempat": "'.str_replace($char,'`',strip_tags($row['id_tempat'])).'", 
			"nama_tempat": "'.str_replace($char,'`',strip_tags($row['nama_tempat'])).'",
			"tanggal": "'.str_replace($char,'`',strip_tags($tgl)).'", 
			"detail": "'.str_replace($char,'`', $string." ...").'",
			"gambar": "'.str_replace($char,'`',strip_tags($row['gambar'])).'"},';
	}
	$json = substr($json,0,strlen($json)-1);
	if($json_kosong==1){
		$json = '[{ "no": "", "id_tempat": "", "judul": "", "tgl": "", "isi": "", "gambar": ""}]';
	}else{
		$json .= ']';
	}
	echo $json;
	mysql_close($connect);


?>