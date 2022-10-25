<h3>Senarai Bilik Yang Ditawarkan:</h3>
<table border="1">
	<tr><th>Bil</th><th>No Bilik</th><th>Jenis Bilik</th><th>Harga</th><th>Kemudahan(Ameniti)</th><th>Padam</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from bilik inner join jenis on bilik.kodjenis=jenis.kodjenis order by bilik.nobilik LIMIT 25";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){

		$nobilik=$data['nobilik'];
		$jenisbilik=$data['jenisbilik'];
		$harga=$data['harga'];
		$ameniti=$data['ameniti'];
		$i++;
		echo "<tr><td>$i</td><td>$nobilik</td><td>$jenisbilik</td><td>RM$harga</td><td>$ameniti</td><td><a href='deletebilik.php?bilik=".$nobilik."'>Padam</a></td></tr>";
	}
	mysqli_close($connect);
 ?>
 </table>
