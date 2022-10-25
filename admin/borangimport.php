<!--Import Data Unit -->
<!--Bahagian Borang upload -->
<?php if(empty($_POST['import'])) { ?>
<h2>Kemudahan Import No Bilik, Jenis dan Harga</h2>
<p><b>Peringatan:</b> Sebelum anda tambah bilik dan menetapkan harga secara import, sila tambah dahulu jenis-jenis bilik/pakej pada menu Selenggara Data. Kemudian baru boleh tambah bilik-bilik di sini. </p>
<form action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
	<label>Masukkan Data Jenis CSV Bagi Menambah Bilik</label>
	<fieldset>
	<input type="file" name="file" id="file">
	<input type="submit" name="import" value="Upload Fail CSV">
	</fieldset>
</form>
<!-- Bahagian Pemprosesan Import -->
<?php }else{
	//Terima kiriman fail dari Borang Import
	$faildata=$_FILES['file']['tmp_name'];
	   $bukafail=fopen($faildata, "r");
	   //banyak data-data yang tersimpan hendak dibuka
	   while(($GETdata = fgetcsv($bukafail,1000, ",")) !== FALSE){
	   //Sambung ke Pangkalan Data DBMS
	   include 'capaian.php';
	   //Query masukan data
	   $SQL="insert into bilik(nobilik,kodjenis,harga)
	   		values('".$GETdata[0]."','".$GETdata[1]."','".$GETdata[2]."');";
	   $simpan=mysqli_query($connect,$SQL);
	   		if($simpan){
	   			echo "Import Bilik Baharu Telah Berjaya -";
				echo "<script type='text/javascript'>
	window.alert('Import Berjaya!');
</script>";
	   		}else{
	   			echo "Import Bilik Baharu Gagal -";
	   		}
	   } 
	   fclose($bukafail);
} 
?>