<!doctype html>
<html lang="pl">
<head>
	<title>-- Login --</title>
	<meta charset="utf-8" />
	<meta http-equiv="Cache-control" content="no-cache" />
	<!-- LINKING -->
		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- CSS internal -->
	<style type="text/css">
	<!--
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		html { font-size: 62.5%; }
		body {
			background: #589; 
			font-family: monospace;
			font-size: 2rem;
			color: #EEE;
		}
	-->
	</style>
</head>
<body>
	<div style="min-width: 100vw; min-height: 100vh;">
		<form action="validUser.php" method="post">
			Login: <input type="text" name="lg" /><br />
			Psswd: <input type="password" name="pw" /><br />
			<input type="submit" value="Sign In" />
		</form>
	</div>
</body>
</html>
