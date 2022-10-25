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
					<?php include 'borangtambahjenis.php'; ?>
					<!-- Masukkan Jadual Paparan Jenis Bilik-->
					<?php include 'paparjenis.php'; ?>
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
