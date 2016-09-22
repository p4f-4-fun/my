<?php
	session_start();
	
	//unset($_SESSION['array4Game']);
	//unset($_SESSION['start']);
	
	
	// SETTING UP SESSION MAIN VALUES;
	if ( !isset( $_SESSION['array4Game'] ) || empty( $_SESSION['array4Game'] ) )
		$_SESSION['array4Game'] = array();
	
	if ( !isset( $_SESSION['start'] ) || empty( $_SESSION['start'] ) )
		$_SESSION['start'] = 0;
	
	if ( !isset( $_SESSION['quantity'] ) || empty( $_SESSION['quantity'] ) )
		$_SESSION['quantity'] = rand(3, 15);
	
	if ( !isset( $_SESSION['mutationParam'] ) || empty( $_SESSION['mutationParam'] ) )
		$_SESSION['mutationParam'] = rand(9, 35);
	
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Comaptible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<title>Type n win - wipe da wall!</title>
	<style>
		* { margin: 0; padding: 0; }
		span { margin: 0; padding: 0; }
		html { font-size: 62.5%; }
		body { 
			background-color: #090909; 
			color: #0F0; 
			font-size: 1.8rem; 
			font-family: 'Open Sans', sans-serif;
		}
		.gameboard {
			display: flex;
			display: -webkit-flex;
			justify-content: center;
			margin-top: 50px;
			width: 100%;
			letter-spacing: 1.0rem;
			text-shadow: 0px 0px 12px #000;
		}
		input, button {
			background-color: #323232;
			font-weight: bold;
			padding: 10px;
			border: 2px solid #525252;
			color: #FFF;
			outline: 0;
		}
		input:focus, button:focus,
		input:hover, button:hover {
			background-color: #212121;
			cursor: pointer;
		}
	</style>
</head>
<body>
<div class="gameboard">
<pre>

<h3 style="letter-spacing: 0.5rem;">
Welcome to the Type'n'Win!<br />
Type X and Y to win -> wipe the wall<br />
The wall width=25, height = width :)<br />
Hav' Fun!<br />
</h3>

<?php
	
	for ($j = 1; $j <= 5; $j++)
		for ($i = 1; $i <= 5; $i++)
			echo $i == 5 ? '<span style="color: #EEE";>' . $i . '</span>' : $i;
		echo "<br />";
	
	require_once("move-functions.php");
	
	$size_A = 25;
	$sizeOfarray = pow($size_A, 2);
	$quantityOfFeed = $_SESSION['quantity'];
	
	if ($_SESSION['start'] == 0) {
		$CTypenWin->fillAll($sizeOfarray, $quantityOfFeed);
		
		// This render will be started just 1 time, on the first game start
		$CTypenWin->renderAll($sizeOfarray);
		$_SESSION['start'] = 1;
	}
	
	if ( isset($_POST["facX"]) &&  isset($_POST["facY"]) &&
	    !empty($_POST["facX"]) && !empty($_POST["facY"]) ) 
	{
		$CTypenWin->moveIt(
			$CTypenWin->validateX($_POST["facX"], $size_A, $sizeOfarray), 
			$CTypenWin->validateY($_POST["facX"], $size_A, $sizeOfarray), 
			$sizeOfarray
		);
	}
?>

<h3 style="letter-spacing: 0.2rem;">
The all you have to do, to win this game is...<br />
Just add X + Y to EAT FEED [dolars "$" are feed]<br />
When the all dolars will be eaten, you will win this war!<br />
Please don't do stupid things, this is beta version of game<br />
Be understanding for me!.
</h3>

</pre>

<form action="" method="post">
	<input type="text" name="facX" placeholder="Factor X..." required />
	<input type="text" name="facY" placeholder="Factor Y..." required />
	<input type="submit" value="Move!" /><br /> <br /> 
	<button type="button" onclick="document.location='move.php?a=r';">
		===&gt; R E S E T &lt;===
	</button> 
	
	<?php
		if ( isset($_GET["a"]) && !empty($_GET["a"]) ) {
			if ( $_GET["a"] == "r" ) {
				$CTypenWin->resetGame();
				unset($_GET['a']);
				header("Location: move.php");
			}	
		}
	
		echo "<br /><br />";
		echo "<span style=\"color: #F00\">U</span> <- Player<br />";      // user / player
		echo "<span style=\"color: #0F0\">#</span> <- Chart<br />";       // board
		echo "<span style=\"color: #FF9A00\">$</span> <- Feed<br />";     // Feed/ meat_to_eat
		echo "<span style=\"color: #0FF\">A</span> <- Eaten<br />";     // eaten feed
		echo "<span style=\"color: #888\">E</span> <- Empty field<br />"; // field without feed/ useless
		
		if ( isset($_POST["facX"]) &&  isset($_POST["facY"]) &&
			!empty($_POST["facX"]) && !empty($_POST["facY"]) ) 
		{
			echo "<br /><hr /><br />";
			echo date("H:i:s"). "<br />";
			echo "---------<br />";
			echo "X ->> " . $CTypenWin->validateX($_POST["facX"], $size_A, $sizeOfarray) . "<br />";
			echo "Y ->> " . $CTypenWin->validateY($_POST["facY"], $size_A, $sizeOfarray) . "<br />";
			
		}
	?>
	
</form>

</div>
</body>
</html>
<?php // echo nl2br(var_dump($_SESSION['array4Game'])); ?>
