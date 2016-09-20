<?php
	function _passCrypt($pass) {
		// use to concating the reversed encrypted password
		$tmp_buf = '';
		// encrypting
		$pass = md5(base64_encode($pass));
		// reversing
		for($i = strlen($pass); $i>0; --$i)
			$tmp_buf .= $pass[$i-1];
		return $tmp_buf;
	}
?>
