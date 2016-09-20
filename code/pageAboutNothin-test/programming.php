<?php
	session_start();
	if( !isset( $_SESSION['login'] )) {
		session_regenerate_id();
		$_SESSION['login'] = 'Nieznany';
	}
?>
<!doctype html>
<html>
	<head>
		<title>-- Recursive factorial --</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href="http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet" type="text/css" />
	</head>
<body>
	<div id="container">
		<div id="header">
			<form method="post" action="">
				Degree: <input type="text" placeholder="ex. 3" name="input" />
						<input type="submit" value="Send!" id="sbmit" />
			</form>
			<?php require_once 'scr1/fact.php'; ?>
		</div>
		
		<div id="top_menu">
			<a href="index.php">
				<div id="OptionTopMenu-BTN1">
					Home
				</div>
			</a>
			<a href="news.php">
				<div id="OptionTopMenu-BTN2">
					News
				</div>
			</a>
			<a href="programming.php">
				<div id="OptionTopMenu-BTN3">
					TL;DR:PROGRAMMING
				</div>
			</a>
			<a href="contact.php">
				<div id="OptionTopMenu-BTN4">
					Contact
				</div>
			</a>
			<div class="clear_div"></div>
		</div>
		
		<div id="topbar">
			<div id="topbarL">
				<img src="assets/images/penguin.png" />
			</div>
			<div id="topbarR">
				<p>
					Dlaczego Linux?
				</p>
				<p>
					GNU/Linux lub po prostu Linux to alternatywa dla Microsoft Windows®. 
					Linux jest prosty w użyciu i daje o wiele więcej wolności użytkownikowi. 
					Każdy może zainstalować Linuksa – nie jest do tego potrzebna wiedza informatyczna.
				</p>
			</div>
			<div class="clear_div"></div>
		</div>	
		
		<div id="sidebar">
			<a href="index.php">
				<div class="sideoption">
					Home
				</div>
			</a>
			<a href="news.php">
				<div class="sideoption">
					News
				</div>
			</a>
			<a href="programming.php">
				<div class="sideoption">
					TL;DR:PROGRAMMING
				</div>
			</a>
			<a href="contact.php">
				<div class="sideoption">
					Contact
				</div>
			</a>
		</div>
		
		<div id="content">
			<h1>
				What we doing here?
			</h1>
			
			<div class="dottedline"></div>
			
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vestibulum luctus tincidunt. Nulla quis rutrum nunc. Sed sem diam, posuere dictum bibendum quis, 
				pulvinar in sem. Pellentesque ut ultrices nunc, eu lacinia risus. Integer ligula sapien, placerat sit amet vulputate vitae, iaculis et sapien. 
				Suspendisse finibus nunc in mauris fringilla, ac malesuada nibh tincidunt. Ut cursus nisi vel lacus tempor, vitae posuere est consequat. 
				Nullam at dui arcu. Aliquam vitae auctor velit, vel aliquet nulla. Sed dapibus elit non velit porttitor ultricies sed nec lorem. 
				Nam facilisis quam a mattis aliquam. In condimentum, lorem ut fermentum lobortis, massa est ultricies metus, in faucibus tortor sapien at arcu.
			</p>
			
			<p>
				Nullam quis mauris in eros tincidunt interdum. Vestibulum auctor sed metus quis consectetur. Donec vel ex ornare lacus bibendum condimentum. 
				Ut sagittis elit eget lacus pulvinar, vitae gravida nunc tristique. Mauris libero erat, congue nec augue mattis, interdum scelerisque elit. 
				Maecenas a lectus dapibus, pellentesque ante ut, porta ex. In aliquet commodo erat, quis feugiat eros tristique quis. Suspendisse a urna enim.
				Phasellus at nunc non metus vulputate venenatis vel at leo. Suspendisse gravida ante quis turpis pulvinar, non molestie quam fringilla. Ut suscipit ipsum quam, 
				at luctus sem lacinia et. Suspendisse potenti. Mauris venenatis, nulla nec tempor mollis, nunc ante gravida magna, at aliquam odio augue ac ex. 
				Aenean aliquam felis et pulvinar ultrices. Aliquam in semper lacus.
			</p>
			
			<p>
				Aliquam mattis ante eu placerat iaculis. Vestibulum vulputate arcu ut nulla pharetra auctor. Nulla at faucibus turpis. Vivamus vitae eleifend arcu. 
				Mauris accumsan lectus ornare sem viverra egestas. Nullam laoreet a nisl ut suscipit. Donec tempus a risus ut condimentum. Mauris quis mi odio. 
				Ut eget consectetur erat. Donec eu quam gravida, iaculis metus sed, elementum nisi. Cras tempus condimentum arcu, sed tristique lectus sollicitudin consectetur.
			</p>
		</div>
		
		<div class="clear_div"></div>
		
		<div id="footer">
			&copy All rights reserved
		</div>
	</div>
</body>
</html>