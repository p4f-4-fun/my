<?php
	
Class CLottoStatistics 
{
	var $lotto; 	         // hooker for lotto.txt file
	var $plus;             	 // hooker for plus.txt file
	var $lottodl;          	 // downloaded file lotto
	var $plusdl;           	 // downloaded file plus
	var $errArray;           // Error Array
	var $is_updated;         // bool 1->updated, load from new_file, 0->out-dated load from old_file
	var $parsedLotto;	     // splitted numbers 1num == 1 element of array
	var $parsedPlus;		 // splitted numbers 1num == 1 element of array
	var $readyToSearchLotto; // <-- nomen omen
	var $readyToSearchPlus;  // <-- nomen omen
	
	function __construct() {
		define('LOTTO', 'lotto.txt');
		define('LPLUS', 'plus.txt');
		define('F_DEFAULT', 'default.txt');
		
		$this::updateFiles();
		$this::splitNums();
	}
	
	/**
	
		THAT FUNCTION IS DOWNLOADING NEWEST RESULTS OF LOTTERY
		
		is_updated array has got only 1 function - her function is storing information
		that results are updated.
		
		for LOTTO, PARAM = 0 { 
			is_updated[PARAM] takes only 1 and 0
				1 => updated
				0 => outdated			
		}
		
		for LOTTO PLUS, PARAM = 1 { 
			is_updated[PARAM] takes only 1 and 0
				1 => updated
				0 => outdated			
		}
		
		WHEN THE RESULTS WILL BE OUTDATED, WE WILL LOADING LAST RESULT THAT WE HAVE
		
	**/
	
	private function updateFiles() 
	{	
		if ( $this->lottodl = file_get_contents("http://www.mbnet.com.pl/dl.txt") ) 
		//if ( $this->lottodl = file_get_contents("lotto.txt") ) // na czas ogarnięcia się aktualizacji na mbnetcie
		{
			file_put_contents(LOTTO, $this->lottodl, LOCK_EX); // write new upated;
			
			$this->lotto = $this->lottodl;
			$this->is_updated[0] = 1;
		} 
		else {
			$this->lotto = file_get_contents(LOTTO);
			$this->errArray[0] = 1;
			$this->is_updated[0] = 0;
		}
		
		if ( $this->plusdl = file_get_contents("http://www.mbnet.com.pl/dl_plus.txt") ) 
		//if ( $this->plusdl = file_get_contents("plus.txt") ) // na czas ogarnięcia się aktualizacji na mbnetcie
		{
			file_put_contents(LPLUS, $this->plusdl, LOCK_EX); // write new updated;
			
			$this->plus = $this->plusdl;
			$this->is_updated[1] = 1;
		} 
		else	{
			$this->plus = file_get_contents(LPLUS);
			$this->errArray[1] = 1;
			$this->is_updated[1] = 0;
		}
	}
	
	private function parseToNums($fileIN = F_DEFAULT) 
	{
		$file_ = fopen("$fileIN", "r");
		$fileParsed_ = array();
		$lineCounter_ = 1; // start from 1 like in document and queue lotto events
		
		// LOTTO
		
		while( !feof($file_) ) 
		{
			// Getting 1 line from file
			$line = fgets($file_);
			
			// Parse that line to only numbers not anything else
			if ( $lineCounter_ <= 9 )
				$fileParsed_[$lineCounter_-1] = substr($line, 14);
			
			elseif ( $lineCounter_ <= 99 )
				$fileParsed_[$lineCounter_-1] = substr($line, 15);
			
			elseif ( $lineCounter_ <= 999 )
				$fileParsed_[$lineCounter_-1] = substr($line, 16);
			
			elseif ( $lineCounter_ <= 9999 )
				$fileParsed_[$lineCounter_-1] = substr($line, 17);
			
			else 
				die("I think that something goes wrong! It would never happen!");
			
			$lineCounter_++;
		}
		
		fclose($file_);
		
		return $fileParsed_;
	}
	
	private function initParsed() {
		// LOTTO
		$this->parsedLotto = CLottoStatistics::parseToNums(LOTTO);
		
		//PLUS
		$this->parsedPlus = CLottoStatistics::parseToNums(LPLUS);
	}
	
	private function splitNums() {
		CLottoStatistics::initParsed();
		
		/////////////////////////////////////////// LOTTO //////////////////////////////////////
		$buff = array();
		
		for($i = 0; $i < count($this->parsedLotto); $i++) 
			$buff[$i] = explode(",", $this->parsedLotto[$i]);
						
		$this->readyToSearchLotto = $buff;
		
		/////////////////////////////////////////// PLUS //////////////////////////////////////
		$buff = array();
		
		for($i = 0; $i < count($this->parsedPlus); $i++) 
			$buff[$i] = explode(",", $this->parsedPlus[$i]);
		
		$this->readyToSearchPlus = $buff;
	}
	
	public function HowManyTimesNumWasHit($type = "6", $num = 1, $typeOfDraw = "L") {
		$mainArrLotto = $this->readyToSearchLotto;
		$mainArrPlus = $this->readyToSearchPlus;
		
		$quantityOfLotto = count($mainArrLotto) -1;
		$quantityOfPlus = count($mainArrPlus) -1;
	
		$c = 0; // counter
		
		switch($typeOfDraw) {
			
			// LOTTO
			case "L":
				switch($type) {
					
					case "6":	// -6
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfLotto; $k > $quantityOfLotto-6; $k--)
								if( $mainArrLotto[$k-1][$o] == $num)	
									$c++;
					break;
					
					case "13": // -13
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfLotto; $k > $quantityOfLotto-13; $k--)
								if( $mainArrLotto[$k-1][$o] == $num)	
									$c++;
					break;
					
					case "100": // -100
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfLotto; $k > $quantityOfLotto-100; $k--)
								if( $mainArrLotto[$k-1][$o] == $num)	
									$c++;
					break;
					
					case "200": // -200 [above year]
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfLotto; $k > $quantityOfLotto-200; $k--)
								if( $mainArrLotto[$k-1][$o] == $num)	
									$c++;
					break;
					
					default: $c = 0; // It would never happen, but it's good to have it!
					
				}
			break;
				
				
			// PLUS	
			case "P":
				switch($type) {
					
					case "6": // -6
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfPlus; $k > $quantityOfPlus-6; $k--)
								if( $mainArrPlus[$k-1][$o] == $num)	
									$c++;
					break;
					
					case "13": // -13
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfPlus; $k > $quantityOfPlus-13; $k--)
								if( $mainArrPlus[$k-1][$o] == $num)	
									$c++;
					break;
					
					case "100": // -100
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfPlus; $k > $quantityOfPlus-100; $k--)
								if( $mainArrPlus[$k-1][$o] == $num)	
									$c++;
					break;
					
					case "200": // -200 [above year]
						for ($o = 0; $o < 6; $o++)
							for ($k = $quantityOfPlus; $k > $quantityOfPlus-200; $k--)
								if( $mainArrPlus[$k-1][$o] == $num)	
									$c++;
					break;
					
					default: $c = 0; // It would never happen, but it's good to have it!
				
				}
			break;
			
		}
		
		return $c;
	}
	
	public function HowManyDrawsAgo($typeOfDraw = "L", $num = 1) 
	{
		
		/* HERE WE NEED REVERSE THE ARRAYS OF LOTTO AND PLUS */
		$mainArrLotto = array_reverse( $this->readyToSearchLotto );
		$mainArrPlus = array_reverse( $this->readyToSearchPlus );
		
		$quantityOfLotto = count($mainArrLotto) -1;
		$quantityOfPlus = count($mainArrPlus) -1;
		$minC = array();
		
		switch($typeOfDraw) {
			
			// LOTTO
			case "L": 
				for ($o = 0; $o < 6; $o++) {
						for ($k = $quantityOfLotto; $k > 0; $k--) {
							if( $mainArrLotto[$k][$o] == $num) {
								$minC[$o] = $k;
								continue;
							}
						}
				}
			break;
			
			// PLUS
			case "P":
				for ($o = 0; $o < 6; $o++) {
						for ($k = $quantityOfPlus; $k > 0; $k--) {
							if( $mainArrPlus[$k][$o] == $num) {
								$minC[$o] = $k;
								continue;
							}
						}
				}
			break;
			
		}
		
		return min($minC);
	}

	public function checkStatus() {
		/** 
			$tmpArray = [el1, el2];
				el1 -> LOTTO state; 
				el2 -> PLUS STATE;
		**/
		$tmpArray = [1, 1]; // INIT;
		
		$tmpArray = [ $this->is_updated[0], $this->is_updated[1] ];
		return $tmpArray;
	}
	
	public function latestResults($type = "L")	{
		$ArrLotto = $this->parsedLotto;
		$ArrPlus = $this->parsedPlus;
		
		$quantityOfLotto = count($this->readyToSearchLotto) -2;
		$quantityOfPlus = count($this->readyToSearchPlus) -2;
		
		switch($type) {
			case "L": 
				return $ArrLotto[$quantityOfLotto];
				break;
			case "LP":
				return $ArrPlus[$quantityOfPlus];
				break;
			default:
				echo "Something goes wrong. We havent latest numbers! :P";
		}
		
	}
	
}

$gl = new CLottoStatistics();

?>


