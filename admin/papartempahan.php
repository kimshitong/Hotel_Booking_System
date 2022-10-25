<h3>Laporan Tempahan Pelanggan</h3>
<table border="1">
	<tr><td>Bil</td><td>Bilik</td><td>Mula</td><td>Akhir</td><td>Bil Hari</td><td>Pelanggan</td><td>Deposit</td><td>Baki</td>
	<td>Kemaskini Bayaran</td></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select *,DAY(tempahan.tarikhmasuk),DAY(tempahan.tarikhkeluar) from pelanggan inner join tempahan on pelanggan.nokp=tempahan.nokp inner join bilik on bilik.nobilik=tempahan.nobilik order by tempahan.tarikhmasuk";
	//Pembilang
	$i=0; 
	$semak=mysqli_query($connect,$SQL);
	while($hasil=mysqli_fetch_array($semak)){
	$nokp=$hasil['nokp'];
	$mula=$hasil['tarikhmasuk'];
	$akhir=$hasil['tarikhkeluar'];
	$nobilik=$hasil['nobilik'];
	$deposit=$hasil['deposit'];
	$pelanggan=$hasil['nama'];
	$harga=$hasil['harga'];
	$bayaranakhir=$hasil['bayaranakhir'];
	//tambah jumlah hari
	$jumhari=($hasil['DAY(tempahan.tarikhkeluar)'] - $hasil['DAY(tempahan.tarikhmasuk)']);
	$deposit=$hasil['deposit'];
	//tambah jumlah harga
	$jumharga=$harga*$jumhari;
	$baki=($jumharga-($deposit+$bayaranakhir));
	$i++;
	echo "<tr>
			<td>$i</td><td>$nobilik - RM $harga</td><td>$mula</td><td>$akhir</td><td>$jumhari</td><td>$pelanggan</td><td>RM$deposit</td><td>RM$baki</td>
				<td><a href='edittempahan.php?nokp=$nokp&nobilik=$nobilik&mula=$mula'>Edit Bayaran</a></td>
			    </tr>";
	}
	echo "</table>";
	mysqli_close($connect);
   
?>

 



