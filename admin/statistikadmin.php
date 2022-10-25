<?php 
    //statistik pelanggan
    echo "<i><u>Statistik Admin</i></u><br>";
    include 'capaian.php';
    $SQLkira="SELECT COUNT(tempahan.nokp),SUM(tempahan.deposit),SUM(tempahan.bayaranakhir) from pelanggan inner join tempahan on pelanggan.nokp=tempahan.nokp";
    $kira=mysqli_query($connect,$SQLkira); 
    $rekod = mysqli_fetch_array($kira); 
    //kiraan
    $jumtempahan=$rekod['COUNT(tempahan.nokp)'];
    $jumdeposit=$rekod['SUM(tempahan.deposit)'];
    $jumbayaranakhir=$rekod['SUM(tempahan.bayaranakhir)'];
    $jumkutipan=$jumdeposit+$jumbayaranakhir;
    echo "<br>Bilangan Tempahan: $jumtempahan";
    echo "<br>Jumlah Kutipan Deposit : RM$jumdeposit";
    echo "<br>Jumlah Kutipan Akhir : RM$jumbayaranakhir";
    echo "<br>Jumlah Keseluruhan Kutipan : RM$jumkutipan";

 ?>