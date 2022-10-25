<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Clarion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<?php include 'header.php'; ?>
	</header>
		<nav>
			<?php include 'nav.php'; ?>
		</nav>
			<section>
			    <article>
					<?php 
						$nokp=$_GET['id'];
						$nobilik=$_GET['nobilik'];
						$masuk=$_GET['tarikhmasuk'];
						$keluar=$_GET['tarikhkeluar'];
						$deposit=$_GET['deposit'];
						$bayaranakhir= 0 ;
						//Sambungan Ke DBMS
						include 'capaian.php';
						// Query SIMPAN Data
						$SQL="insert into tempahan (tarikhmasuk,tarikhkeluar,deposit,bayaranakhir,nokp,nobilik)values('$masuk','$keluar','$deposit','$bayaranakhir','$nokp','$nobilik')";		
						$simpan=mysqli_query($connect,$SQL);
						if($simpan){
							echo "Tempahan Anda Berjaya";
						}else{
							echo "Tempahan Gagal,<br>Sila Isi Semula Borang Tempahan";
						}
					 ?>
				</article>
				<aside> 
					<?php include 'asideinfo.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>
