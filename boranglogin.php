<?php if(empty($_GET['login'])) { ?>
	<!--Bahagian Borang Input Pengguna -->
<p>Sila LOGIN untuk membuat tempahan hotel</p>
<h3>Login Pelanggan</h3>
<form action="login.php" method="GET">
	<label>Email :</label><br>
	<input type="email" name="email" placeholder="email@mail.com">
	<br><br>
	<label>No Kad Pengenalan :</label><br>
	<input type="text" name="nokp" placeholder="000000-00-0000">
	<br><br>
	<input type="submit" name="login" value="LOGIN"><br>
</form>
<p>Jika belum mendaftar klik <a href="daftar.php">di sini.</a></p>
<?php }else{
	// Bahagian Proses Data
	$email=$_GET['email'];
	$nokp=$_GET['nokp'];
	// Sambung Fail ke DBMS
	include 'capaian.php';
	// Query
	$query="select * from pelanggan where '$email'=email AND '$nokp'=nokp ";
	// Laksanakan Query
	$run=mysqli_query($connect,$query);
    // Panggil Data
    $data=mysqli_fetch_array($run);
    	$nokp=$data['nokp'];
    	$nama=$data['nama'];
    	$notel=$data['notelefon'];
    	if(empty($nama)){
    		echo "Maaf, ".$nama." anda gagal login";
    		echo "<br>Sila login semula <a href='login.php'>di sini</a>";
    	}else{
    		echo "Tahniah, ".$nama." berjaya login<br><br>";
    		echo "<b>Statistik Urusniaga Anda:</b>";
    		//sisip fail statistik
    		include 'statistikpelanggan.php';
    		echo "<br><br>Sila klik <a href='tempahan.php?nokp=".$nokp."&nama=".$nama."'>di sini</a> untuk <b>TEMPAHAN</b> ";
    		echo "Atau <a href='hasilcari.php?email=".$email."'>di sini</a> untuk <b>SEMAK</b>";
    	}
    
} ?>


