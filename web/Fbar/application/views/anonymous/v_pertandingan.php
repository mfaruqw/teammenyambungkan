							<<!DOCTYPE html>
							<html>
							<head>
								<title>Cetak Data Pertandingan</title>
							</head>
							<body>
							<h1 style="text-align: center;">Data Pertandingan </h1>
<p style="text-align: right;">Didownload Pada Tanggal : <?php echo date('d-M-Y') ?></p>
							<table border="1" width="100%">
							
							<thead>
								<tr>
								  
								   <th>No</th>
								   <th>ID Pertandingan</th>
								   <th>ID Pemain</th>
								   <th>ID Tempat</th>
								   <th>Nomor Lapangan</th>
								   <th>Tanggal Main</th>
								   <th>Lama Main / Jam</th>
								   <th>Total Harga</th>
								  
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