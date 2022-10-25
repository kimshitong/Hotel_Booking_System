<h3>Senarai Pelanggan Berdaftar:</h3>
<table border="1">
	<tr><th>Bil</th><th>No Kad Pengenalan</th><th>Nama</th><th>Email</th><th>No Telefon</th><th>Padam</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from pelanggan order by nokp LIMIT 25";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$x = 0;
	while($data=mysqli_fetch_array($panggil)){

		$nokp=$data['nokp'];
		$nama=$data['nama'];
		$email=$data['email'];
		$notel=$data['notelefon'];
		$x++;
		echo "<tr><td>$x</td><td>$nokp</td><td>$nama</td><td>$email</td><td>$notel</td><td><a href='deletepelanggan.php?nokp=$nokp'>Padam</a></td></tr>";
	}
	mysqli_close($connect);
 ?>
 </table>
