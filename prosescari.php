<?php 
    //Bahagian Pemprosesan Data Carian 
	//Data dari Borang Carian
	$cari=$_GET['email'];
    //Sambungan Ke DBMS
	include 'capaian.php';
;    // Query Semak Unit Kosong
	$SQL="SELECT *,DAY(tempahan.tarikhmasuk),DAY(tempahan.tarikhkeluar) from pelanggan inner join tempahan on pelanggan.nokp=tempahan.nokp inner join bilik on bilik.nobilik=tempahan.nobilik inner join jenis on jenis.kodjenis=bilik.kodjenis where email='$cari' ";
	$x=0;  // $x adalah pembilang
	$panggil=mysqli_query($connect,$SQL);
	while($data=mysqli_fetch_array($panggil)){
		$nokp=$data['nokp'];
	  	$nobilik=$data['nobilik'];
	  	$jenisbilik=$data['jenisbilik'];
	  	$harga=$data['harga'];
	  	$nama=$data['nama'];
	  	$notel=$data['notelefon'];
	  	$tmasuk=$data['tarikhmasuk'];
	  	$tkeluar=$data['tarikhkeluar'];
	  	$deposit=$data['deposit'];
	  	$harimasuk=$data['DAY(tempahan.tarikhmasuk)'];
	  	$harikeluar=$data['DAY(tempahan.tarikhkeluar)'];
	  	$bayaranakhir=$data['bayaranakhir'];
	  	$jumhari=$harikeluar-$harimasuk;
	  	$jumharga=$harga*$jumhari;
	  	$baki=$jumharga-($deposit+$bayaranakhir);
	  	$x++;
	
	echo "<table border='3'>";
	echo "<tr><td>Tempahan:</td><td>$x</td></tr>
		  <tr><td>Nama:</td><td>$nama - ($notel)</td></tr>
		  <tr><td>Tarikh Masuk & Keluar:</td><td>$tmasuk - $tkeluar</td></tr>
		  <tr><td>Bilik Ditempah:</td><td>$nobilik ($jenisbilik)</td></tr>
		  <tr><td>Harga Unit Ditempah:</td><td>RM$harga</td></tr>
		  <tr><td>Deposit:</td><td>RM$deposit</td></tr>
		  <tr><td>Bil Hari:</td><td>$jumhari hari</td></tr>
		  <tr><td>Jumlah Harga:</td><td>RM$jumharga</td></tr>
		  <tr><td>Baki Belum Bayar:</td><td>RM$baki</td></tr>
		 ";
	echo "</table><br>";
	}
  
?>  
	


