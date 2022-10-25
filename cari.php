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
			    	<!--Bahagian Borang -->
					<h3>Masukkan Email Anda</h3>
					<form action="hasilcari.php" method="GET">
					<input type="email" name="email" placeholder="email@mail.com">
					<input type="submit" name="carian" value="CARI">
					</form>
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
