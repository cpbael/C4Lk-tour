<?php
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
		public $visited;

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
	$solutions = array(
			array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13),
			array($tile8,$tile5,$tile1,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13),
			array($tile1,$tile8,$tile5,$tile14,$tile25,$tile18,$tile21,$tile12,$tile3,$tile10,$tile19,$tile22,$tile11,$tile2,$tile9,$tile20,$tile23,$tile16,$tile7,$tile4,$tile15,$tile24,$tile17,$tile6,$tile13)
		);
	//$solutions = array();

	global $dimension;
	$dimension = 5;
	$solution = null;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A program that finds all possible paths for a knight to visit all tiles on a board">
    <meta name="author" content="Añonuevo, Bael, Veluz">

    <title>Knight's Tour</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style2.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#">About Knight's Tour</a></li>
          <li><a href="#">Developers</a></li>
        </ul>
        <h3 class="text-muted">Knight's Tour</h3>
      </div>

	 <div class="jumbotron">
        
	      <div class="form-group">

	      	<form name ="chooseSolution" Method ="POST" ACTION = "printOutput.php">
	      	 <?php 
		    	if(count($solutions) > 0){?>
		    	
			  	<?php echo "There were " . count($solutions) . " solutions generated. Enter the solution number that you want to print. </br></br>";
			  		if(isset($_POST['submit'])){
			      		$solnum = $_POST['solutionnumber'];
			      		for($i=0;$i<count($solutions);$i++){
			      			if($i+1 == $solnum){
			      				$solution = $solutions[$i];
			      				break;
			      			}
						}
					}
				}?>
				<?php if(count($solutions)==0){
					echo "There were no solution generated. </br></br>";
				}
		    ?>
	      	<INPUT TYPE = 'Text' NAME = 'solutionnumber'>
		    <INPUT TYPE = "Submit" Name = "submit" VALUE = "Submit"> </br></br>
		    </form>

	         <input type="button" onclick='printSol(<?php echo json_encode($solution) ?>,<?php echo json_encode($dimension) ?>)' value="Print Solution" class="btn btn-primary" id="printbtn"/>
	      	<script type="text/javascript">document.getElementById("printbtn").disabled=false; </script>
	      </div>
         
         <div id="stage">
          <p id="outputLabel"> </p>
        </div>
      </div>

       <div class="footer text-center">
        <p>&copy; Gladdys Añonuevo, Claudine Bael, & Rizianne Veluz 2014</p>
      </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.file-input.js"></script>
    <script src="js/k-tour.js"></script>
    <script>$(document).ready(function(){$('input[type=file]').bootstrapFileInput();});</script>
  </body>
</html>