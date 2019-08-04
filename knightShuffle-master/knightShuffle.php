<html lang="pt-BR" dir="ltr">
	<head>	
		<title>Knight Shuffle by gerabelo</title>
		<script src="js\functions.js" type="text/javascript"></script>
		<meta charset="utf-8">
		<meta name="author" content="Geraldo Rabelo">
		<meta name="description" content="String Shuffle based on Chess's Knight movements">
		<meta name="description" content="shuffle,knight,chess,string">
		<link rel="stylesheet" href="css\styles.css">
	</head>
	<body>

<?php

	function notacaoAlgebrica($x,$y) {
		$r = "";
		switch($x) {
			case 0:
				$r = $r."A";
				break;
			case 1:
				$r = $r."B";
				break;
			case 2:
				$r = $r."C";
				break;
			case 3:
				$r = $r."D";
				break;
			case 4:
				$r = $r."E";
				break;
			case 5:
				$r = $r."F";
				break;
			case 6:
				$r = $r."G";
				break;
			case 7:
				$r = $r."H";
				break;
		}
		$r = $r.(8-$y);
		return $r;
	}

	function randonChar() {
		/*
		$r = rand(0,32);
		switch($r) {
			case 0:
				$c = chr(107);
				break;
			case 1:
				$c = chr(119);
				break;
			case 2:
				$c = chr(121);
				break;
			case 3:
				$c = chr(120);
				break;
			case 4:
				$c = chr(97);
				break;
			default:
				$c = chr(32);
		}
		*/
		$c = chr(rand(65,90));
		return $c;
	}

	if (isset($_GET["word"])) {
		$word = strtoupper(utf8_decode($_GET["word"]));
		$word = str_replace(' ','',$word);

		$posicaoInicial = rand(0,3);
		$gabarito = "";

		switch($posicaoInicial) {
			case 0:
				$posicao = array(1,7); //1,7 posicao inicial cavalo branco da raínha
				$historico = array(17);
				$resultado = array(array('x' => 1, 'y' => 7));
				$gabarito = $gabarito.notacaoAlgebrica(1,7);
				break;
			case 1:
				$posicao = array(6,7); //6,7 posicao inicial cavalo branco do rei
				$historico = array(67);
				$resultado = array(array('x' => 6, 'y' => 7));
				$gabarito = $gabarito.notacaoAlgebrica(6,7);
				break;
			case 2:
				$posicao = array(1,0); //6,7 posicao inicial cavalo negro da raínha
				$historico = array(10);
				$resultado = array(array('x' => 1, 'y' => 0));
				$gabarito = $gabarito.notacaoAlgebrica(1,0);
				break;
			case 3:
				$posicao = array(6,0); //6,7 posicao inicial cavalo negro do rei
				$historico = array(60);
				$resultado = array(array('x' => 6, 'y' => 0));
				$gabarito = $gabarito.notacaoAlgebrica(6,0);
				break;
		}

		
		//$maiorX = 0;
		//$maiorY = 0;
		$menorX = 0;
		$menorY = 0;

		$x_novo = 0;
		$y_novo = 0;

		$i = 1;
		//echo $word[0]." (0,0) <br>";
		while ($i < strlen($word)) {
			$m = rand(0,7);

			$x_corrente = $posicao[0];
			$y_corrente = $posicao[1];

			switch ($m) {
				case 0:
					$x_novo = $x_corrente-1;
					$y_novo = $y_corrente-2;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo;

					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 1:
					$x_novo = $x_corrente+1;
					$y_novo = $y_corrente-2;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo;

					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

 					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 2:
					$x_novo = $x_corrente-2;
					$y_novo = $y_corrente-1;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo;

					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 3:
					$x_novo = $x_corrente-2;
					$y_novo = $y_corrente+1;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo;
					
					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 4:
					$x_novo = $x_corrente-1;
					$y_novo = $y_corrente+2;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo;
					
					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 5:
					$x_novo = $x_corrente+1;
					$y_novo = $y_corrente+2;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo; 

					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 6:
					$x_novo = $x_corrente+2;
					$y_novo = $y_corrente-1;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo; 
					
					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
				case 7:
					$x_novo = $x_corrente+2;
					$y_novo = $y_corrente+1;

					if (in_array($x_novo.$y_novo,$historico) || $x_novo > 7 || $y_novo > 7 || $x_novo < 0 || $y_novo < 0) { break; }
					else { array_push($historico,$x_novo.$y_novo); }

					array_push($resultado,array('x' => $x_novo, 'y' => $y_novo));

					$posicao[0] = $x_novo;
					$posicao[1] = $y_novo; 
					
					$gabarito = $gabarito.notacaoAlgebrica($x_novo,$y_novo);

					//if ($x_novo > $maiorX) { $maiorX = $x_novo; }
					//if ($y_novo > $maiorY) { $maiorY = $y_novo; }
					if ($x_novo < $menorX) { $menorX = $x_novo; }
					if ($y_novo < $menorY) { $menorY = $y_novo; }

					//echo $word[$i]." (".$x_novo.",".$y_novo.") <br>";
					$i++;
					break;
			}

		}

		$espacoY = 8;//$espacoY = $maiorY+abs($menorY)+1;
		//$espacoX = 8;//$espacoX = $maiorX+abs($menorX)+1;
		$y = 0;
		echo "<font size=\"30\" face=\"'Lucida Console', Monaco, monospace\" >";
		echo "<table border=0>";
			while ($espacoY > 0) {
				echo "<tr>";
				$espacoX = 8;//$espacoX = $maiorX+abs($menorX)+1;
				$x = 0;
				while ($espacoX > 0) {
/*			
					if ($x % 2 == 0) {
						if ($y % 2 == 0) {
							echo "<td width=\"50px\" height=\"50px\" bgcolor=\"\">";	
						}
						else  {
							//echo "<td width=\"50px\" height=\"50px\" bgcolor=\"#DDD\">";
							echo "<td width=\"50px\" height=\"50px\" bgcolor=\"\">";
						}
					} else {
						if ($y % 2 == 0) {
							//echo "<td width=\"50px\" height=\"50px\" bgcolor=\"#DDD\">";
							echo "<td width=\"50px\" height=\"50px\" bgcolor=\"\">";
						}
						else  {
							echo "<td width=\"50px\" height=\"50px\" bgcolor=\"\">";
						}
					}
*/

					echo "<td width=\"50px\" height=\"50px\"><font color=\"black\">";

						$lx = $menorX+$x;
						$ly = $menorY+$y;

						$randChar = true;

						foreach ($resultado as $coordenadas) {
							if ($coordenadas['x'] == $lx && $coordenadas['y'] == $ly) {
								echo "<b>".utf8_encode($word[array_search($coordenadas,$resultado)])."</b>";								
								$randChar = false;
							}
						}

						if ($randChar && isset($_GET["full"])) {
							echo "<b>".randonChar()."</b>";
						}
					echo "</font></td>";
					$espacoX -= 1;
					$x++;
				}
				echo "</tr>";
				$espacoY -= 1;
				$y++;
			}
		echo "</table></font>";
		echo "<div class=\"solution\"><input type=\"text\" name=\"solution\" id=\"solution\" onkeyup=\"solutionChecker('$gabarito')\" onclick=\"solutionChecker('$gabarito')\" onchange=\"solutionChecker('$gabarito')\"></div>";
	}
	else echo "<h3>/knightShuffle.php?word=the black sheep&full=true</h3>";
?>
	</body>
</html>
