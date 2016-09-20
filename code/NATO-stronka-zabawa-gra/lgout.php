<?php
	session_start();
	
	if (!isset($_SESSION['logged'])) {
		header('Location: index.php');
		exit();
	}
	
	session_regenerate_id(true);
	session_unset();
	header('Location: index.php?logout=1');
?>
