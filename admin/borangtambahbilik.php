<?php if(empty($_POST['tambah'])) { ?>
	<form action="selenggarabilik.php" method="POST">	
			<label>No Bilik:</label>
			<input type="text" name="nobilik" placeholder="Eg: A101"><br><br>
			<label>Kod Jenis Bilik:</label>
			<select name="kodjenis">
			<?php 
				include 'capaian.php';
				$SQLjenis="select * from jenis";
				$panggil=mysqli_query($connect,$SQLjenis);
				while($data=mysqli_fetch_array($panggil)) {
			 	$kodjenis=$data['kodjenis'];
			 	$jenisbilik=$data['jenisbilik'];
			 	echo "<option value='$kodjenis'>$jenisbilik</option> ";
			} ?>
			</select><br><br>
			<label>Harga:</label>
			<input type="text" name="harga" placeholder="Eg: 100.00"><br><br>
			<input type="submit" name="tambah" value="TAMBAH">
	</form>
<?php }else{
	//Terima data dari borang secara POST
	$nobilik=$_POST['nobilik'];
	$kodjenis=$_POST['kodjenis'];
	$harga=$_POST['harga'];
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="insert into bilik(nobilik,kodjenis,harga) values ('$nobilik','$kodjenis','$harga')";
	//Laksanakan 
	$tambah=mysqli_query($connect,$SQL);
	if($tambah){
		echo "No Bilik Baharu Berjaya Ditambah";
		echo "<br><a href='selenggarabilik.php'>Tambah lagi</a>";
	} else {
		echo "No Bilik Baharu Gagal Ditambah";
	}
	mysqli_close($connect);
}
 ?>
 </table>



