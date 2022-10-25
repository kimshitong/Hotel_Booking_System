<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Clarion Hotel</title>
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
			    	<?php include 'statistikpelanggan.php' ?>
			    	<br>
			    	<?php include 'prosescari.php'; ?>
					<button onclick="fungsiCetak()">CETAK</button> 
<button onclick="fungsiBack()">BACK</button>
<script type="text/javascript">
	function fungsiCetak(){
		window.print();
	}
	function fungsiBack(){
		window.open("cari.php");
	}
</script>	

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
