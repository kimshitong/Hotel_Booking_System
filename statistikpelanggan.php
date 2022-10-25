<?php 
	$cari=$_GET['email'];
    //statistik pelanggan
    include 'capaian.php';
    $SQLkira="select COUNT(tempahan.nokp),SUM(tempahan.deposit),SUM(tempahan.bayaranakhir) from tempahan inner join pelanggan on pelanggan.nokp=tempahan.nokp inner join bilik on bilik.nobilik=tempahan.nobilik where pelanggan.email='$cari'";
    $kira=mysqli_query($connect,$SQLkira); 
    $rekod = mysqli_fetch_array($kira); 
    //kiraan
    $jumtempah=$rekod['COUNT(tempahan.nokp)'];
    $jumdeposit=$rekod['SUM(tempahan.deposit)'];
    $telahbayar=$rekod['SUM(tempahan.bayaranakhir)'];
    $jumbayaran=$jumdeposit+$telahbayar;
    echo "<br>";
    echo "Jumlah Belian Anda: $jumtempah unit/bilik";
    echo "<br>Jumlah Bayaran Deposit: RM$jumdeposit";
    echo "<br>Jumlah Bayaran Akhir: RM$telahbayar ";
    echo "<br>Jumlah Bayaran Keseluruhan: RM$jumbayaran <br>";
   ?>