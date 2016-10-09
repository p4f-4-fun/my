<?php
	session_start();
	
	if( isset($_POST['lg']) && !empty($_POST['lg']) &&
		isset($_POST['pw']) && !empty($_POST['pw']) && 
		!isset($_GET['a']) ) 
	{
		$lg = $_POST['lg'];
		$pw = $_POST['pw'];
		
		if($lg === "jacek" && $pw === "placek") {
			$_SESSION['nickname'] = $lg;
			$_SESSION['logged'] = 1;
			header("Location: logged.html");
		} else {
			$a = file_get_contents("login.php");
		}
			echo "<span style='color: red;'>Unknown user! Try to sign in again!</span>" . $a;
	}
	else if ( isset($_GET['a']) && $_GET['a'] === "logout" ) {
		unset($_SESSION['nickname']);
		unset($_SESSION['logged']);
		header("Location: index.php");
	}
