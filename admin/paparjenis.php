<h3>Senarai Jenis Pakej Bilik</h3>
<table border="1">
	<tr><th>Bil</th><th>Kod Jenis</th><th>Jenis Pakej</th><th>Ameniti</th><th>Padam</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from jenis";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){
		$kodjenis=$data['kodjenis'];
		$jenisbilik=$data['jenisbilik'];
		$ameniti=$data['ameniti'];
		$i++;
		echo "<tr><td>$i</td><td>$kodjenis</td><td>$jenisbilik</td><td>$ameniti</td><td><a href='deletejenis.php?jenis=".$kodjenis."'>Padam</a></td></tr>";
	}
	mysqli_close($connect);
 ?>
 </table>




