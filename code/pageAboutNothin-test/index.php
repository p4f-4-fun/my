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
				<span style="font-weight: bold;">Czym jest Linux?</span>
			</p>
			<p>
				Kiedy słyszysz słowo Linux, pewnie myślisz o brodatych programistach wypisujący niezrozumiały kod na czarnym ekranie. 
				Dobra wiadomość! Wiele się zmieniło.
				<p>
					<span style="font-weight: bold;">Rzut oka</span>
				</p>
				Linux to system operacyjny, czyli rozbudowany program zarządzający komputerem. 
				Jest nieco podobny do Microsoft Windows®, ale całkowicie darmowy. 
				Właściwa nazwa to GNU/Linux, jednak forma “Linux” jest używana częściej.
				Linux nie jest produktem jednej firmy, ale wspólnym dziełem wielu firm i grup ludzi. 
				W zasadzie system GNU/Linux jest bazowym komponentem, z którego powstaje wiele produktów. 
				Nazywa się je dystrybucjami.
				Dystrybucje mają duży wpływ na wygląd i użytkowanie Linuksa. Zależnie od docelowych zastosowań, 
				możemy wybierać je w zakresie od pełnowartościowych, wielkich i kompletnych systemów do wersji lekkich i okrojonych, 
				doskonale nadających się na starsze komputery, czy mieszczących się na przenośnym dysku typu Flash (pendrive).
			</p>
		</div>
		
		<div class="clear_div"></div>
		
		<div id="footer">
			&copy All rights reserved
		</div>
	</div>
</body>
</html>