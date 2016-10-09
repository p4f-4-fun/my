<?php
	session_start();
	
	if ( !isset( $_SESSION['nickname'] ) || empty( $_SESSION['nickname'] ) )
		$_SESSION['nickname'] = "unknown";
	
	if ( !isset( $_SESSION['logged'] ) || empty( $_SESSION['logged'] ) )
		$_SESSION['logged'] = 0;
?>
<!doctype html>
<html lang="pl">
<head>
	<title>-- B.. --</title>
	<meta charset="utf-8" />
	<meta http-equiv="Cache-control" content="No-Cache" />
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
			background: #626262; 
			font-family: monospace;
			font-size: 2rem;
			color: #EEE;
		}
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			display: block;
		}
		li {
			display: block;
		}
		li a {
			text-decoration: none;
			display: block;
			width: 10rem;
			text-align: center;
			padding: 2rem;
			color: #EEE;
		}
		li a:hover,
		li a:focus {
			background-color: #999;
			color: #FFF;
		}
		div.lightbox_login_frame_board {
			background-color: rgba(0, 0, 0, .3);
			min-height: 100%;
			min-width: 100%;
			position: fixed;
			display: none;
			left: 0;
			top: 0;
		}
		div.position_iframe {
			-webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, .6);
			-moz-box-shadow: 0px 2px 10px rgba(0, 0, 0, .6);
			box-shadow: 0px 2px 10px rgba(0, 0, 0, .6);
			border-radius: 3rem;
			margin: 0 auto;
			margin-top: 5%;
			height: 30vh;
			width: 30vw;
		}
		div.position_iframe iframe {
			border: 0;
			outline: 0;
			width: inherit;
			height: inherit;
			border-radius: 3rem;
		}
	-->
	</style>
	<!-- /CSS internal -->
	<!-- ############# -->
	<!-- ############# -->
	<!-- JS internal -->
	<script type="text/javascript">
	<!--
		'use strict';

		$(function() {
			$("div.btn-login li.lgin a").on("click", function(e) {
				e.preventDefault();
				$("div.lightbox_login_frame_board").fadeIn(500);
				
			});
			
			$(document).on("keydown dblclick", function(e) {
				if( $("div.lightbox_login_frame_board").css("display") === "block" )
					if( e.which === 27 || e.type === "dblclick")
						$("div.lightbox_login_frame_board").fadeOut(500);
						location.reload();
			});
			
		});
	//-->
	</script>
	<!-- /JS internal -->
</head>
<body>
	<div style="width: 100rem; margin: 0 auto;">
		<div class="btn-login">
			<ul>
				<?php
					if ( $_SESSION['logged'] === 0 || (isset($_GET['a']) && $_GET['a'] === "logout") ) {
						echo "
							<li class=\"lgin\">
								<a href=\"login.php\">Sign In</a>
							</li>";
					} else if ( $_SESSION['logged'] === 1 ){
						echo "
							<li>
								<a href=\"validUser.php?a=logout\">Log out</a>
							</li>";
					}
				?>
			</ul>
		</div>
		<div>
			<span class="color: orange; font-size: 2rem; margin-top: 1rem; letter-spacing: 2px;">
				<?php echo "Użytkonik: ";
					  echo ($_SESSION['nickname'] === "unknown") ? "unknown <-- zaloguj się!" : $_SESSION['nickname']; 
				?>
			</span>
		</div>
		<div class="lightbox_login_frame_board">
			<div class="login_board_frame">
				<span style="text-align: center; 
							display: block; 
							width: 100%; 
							font-size: 2rem; 
							color: #666;
							margin-top: 10%;">
					Press ESC or double click on black background to turn off this screen
				</span>
				<div class="position_iframe">
					<iframe id="login_frame" src="login.php">
						<!-- IFRAME NOT SUPPORTED -->
							<h5>We're really sorry! 
								We cannot show you signing in system, 
								because your browser does not support &lt;IFRAME&gt; tag!
							</h5>
						<!-- /IFRAME NOT SUPPORTED -->
					</iframe>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
