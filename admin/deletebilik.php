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
					<?php 
					//Ambil data dari URL
					$nobilik=$_GET['bilik'];
					//sambung ke Pangkalan Data
					include 'capaian.php';
					//Query arahan padam
					$sql = "DELETE FROM bilik WHERE nobilik='$nobilik' ";

					if (mysqli_query($connect, $sql)) {
    				echo "Rekod Berjaya Dipadam";
    				echo "<br><button onclick='halamanSebelum()'>Halaman Sebelum</button>";
    				} else {
    				echo "Rekod Gagal Dipadam ";
    				echo "<br>Padam Jenis Bilik Dahulu";
    				echo "<br><button onclick='halamanSebelum()'>Halaman Sebelum</button>";
    				}
					mysqli_close($connect);
					?>	
					<!--Javascript : Butang Fungsi Kembali ke Halaman Sebelum -->
						<script>
							function halamanSebelum() {
  							window.history.back();
							}
						</script>			
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
