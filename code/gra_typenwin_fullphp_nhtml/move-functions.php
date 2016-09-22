<?php

class CTypenWin {
	
	function __construct() {
		define("SIGN_U",     "<span style=\"color: #F00\">U</span>"); // user / player
		define("SIGN_Board", "<span style=\"color: #0F0\">#</span>"); // board
		define("SIGN_Feed",  "<span style=\"color: #FF9A00\">$</span>"); // Feed/ meat_to_eat
		define("SIGN_ATE",   "<span style=\"color: #0FF\">A</span>"); // ate feed
		define("SIGN_USED",  "<span style=\"color: #888\">E</span>"); // field without feed/ useless
	}
	
	private function fillBoard($chartSize) {
		for ($fb = 0; $fb < $chartSize; $fb++)
			$_SESSION['array4Game'][$fb] = SIGN_Board;
	}
		
	private function fill4Feed($hmanyFeed) {
		$m = $_SESSION['mutationParam'];
		
		for ($f4d = 1; $f4d <= $hmanyFeed; $f4d++) {
			if ($_SESSION['array4Game'][$f4d * $m] == SIGN_U)
				$_SESSION['array4Game'][$f4d * $m] = SIGN_U;
			else 
				$_SESSION['array4Game'][$f4d * $m] = SIGN_Feed;
		}
	}

	private function check4EOG($chartSize) {
		/*
			brief: check4EOG() RETURN 1 or 0:
			1 mean eog [done!]
			0 mean !eog [still playing!] 

		*/
		for ($c4e = 0; $c4e < $chartSize; $c4e++) {
			if( $_SESSION['array4Game'][$c4e] == SIGN_Feed )
				return false;
		}
		return true;
	}
	
	public function resetGame() {
		unset($_SESSION['array4Game']);
		unset($_SESSION['start']);
		unset($_SESSION['mutationParam']);
		unset($_SESSION['quantity']);
	}
	
	public function fillAll($chartSize, $hmanyFeed) {
		$this::fillBoard($chartSize);
		$this::fill4Feed($hmanyFeed);
	}
	
	/* <==== kopia
	public function renderAll($chartSize) {
		for ($i = 1; $i <= 5; $i++) {
			for ($rb = 0; $rb < $chartSize; $rb++)
				echo (($rb+1) % 25 == 0) ? ($_SESSION['array4Game'][$rb] . $rb  . "<br />") : $_SESSION['array4Game'][$rb];
		}
	}*/
		
	public function renderAll($chartSize) {
		$i = 0;
		
		for ($rb = 0; $rb < $chartSize; $rb++) {
			if ( ($rb+1) % 25 == 0 )
				if ( ++$i % 5 == 0 ) 
					echo $_SESSION['array4Game'][$rb]. '<span style="color: #EEE;">'. $i .'</span><br />';
				else 
					echo $_SESSION['array4Game'][$rb]. $i ."<br />";
			else 
				echo $_SESSION['array4Game'][$rb];
		}
	}
	
	public function validateX($x_user, $sizeA, $chartSize) {
		$x_user = $_POST["facX"];
		
		if ( $x_user > ($chartSize -1) )
			$x_user = $sizeA;
		else if( $x_user < 0 )
			$x_user = 0;
		return $x_user;		
	}
	
	public function validateY($y_user, $sizeA, $chartSize) {
		$y_user = $_POST["facY"];
		
		if ( $y_user > ($chartSize -1) )
			$y_user = $sizeA;
		else if( $y_user < 0 )
			$y_user = 0;
		return $y_user;
	}
	
	public function moveIt($x_user, $y_user, $chartSize) 
	{
		$pat = ($x_user + $y_user) - 1; // -1 , cause we start counting from 0;
				
		for ($chk = 0; $chk < $chartSize; $chk++) 
			if($_SESSION['array4Game'][$chk] == SIGN_U)		
				$_SESSION['array4Game'][$chk] = SIGN_USED;
	
		if ($_SESSION['array4Game'][$pat] == SIGN_Feed ||
		    $_SESSION['array4Game'][$pat] == SIGN_ATE) 
		{
			$_SESSION['array4Game'][$pat] = SIGN_ATE;
			$_SESSION['array4Game'][$pat+1] = SIGN_U;
			
			if( $this::check4EOG($chartSize) ) {
				echo "-------------------------<br />";
				echo "KONIEC GRY! <br />";
				echo "Kliknij przycisk RESET,<br />by grać ponownie!<br /><br />";
				echo '<button type="button" onclick="document.location=\'move.php\';">===> R E S E T <===</button><br /><br />';
				$this::resetGame();
			}
			
			// Render 2 c fx
			@$this::renderAll($chartSize);
		} else {
			$_SESSION['array4Game'][$pat] = SIGN_U;
			
			// Render 2 c fx
			@$this::renderAll($chartSize);
		}
		
	}
	
}

$CTypenWin = new CTypenWin();
