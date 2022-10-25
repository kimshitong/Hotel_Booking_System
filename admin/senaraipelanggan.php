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
			    	<?php if(!empty($_COOKIE['idadmin'])) { ?>
					<?php include 'paparpelanggan.php' ?>   
					<?php } else{ 
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
