<?php 
    //statistik bilik
    echo "<i><u>Statistik Admin</i></u><br>";
    include 'capaian.php';
    $SQLkira="SELECT COUNT(nobilik) from bilik";
    $kira=mysqli_query($connect,$SQLkira); 
    $rekod = mysqli_fetch_array($kira); 
    //kiraan
    $jumbilik=$rekod['COUNT(nobilik)'];
    echo "<br>Bilangan Bilik: $jumbilik";
?>