<?php 

	$host='localhost';
	$user='root';
	$pass='';
	$dbase='dbase_hotel';

	$connect=mysqli_connect($host,$user,$pass,$dbase);
	if(!$connect){
		echo "Datase gagal dicapai";
	}
 ?>