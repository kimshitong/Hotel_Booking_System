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
						if(!empty($_COOKIE['idadmin'])) {
						// set expired cookie kepada 1 jam lepas
						setcookie("idadmin", "", time() - 3600);
						echo "Anda Telah berjaya Logout";
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
