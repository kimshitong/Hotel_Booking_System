<?php if(empty($_POST['tambah'])) { ?>
	<form action="selenggarajenis.php" method="POST">	
			<label>Kod Jenis Bilik:</label>
			<input type="text" name="kodjenis" placeholder="DLX/SPR"><br><br>
			<label>Jenis Pakej Bilik:</label>
			<input type="text" name="jenisbilik" placeholder="Deluxe/Superior/Premium"><br><br>
			<label>Kemudahan(Ameniti)</label>	
			<input type="text" name="ameniti" size="100"><br><br>
			<input type="submit" name="tambah" value="TAMBAH">
	</form>
<?php }else{
	//Terima data dari borang secara POST
	$kodjenis=$_POST['kodjenis'];
	$jenisbilik =$_POST['jenisbilik'];
	$ameniti=$_POST['ameniti'];
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="insert into jenis(kodjenis,jenisbilik,ameniti) values ('$kodjenis','$jenisbilik','$ameniti')";
	//Laksanakan 
	$tambah=mysqli_query($connect,$SQL);
	if($tambah){
		echo "Jenis Pakej Bilik Baharu Berjaya Ditambah";
	} else {
		echo "Jenis Pakej Bilik Baharu Gagal Ditambah";
	}
	mysqli_close($connect);
}
 ?>
 </table>



