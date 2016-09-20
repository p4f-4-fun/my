<?php
	session_start();
		
	if (!isset($_SESSION['logged'])) {
		header('Location: index.php');
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<title>- NATO Authentication -</title>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800" />
	<link rel="shortcut icon" href="assets/favicon.ico">
</head>
<body>
	<header id="header" class="box_shadow" style="position: fixed;">
		<span style="font-size: 24px; text-align: center;">
			<p>
				NATO - Authentication System &nbsp;
				<a href="lgout.php" id="a_lgout">	
					Log me out!
				</a>
			</p>
		</span>
	</header>
	
	<!-- 100px space between header and container -->
	<div style="height: 100px;"></div>
	
	<div id="container">
	
		<div id="content" class="box_shadow">
				
		</div> <!-- </content> -->
		
		<div id="footer" class="box_shadow">
			&copy; All rights reserved.
		</div> <!-- </footer> -->
		
	</div> <!-- </container> -->
</body>
</html>
