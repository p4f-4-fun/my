<?php
	function fact($s) {
		if($s == 0) return 1;
		return $s * fact($s - 1);
	}
		
	if( isset($_POST['input']) ) {
		if($_POST['input'] > 100) {
			echo 'Really big value! I don\'t feel like doing to count this ;)';
		} else {
			echo 'Factorial of ' . $_POST['input'] . ' = ' . fact( $_POST['input']);
		}
	}
?>