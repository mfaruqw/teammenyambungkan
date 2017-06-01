							<!DOCTYPE html>
							<html>
							<head>
								<title>Cetak Data Pemain</title>
							</head>
							<body>
							<h1 style="text-align: center;">Data Pemain </h1>
							<p style="text-align: right;">Didownload Pada Tanggal : <?php echo date('d-M-Y') ?></p>
							<table border="0.5" align="center" width="100%">
							
				
								<tr>
								  
								   <th align="center">No</th>
								   <th align="center">ID Pemain</th>
								   <th align="center">Nama</th>
								   <th align="center">Jenis Kelamin</th>
								   <th align="center">Tgl Lahir</th>
								   <th align="center">Alamat</th>
								   <th align="center">Posisi Sebagai</th>
								   <th align="center">No. telp</th>
								   <th align="center">Email</th>
								   <th align="center">Tgl_Gabung</th>
								</tr>
								
						
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
								
								
							
							
						</table>
						</body></html>