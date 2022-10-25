<!--Bahagian Pertama : Borang -->
<?php if(empty($_POST['semak'])) { ?>
<h2>Semak Tempahan</h2>
<p>Masukkan Tarikh</p>
<form action="semak.php" method="POST">
	Masuk Tarikh Mula:
	<input type="date" name="mula" ><br>
	Masuk Tarikh Akhir:
	<input type="date" name="akhir" ><br>
	<input type="submit" name="semak" value="SEMAK">
</form>
<!--Bahagian Kedua: Pemprosesan Data -->
<?php }else{
	//pindahkan data secara POST ke sini
	$tmula=$_POST['mula'];
	$takhir=$_POST['akhir'];
	//Papar Jadual Tempahan
	echo "<table border='1'><tr><th>Bil</th><th>Unit - Harga</th><th>Masuk</th><th>Keluar</th><th>Bil Hari</th><th>Pelanggan</th><th>Deposit</th><th>Baki Bayaran</th><th>Padam</th></tr>";
	//Sambung ke pangkalan data
	include 'capaian.php';
	//Query
	$SQL="select *,DAY(tempahan.tarikhmasuk),DAY(tempahan.tarikhkeluar) from pelanggan inner join tempahan on pelanggan.nokp=tempahan.nokp inner join bilik on bilik.nobilik=tempahan.nobilik where tarikhmasuk BETWEEN '$tmula' AND '$takhir' OR tarikhkeluar BETWEEN '$tmula' AND '$takhir' order by tempahan.tarikhmasuk";
	//Pembilang
	$i=0; 
	$semak=mysqli_query($connect,$SQL);
	echo "<h3>Dari $tmula hingga $takhir - Jadual Tempahan :</h3>";
	while($hasil=mysqli_fetch_array($semak)){
	$nokp=$hasil['nokp'];
	$mula=$hasil['tarikhmasuk'];
	$akhir=$hasil['tarikhkeluar'];
	$nobilik=$hasil['nobilik'];
	$deposit=$hasil['deposit'];
	$pelanggan=$hasil['nama'];
	$harga=$hasil['harga'];
	//tambah jumlah hari
	$jumhari=($hasil['DAY(tempahan.tarikhkeluar)'] - $hasil['DAY(tempahan.tarikhmasuk)']);
	$deposit=$hasil['deposit'];
	$bayaranakhir=$hasil['bayaranakhir'];
	//tambah jumlah harga
	$jumharga=$harga*$jumhari;
	$baki=($jumharga-($deposit+$bayaranakhir));
	$i++;
	echo "<tr>
			<td>$i</td><td>$nobilik - RM $harga</td><td>$mula</td><td>$akhir</td><td>$jumhari</td><td>$pelanggan</td><td>RM$deposit</td><td>RM$baki</td>
			    <td><a href='deletetempahan.php?nokp=$nokp&&nom=$nobilik&&masuk=$mula'>Padam</a></td>
		  </tr>";
	}
	echo "</table>";
	mysqli_close($connect);
  } 
?>
<p><a href="semak.php">Semak Lagi</a></p>