<?php
	session_start();
	session_regenerate_id(true);
		
	if((isset($_SESSION['logged'])) && ($_SESSION['logged'] == true)) {
		header('Location: sgtpanel.php');
		exit();
	} else {
		$_SESSION['nick'] = 'Unknown';
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
				NATO - Authentication System
			</p>
		</span>
	</header>
	
	<!-- 100px space between header and container -->
	<div style="height: 100px;"></div>
	
	<div id="container">
		<div id="content" class="box_shadow">
			<div id="login_form_window">
				<form action="auth.php" method="post" class="box_shadow" id="login_form_in">
				
					Welcome <?php echo $_SESSION['nick']; ?>! <hr />
					
					Login: <br /> 
						<input type="text" placeholder="Type your login here" name="lgin" /> <br />
							<!-- 10px space between login and password inputs fields -->
							<div style="height: 10px;"></div>
							
					Password: <br />
						<input type="password" placeholder="Type your password here" name="passwd" /> <br />
					
					<!-- Submit -->
						<input type="submit" value="Log in!" id="submit_key"/>
					
					<?php
						if( ( isset( $_SESSION['login_error'] ) ) && 
						    (!empty( $_SESSION['login_error'] ) ) 
						  ) {
							echo '<div id="login_errd">' . $_SESSION['login_error'] . '</div>';
						}	unset( $_SESSION['login_error'] );
					?>
					
				</form>	
			</div> <!-- </login_form_window> -->
		</div> <!-- </content> -->
		
		<div id="footer" class="box_shadow">
			&copy; All rights reserved.
		</div> <!-- </footer> -->
		
	</div> <!-- </container> -->
</body>
</html>
