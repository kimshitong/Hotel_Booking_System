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
					<?php include 'borangtambahbilik.php'; ?>
					<!-- Masukkan Jadual Paparan Jenis Penonton-->
					<?php include 'paparbilik.php'; ?>
				</article>
				<aside> 
					<?php include 'statistikbilik.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>
