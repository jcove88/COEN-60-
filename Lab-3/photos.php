<!DOCTYPE html>
<html>
	<head> 
		<title>My Photo Album</title>
	</head>
	<body>
		<h1>Photo Album of Places</h1>
		<ul>
			<?php 
				$filepath = "photo/";	
				$photos = glob("/webpages/jcoveney/photo/*.jpg");
				foreach ($photos as $photoname) {
					echo "<li><a href = ", $filepath . basename($photoname),">", basename($photoname), "</a> (", round(( filesize($photoname))/1000), " KB)</li>";
					echo "<br>";
				}
			?>
		</ul>
	</body>
</html>
