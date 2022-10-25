<?php if(empty($_POST['daftar'])) { ?>
	<!--Bahagian Borang Input Pengguna -->
<h3>Pendaftaran Pelanggan Baharu Di Clarion Hotel</h3>
<form action="daftar.php" method="POST">
	<label>Nama Pelanggan:</label>
	<input type="text" name="nama" placeholder="Nama Penuh"><br>
	<label>No Kad Pengenalan</label>
	<input type="text" name="nokp" placeholder="000000-00-00000"><br>
	<label>Email:</label>
	<input type="email" name="email" placeholder="email@mail.com"><br>
	<label>No. Telefon:</label>
	<input type="text" name="notel" placeholder="011-22334455"><br>
	<input type="submit" name="daftar" value="DAFTAR"><br>
</form>
<br> <a href="login.php">Login</a>
<?php }else{
	// Bahagian Proses Data
	$nama=$_POST['nama'];
	$nokp=$_POST['nokp'];
	$email=$_POST['email'];
	$notel=$_POST['notel'];
	// Sambung Fail ke DBMS
	include 'capaian.php';
	// Query
	$query="insert into pelanggan(nama,nokp,email,notelefon)
	values('$nama','$nokp','$email','$notel');";
	// Laksanakan Query
	$run=mysqli_query($connect,$query);
	// Dialog
	if($run){
			echo "<script type='text/javascript'>
	window.alert('Pendaftaran Berjaya.');
</script>";
		echo "Pendaftaran Berjaya";
		
		echo "<br>Gunakan email dan no kad pengenalan untuk
		login <a href='login.php'>di sini.</a></b>";
	}else{
				echo "<script type='text/javascript'>
	window.alert('Pendaftaran Gagal. Sila daftar semula');
</script>";
		echo "Pendaftaran Gagal";
	}
} ?>


