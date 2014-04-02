<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script type="text/javascript" src="k-tour.js"></script>

		<link rel="stylesheet" type="text/css" href="style.css"/>
		<title>Knight' Tour	</title>
	</head>
	<body>
		<header id="page_header">
			<div id="top_title"> Knight's Tour</div>
		</header>
		<section id="posts">
			<article>
				
				<?php
					//function printNextSol(){
						class tile{
							public $id;
							public $parent;
							public $x;
							public $y;
							public $is_empty;
							public $visited;

							public function __construct($id, $parent, $x, $y, $is_empty, $visited){
								$this->id = $id;
								$this->parent = $parent;
						    	$this->x = $x;
						    	$this->y = $y;
						    	$this->empty = $is_empty;
						    	$this->visited = $visited;
							}

							public function getId(){
								return $this->id;
							}

							public function getParent(){
								return $this->parent;
							}

							public function getX(){
								return $this->x;
							}

							public function getY(){
								return $this->y;
							}
						}

						class chessBoardTile{
							public $x;
							public $y;
							public $color;
							public $visited = "X";

							public function __construct($x,$y,$color){
								$this->x = $x;
								$this->y = $y;
								$this->color = $color;
							}

							public function getX(){
								return $this->x;
							}

							public function getY(){
								return $this->y;
							}

							public function getColor(){
								return $this->color;
							}

						}

						$tile1 = new tile(1, null, 0, 0, 0, 0);
						$tile2 = new tile(2, 11, 0, 1, 0, 0);
						$tile3 = new tile(3, 12, 0, 2, 0, 0);
						$tile4 = new tile(4, 7, 0, 3, 0, 0);
						$tile5 = new tile(5, 8, 0, 4, 0, 0);
						$tile6 = new tile(6, 17, 1, 0, 0, 0);
						$tile7 = new tile(7, 16, 1, 1, 0, 0);
						$tile8 = new tile(8, 1, 1, 2, 0, 0);
						$tile9 = new tile(9, 2, 1, 3, 0, 0);
						$tile10 = new tile(10, 3, 1, 4, 0, 0);
						$tile11 = new tile(11, 22, 2, 0, 0, 0);
						$tile12 = new tile(12, 21, 2, 1, 0, 0);
						$tile13 = new tile(13, 6, 2, 2, 0, 0);
						$tile14 = new tile(14, 5, 2, 3, 0, 0);
						$tile15 = new tile(15, 4, 2, 4, 0, 0);
						$tile16 = new tile(16, 23, 3, 0, 0, 0);
						$tile17 = new tile(17, 24, 3, 1, 0, 0);
						$tile18 = new tile(18, 25, 3, 2, 0, 0);
						$tile19 = new tile(19, 10, 3, 3, 0, 0);
						$tile20 = new tile(20, 9, 3, 4, 0, 0);
						$tile21 = new tile(21, 18, 4, 0, 0, 0);
						$tile22 = new tile(22, 19, 4, 1, 0, 0);
						$tile23 = new tile(23, 20, 4, 2, 0, 0);
						$tile24 = new tile(24, 15, 4, 3, 0, 0);
						$tile25 = new tile(25, 14, 4, 4, 0, 0);

						//Print initial table
						$solution = array(
								array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13),
								array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13),
								array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13)
							);
						$a = 0;
						/*echo '<form action="printOutput.php" method="POST" enctype="multipart/form-data">';
						echo '<input type="button" onclick="printNext(<?php echo $a;?>)" value="Print Next" />';
						echo '</form>';*/

						$dimension = "5";
						echo "<div id='board'>";
						$i=0;
						echo "<table id='finalTable' border='2'>";

						for($y=$dimension;$y>0;$y--){
							//$buff+="<tr id="+$i+">";
							echo "<tr id=".$i.">";
							for($j=0;$j<$dimension;$j++){
								if(($y+$j)%2==0){
									$chessBoard[$i][$j] = new chessBoardTile($i,$j,"<div class=\"square white\"></div>");
									echo "<td>".$chessBoard[$i][$j]->color."</td>";
								}else{
									$chessBoard[$i][$j] = new chessBoardTile($i,$j,"<div class=\"square black\"></div>");
									echo "<td>".$chessBoard[$i][$j]->color."</td>";
								}
							}
							echo "</tr>";
							$i++;
						}
						
						echo "</tr></table>";
						echo "</div>";

						

						$solution = array(
								array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13),
								array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13),
								array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13)
							);

						$noOfSol = max(array_map('count', $solution));
						// /echo $noOfSol;

						
						//for($g=0;$g<3;$g++){
							for($k=0;$k<$noOfSol;$k++){
								$x = $solution[0][$k]->x;
								$y = $solution[0][$k]->y;
								$chessBoard[$x][$y]->color = "<div class=\"square red\"></div>";
								//echo $chessBoard[$x][$y]->color;

								echo "<div id='board'>";
								$i=0;
								echo "<table id='finalTable' border='2'>";
								for($i=0;$i<5;$i++){
									echo "<tr id=".$i.">";
									for($j=0;$j<5;$j++){
										echo "<td>".$chessBoard[$i][$j]->color."</td>";
									}
									echo "</tr>";
									//$i++;
								}
								echo "</tr></table>";
								echo "</div>";

							}
						//}
				
				?>

		</article>
		</section>
		<footer id="page_footer">Añonuevo, Gladdys M. <br/>Bael, Claudine P. <br/>Veluz, Rizianne C.<br/>CMSC 142 C-4L</footer>
	</body> 
</html>
