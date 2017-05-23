							<<!DOCTYPE html>
							<html>
							<head>
								<title>Cetak Data Pemain</title>
							</head>
							<body>
							<h1 style="text-align: center;">Data Pemain </h1>
<p style="text-align: right;">Didownload Pada Tanggal : <?php echo date('d-M-Y') ?></p>
							<table border="1" width="100%">
							
							<thead>
								<tr>
								  
								   <th>No</th>
								   <th>ID Pemain</th>
								   <th>Nama</th>
								   <th>Jenis Kelamin</th>
								   <th>Tgl Lahir</th>
								   <th>Alamat</th>
								   <th>Posisi Sebagai</th>
								   <th>No. telp</th>
								   <th>Email</th>
								   <th>Tgl_Gabung</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									
								</tr>
							</tfoot>
						 
							<tbody>
							<?php
							$no=0;
							foreach ($cetak as $pemain) {
							 	# code...
						 

							?>
								<tr>
									
									<td> <?php $no++; echo $no; ?> </td>
									<td><?php echo $pemain->id_pemain; ?></td>
									<td><?php echo $pemain->nama; ?></td>
									<td><?php echo $pemain->jk; ?></td>
									<td><?php echo $pemain->tgl_lahir; ?></td>
									<td><?php echo $pemain->alamat; ?></td>
									<td><?php echo $pemain->posisi; ?></td>
									<td><?php echo $pemain->no_tlp; ?></td>
									<td><?php echo $pemain->email; ?></td>
									<td><?php echo $pemain->tgl_gabung; ?></td>
								
								</tr>
								
								<?php } ?>
								
								
							</tbody>
							
						</table>
						</body></html>