<?php if(empty($_POST['tempahan'])) { 
	  $id=$_GET['nokp'];
	  $nama=$_GET['nama']; 
?>
<!--Bahagian Borang Pilih Tarikh -->
<h3>Borang Tempahan Hotel : Clarion Hotel</h3>
<form action="tempahan.php?nokp=$id&nama=$nama" method="POST">
	<p>ID Anda: <?php echo $id ?> (<?php echo $nama ?>)</p>
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<label>Pilih Tarikh Masuk</label> - - - 
	<label>Pilih Tarikh Keluar</label><br>
	<input type="date" name="tmsk" > - 
	<input type="date" name="tklr" ><br><br>
	<input type="submit" name="tempahan" value="MASUK">
</form>
<p>IKLAN HERE</p>
<?php }else{
	// Bahagian Proses Data Tarikh Sesuai
	$nokp=$_POST['id'];
	$masuk=$_POST['tmsk'];
	$keluar=$_POST['tklr'];
    //Sambungan Ke DBMS
	include 'capaian.php';
    // Query Semak Unit Kosong
	$SQL="SELECT * from tempahan where tarikhmasuk >= '$masuk' 
		  AND tarikhkeluar <='$keluar' ";
	echo "Bilik-Bilik Yang Tidak Boleh Ditempah:";
	echo "<br>-";
	$panggil=mysqli_query($connect,$SQL);
	while($data=mysqli_fetch_array($panggil)){
	  	$nobilik=$data['nobilik'];
	  	// Papar tarikh format d-m-y
	  	$tmasuk=date('d-m-Y',strtotime($data['tarikhmasuk']));
	  	$tkeluar=date('d-m-Y',strtotime($data['tarikhkeluar']));
	  	echo "<br><b style='color:red;'>$nobilik</b> ($tmasuk - $tkeluar) ";
	} 
?>
 	<!-- Fail Pemproses Tempahan : prosestempahan.php -->
 	<form action="prosestempahan.php?nokp=$id&nama=$nama" method="GET">
 		<input type="hidden" name="id" value="<?php echo $nokp ?>">
 		<p>Tarikh Pilihan Anda:</p>
 		<label>Tarikh Masuk: </label><?php echo $masuk ?>
 		<input type="hidden" name="tarikhmasuk" 
 		value="<?php echo $masuk ?>"><br>
 		<label>Tarikh Keluar: </label><?php echo $keluar ?>
 		<input type="hidden" name="tarikhkeluar" 
 		value="<?php echo $keluar ?>"><br>
 		<p style="color:red;">Elakkan No Bilik Yang Sudah Ditempah<br>
 		Rujuk senarai di atas.</p>
 		<label>No Bilik:</label>
			<select name="nobilik">
	<!-- Guna Data dari DBMS  -->
	<?php  
		include 'capaian.php';
		$SQLbilik="select * from bilik";
		$panggilbilik=mysqli_query($connect,$SQLbilik);
		while($databilik=mysqli_fetch_array($panggilbilik)) {
			$nobilik=$databilik['nobilik'];
			$kodjenis=$databilik['kodjenis'];
			$harga=$databilik['harga'];
		echo "<option value='$nobilik'>$nobilik($kodjenis-RM$harga)</option>";  
		}
		?>		
			</select><br><br>
		<label>Deposit: </label>RM
		<input type="text" name="deposit" placeholder="Minima 50.00"><br><br>
		<input type="submit" name="prosestempah" value="PROSES">
 	</form>
 	<br>
 	<button onclick="window.location.href = 'cari.php';">Tukar Tarikh Tempahan</button>
<?php }
 ?>
