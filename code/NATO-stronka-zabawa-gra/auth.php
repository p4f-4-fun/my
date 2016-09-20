<?php
	session_start();
	
	if( ( !isset ($_POST['lgin']  ) ) or 
	    ( !isset ($_POST['passwd']) ) 
	  ) 
	{
		header('Location: index.php');
		exit();
	}
	
	require_once 'dbconnect.php';
	$db_connect = @new mysqli($host, $dbusr, $dbpswd, $dbname);	
	
	if ( @$db_connect->connect_errno != 0 ) {
		echo 'ERROR: ' . @$db_connect->connect_errno . '<br />Please contact with administrator in this case!';
	} 
	else {
		require_once '_0x0Crpyt/_X!.php';
		
		$username     = $_POST['lgin'];
		$username 	  = htmlentities($username, ENT_QUOTES, 'UTF-8');
		$username	  = mysqli_real_escape_string( $db_connect, $username );
		
		$pass         = $_POST['passwd'];
		$pass 	      = htmlentities( $pass, ENT_QUOTES, "UTF-8" );
		$pass		  = mysqli_real_escape_string( $db_connect, $pass );
		$pass 	      = _passCrypt( $pass );
		
		if($res = @$db_connect->query(
			sprintf("SELECT sql_no_cache `username` FROM `_sgts` WHERE `username`='%s' AND `password`='%s' LIMIT 1", 
			$username, $pass))) 
		{
			$counter = @$res->num_rows;
			if ($counter > 0) 
			{
				$_SESSION['logged'] = true;
				
				$row = @$res->fetch_assoc();
				$_SESSION['nick'] = $row['username'];
				
				unset( $_SESSION['login_error'] );
				@$res->free_result();
				
				header('Location: sgtpanel.php');
			} else {
				header('Location: index.php');
				$_SESSION['login_error'] = 'Invalid login or password!';
			}
		}	
		$db_connect->close();
	}
?>
