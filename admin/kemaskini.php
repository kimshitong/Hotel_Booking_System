<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Clarion: Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<?php include 'header.php'; ?>
	</header>
		<nav>
			<?php include 'navadmin.php'; ?>
		</nav>
			<section>
			    <article>
			    	<?php if(!empty($_COOKIE['idadmin'])) { 
					//Panggil data dari URL
					$nokp=$_GET['nokp'];
					$nobilik=$_GET['nobilik'];
					$mula=$_GET['mula'];
					$bayaranakhir=$_GET['bayaranakhir'];
					//sambung ke Pangkalan Data
					include 'capaian.php';
					//Query panggil semua data
					$SQL="update tempahan SET bayaranakhir=$bayaranakhir where nokp='$nokp' AND nobilik='$nobilik' AND tarikhmasuk='$mula' ";
					//Laksanakan 
					$kemaskini=mysqli_query($connect,$SQL);
					if($kemaskini){
						echo "Bayaran telah dikemaskini";
					}else {
						echo "Bayaran gagal dikemaskini";
					}

					mysqli_close($connect);

 				} else{ 
						echo "Maaf Sesi Login Telah Tamat";
						echo "<br>Mohon Admin Login Semula";
						echo "<br>Klik <a href='index.php'>di sini</a> untuk Login semula";
						} ?>
					
				</article>
				<aside> 
					<?php include 'sidenavadmin.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>
