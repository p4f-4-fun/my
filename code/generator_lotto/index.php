<!doctype html>
<html lang="pl">
	<head>
		<title> Gen </title>
		
		<!-- META -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/main.css" />
	</head>
<body>
	<div class="wrap">
	
		<div class="page-dateBox"></div>
			
			<?php
					function judgeFile() {
							$toLoad_ = 'Lotto.php';
							$isGoodEvrything_ = preg_match("/^Lotto.php$/", $toLoad_);
							$judgeArray_ = [$toLoad_, $isGoodEvrything_];
							return $judgeArray_;
					}
					
					if( is_file( judgeFile()[0] ) and judgeFile()[1] != 0 ) 
					{
						require_once( judgeFile()[0] );
						
				?>
		<div class="isUpdateBox">
			
			<script type="text/javascript">
			<!--
			'use strict';
			
				<?php
				
					$l = $gl->checkStatus()[0]; // state of lotto
					$pl = $gl->checkStatus()[1]; // state of plus 
					
					echo "var lottoS = " . ($l == 1 ? "1" : "0") . "; " .
							"var plusS = ". ($pl == 1 ? "1" : "0") . "; ";
					
				?>
			//-->
			</script>
			
		</div>
		
		<h1 class="anchorHelpBox">LOTTO STATYSTYKI</h1>
			
			<div class="anchorHelpBox"> 
				
				<a href="#lotto">
					<span class="anchors">Sekcja > Lotto</span></a>
					
				<a href="#plus">
					<span class="anchors">Sekcja > Lotto Plus</span></a>
					
			</div>
			
			<div class="output-file-box">
							
					<span id="lotto" class="anchorsTitle">
						LOTTO - najnowsze wyniki -> 
						<span style="font-size: 1.2em;">
							<?php echo $gl->latestResults("L"); ?>
						</span>
					</span>
						
					<table>
						<th colspan="50">
							Ilość wypadnięć danej liczby w ciągu
						</th>
							
						<tr class="table-row1">
							<td>-------</td>
				<?php
							for($i = 1; $i <= 49; $i++)
								echo '<td>' . $i . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>6 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("6", $i, "L") . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>13 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("13", $i, "L") . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>100 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("100", $i, "L") . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>200 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("200", $i, "L") . '</td>';
				?>
						</tr>

					</table> 
						
					<div style="height: 40px"></div>
				
					<table>
						<th colspan="50">
							Ile losowań temu padła dana liczba do dnia obecnego: <?php echo date("d.m.Y") ?>
						</th>
							
						<tr class="table-row1">
							<td>-------</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $i . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>LOSOWAŃ</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyDrawsAgo("L", $i) . '</td>';
				?>
						</tr>
					</table> 
						
						<div style="height: 100px"></div>
				
				<!-- ---------------------------------- PLUS ----------------------------------------- -->
					
					<span id="plus" class="anchorsTitle">
						LOTTO PLUS - najnowsze wyniki -> 
						<span style="font-size: 1.2em">
							<?php echo $gl->latestResults("LP"); ?>	
						</span>
					</span>
					
					<table>
						<th colspan="50">
							Ilość wypadnięć danej liczby w ciągu
						</th>
							
						<tr class="table-row1">
							<td>-------</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $i . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>6 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("6", $i, "P") . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>13 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("13", $i, "P") . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>100 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("100", $i, "P") . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>200 losowań</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyTimesNumWasHit("200", $i, "L") . '</td>';
				?>
						</tr>
							
					</table>
						
					<div style="height: 40px"></div>
						
					<table>
						<th colspan="50">
							Ile losowań temu padła dana liczba do dnia obecnego: <?php echo date("d.m.Y") ?>
						</th>
						
						<tr class="table-row1">
							<td>-------</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $i . '</td>';
				?>
						</tr>
							
						<tr class="table-row">
							<td>LOSOWAŃ</td>
				<?php
								for($i = 1; $i <= 49; $i++)
									echo '<td>' . $gl->HowManyDrawsAgo("P", $i) . '</td>';
				?>		
						</tr>
					</table>
						
					<div style="height: 200px"></div>
					
				<?php
					} else {
						echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
						echo '<script src="js/datetime.js" type="text/javascript"></script>';
						
						die("<span class=\"page-fatalLoadFileBox\">Necessary files do not exist. I can't show you anything. Sorry!</span>");
					}
				?>
			</div>

	</div>
	
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/status.js" type="text/javascript"></script>
	<script src="js/datetime.js" type="text/javascript"></script>
</body>
</html>



