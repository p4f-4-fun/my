<?php

	error_reporting(0);
	
	$f = "._srv/#.txt";
	
	$dtime = date("h:m:s");
	$dday  = date("d:m:Y");
	
	$ip     = "IP   -> "  . $_SERVER['REMOTE_ADDR'];
	$urlreq = "URl  -> "  . $_SERVER['REQUEST_URI'];
	$date   = "Data -> "  . $dtime . " ::: " . $dday;
	
	$toWrite = $ip . "\n" . $date . "\n" . $urlreq . "\n\n";
	
	if( !file_exists($f) ) {
		exit( header("Location: index.html?ret=DoNotDoItAgainItsAbuseMr" . $_SERVER['REMOTE_ADDR']) );
	} else {
		$fo = fopen($f, "a");
		flock($fo, LOCK_EX);
		fwrite($fo, $toWrite);
		flock($fo, LOCK_UN);
		fclose($fo);
		exit( header("Location: index.html?ret=DoNotDoItAgainItsAbuseMr" . $_SERVER['REMOTE_ADDR']) );
	}
	
?>


