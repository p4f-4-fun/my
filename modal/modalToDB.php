<?php

	session_start();

	if( isset($_POST['mailModal']) and !empty($_POST['mailModal']) ) 
	{
		require_once("dbconnect.php");
		$connect = new mysqli($h, $u, $p, $db);
		
		if($connect->connect_errno != 0) 
		{
			$_SESSION['DBERR'] = 'SERVER';
			header("Location: index.php");	
			exit();
		} else {
			$what = $_POST['mailModal'];
			$what = htmlentities( $what, ENT_QUOTES, 'UTF-8' );
			$what = mysqli_real_escape_string( $connect, $what );
		
			$q = sprintf("SELECT sql_no_cache `mail` FROM `testtable` WHERE `mail`= '%s' limit 1", $what);
			
			// IF QUERY IS WORKIN' FINE;
			if($res = $connect->query($q)) 
			{	   	
				if($res->num_rows == 1) 
				{
					$_SESSION['uidb'] = 1; // uidb  = USER IN [EXIST] DATABASE
					$res->free_result();
					header("Location: index.php");
					exit();
				} 
				else 
				{ 
					$q = sprintf("INSERT INTO `testtable` VALUES (null, '%s')", $what);
					
					if($connect->query($q))
						$_SESSION['uatdb'] = 1; // uatdb = USER ADDED TO DATABASE
					else
						$_SESSION['DBERR'] = 'QUERY'; /* ERROR IN QUERY */
					
					header("Location: index.php");
					exit();
				}
			}
			$connect->close();
			
			header("Location: index.php?response=DontDoItAgainItsAbuse");
			exit();
		}
	} else {   	
		header("Location: index.php?response=DontDoItAgainItsAbuse");
		exit();
	}
	
?>


