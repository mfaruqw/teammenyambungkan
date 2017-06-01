							<<!DOCTYPE html>
							<html>
							<head>
								<title>Cetak Data Pertandingan</title>
							</head>
							<body>
							<h1 style="text-align: center;">Data Pertandingan </h1>
<p style="text-align: right;">Didownload Pada Tanggal : <?php echo date('d-M-Y') ?></p>
							<table border="1" width="100%" align="center">
							
							<thead>
								<tr>
								  
								   <th align="center">No</th>
								   <th align="center">ID Pertandingan</th>
								   <th align="center">ID Pemain</th>
								   <th align="center">ID Tempat</th>
								   <th align="center">Nomor Lapangan</th>
								   <th align="center">Tanggal Main</th>
								   <th align="center">Lama Main / Jam</th>
								   <th align="center">Total Harga</th>
								  
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									
								</tr>
							</tfoot>
						 
							<tbody>
							<?php
							$no=0;
							foreach ($cetakper as $p) {
							 	# code...
						 

							?>
								<tr>
									
									<td> <?php $no++; echo $no; ?> </td>
									<td><?php echo $p->id_pertandingan; ?></td>
									<td><?php echo $p->id_pemain; ?></td>
									<td><?php echo $p->id_tempat; ?></td>
									<td><?php echo $p->no_lapangan; ?></td>
									<td><?php echo $p->tanggal_main; ?></td>
									<td><?php echo $p->end_jam_main - $p->start_jam_main; ?></td>
									<td><?php echo $p->total_harga; ?></td>
									
								</tr>
								
								<?php } ?>
								
								
							</tbody>
							
						</table>
						</body></html>