<?php
    
    session_start();
    session_regenerate_id();
    
    // Generating value for ModalCookie 
    $i = 0; while (++$i < 17) $value = openssl_random_pseudo_bytes($i, $cstrong);
    $value = bin2hex($value);

?>

<!doctype html>
<html lang="pl" dir="ltr">
<head>
	<title>-- Modal --</title>
    
	<!-- meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    
	<!-- CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    
	<!-- page -->
	<Div class="container"></Div>
    
	<!-- JS -->
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <?php 
        if( !isset( $_COOKIE["ModalCookie"] ) or empty( $_COOKIE["ModalCookie"] ) )  
            echo '<script type="text/javascript" src="js/modal.js"></script>';
    ?>
</body>
</html>

<?php
    // Security before JS Injection
    if( !isset( $_COOKIE["ModalCookie"] ) or empty( $_COOKIE["ModalCookie"] ) ) 
        setcookie("ModalCookie", $value, time() + 24 /*hours*/ * 3600 /* 1h=3600s */);
    else if( $_COOKIE["ModalCookie"] != $value)
        setcookie("ModalCookie", $value, time() + 24 /*hours*/ * 3600 /* 1h=3600s */);
?>


