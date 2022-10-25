<?php 
	//Panggil data dari URL
	$nokp=$_GET['nokp'];
	$nobilik=$_GET['nobilik'];
	$mula=$_GET['mula'];
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select *,DAY(tempahan.tarikhmasuk),DAY(tempahan.tarikhkeluar) from tempahan inner join bilik where tempahan.nokp='$nokp' AND bilik.nobilik='$nobilik' AND tempahan.tarikhmasuk='$mula' ";
	//Laksanakan 
	$kemaskini=mysqli_query($connect,$SQL);
	$data=mysqli_fetch_array($kemaskini);
	$nokp=$data['nokp'];
	$nobilik=$data['nobilik'];
	$mula=$data['tarikhmasuk'];
	$akhir=$data['tarikhkeluar'];
	$harga=$data['harga'];
	//jumlah hari
	$jumhari=($data['DAY(tempahan.tarikhkeluar)']-$data['DAY(tempahan.tarikhmasuk)']);
	//jumlah harga sewaan 
	$jumsewaan=$jumhari*$harga;
	$deposit=$data['deposit'];
	//jumlah baki belum bayar
	$bayaranakhir=$data['bayaranakhir'];
	$baki=$jumsewaan-($deposit+$bayaranakhir);
	$jumlahdibayar=$bayaranakhir+$deposit;
	if($jumlahdibayar != $jumsewaan){ 
	  echo '<form action="kemaskini.php" method="GET">
			Pelanggan = '.$nokp.' (Bilik: '.$nobilik.')<br>
			Dari : '.$mula.' <br>
			Hingga : '.$akhir.' <br>
			Jumlah Hari & Sewaan : '.$jumhari.' hari x RM'.$harga.' <br>
			Jumlah Harga Sewaan : RM'.$jumsewaan.' <br>
			Deposit : RM'.$deposit.' <br>
			Baki Perlu Bayar : RM'.$baki.' <br>

			<input type="hidden" name="nokp" value="'.$nokp.'">
			<input type="hidden" name="nobilik" value="'.$nobilik.'">
			<input type="hidden" name="mula" value="'.$mula.'">
			<label>Bayaran Akhir :</label> RM
			<input type="text" name="bayaranakhir">
			<input type="submit" name="submit" value="Kemaskini">
			</form>';

    } else {
		echo "Bayaran Anda Semua Telah Selesai";
	}

	mysqli_close($connect);

 ?>
 </table>