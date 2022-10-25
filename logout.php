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
						if(!empty($_COOKIE['nokp'])) {
						// set expired cookie kepada 1 jam lepas
						setcookie("nokp", "", time() - 3600);
						echo "Anda Telah berjaya Logout";
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
