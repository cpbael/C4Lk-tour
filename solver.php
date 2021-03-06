<?php
require_once("board.php");

	set_time_limit(0);

/*START OF FILE READING*/

	if (file_exists("upload/" . $_FILES["input"]["name"])) {
    	unlink("upload/".$_FILES['input']['name']); //remove the file
    }
    
 	move_uploaded_file($_FILES["input"]["tmp_name"],
  	"upload/" . $_FILES["input"]["name"]); 


  	$fh = fopen('upload/'. $_FILES["input"]["name"],'r') or exit("Unable to open file!");

  	$cases = (int) fgets($fh);
  	
  	for ($i = 0; $i < $cases; $i++) { 
		$size = (int) fgets($fh);
		for ($j = 0; $j < $size; $j++) {
			$input[$i][$j] = array_map('intval', explode(" ",fgets($fh)));
		}
	}

	fclose($fh);  
	//var_dump($input); 
/*END OF FILE READING*/

/*GENERATE CHILDREN FOR EACH TILE*/
for($i = 0; $i < $cases; $i++) {
	$size = sizeof($input[$i]);
	for ($j = 1; $j <= $size*$size; $j++) {

			$row = (int) (($j - 1) / $size);
			$column = (int) (($j - 1) % $size);

			if( ($row - 2) >= 0 and ($column - 1) >= 0){ //upper left
				$children[$i][$j][] =  (($row - 2)*$size) + $column;
			}
			if( ($row + 2) < $size and ($column - 1) >= 0){ //lower left
				$children[$i][$j][] =  (($row + 2)*$size) + $column;
			}
			if( ($row - 1) >= 0 and ($column - 2) >= 0){ //middle upper left
				$children[$i][$j][] =  (($row - 1)*$size )+ ($column - 1);
			}
			if( ($row + 1) < $size and ($column - 2) >= 0){ //middle lower left
				$children[$i][$j][] =  (($row + 1)*$size)+ ($column - 1);
			}

			//RIGHT

			if( ($row - 2) >= 0 and ($column + 1) < $size){ //upper right
				$children[$i][$j][] =  (($row - 2)*$size) + $column + 2;
			}
			if( ($row + 2) < $size and ($column + 1) < $size){ //lower right
				$children[$i][$j][] =  (($row + 2)*$size) + $column + 2;
			}
			if( ($row - 1) >= 0 and ($column + 2) < $size){ //middle upper right
				$children[$i][$j][] =  (($row - 1)*$size )+ ($column + 3);
			}
			if( ($row + 1) < $size and ($column + 2) < $size){ //middle lower right
				$children[$i][$j][] =  (($row+1)*$size)+ ($column + 3);
			}
	}//for
}

/*OPTIONS AND NOPTS*/
for($case = 0; $case < $cases; $case++){
	
	$board = new Board($input[$case], sizeof($input[$case]));

	$start=$move=0;
	$nopts[$start] = 1;
	$options[1][1] = 1;
	$nopts[++$move] = 1;	//kasi isa lang ang starting point

	while($nopts[$start] > 0){

		//echo "<pre>".var_dump($nopts) ."</pre>";
		//echo "<b>MAX:".$board->getMaxMoves()."</b>";
		if($nopts[$move] > 0){	//populate possible moves
			$nopts[++$move]=0;
			//unset($options[$nopts[$move]]);

			if($move > $board->getMaxMoves()){ //solution found
				echo "<h2>SOLUTION FOUND</h2>";
				for ($i = 1; $i < $move ; $i++) { 

					$solution[][$i] = $options[$i][$nopts[$i]];
					echo $options[$i][$nopts[$i]].",";
				}	
			}else{
				echo "gen child of options[".($move-1)."][".$nopts[$move-1]."]:".$options[$move-1][$nopts[$move-1]]."<br/>";

				//echo "nopts[{$move}]:{$nopts[$move]}<br/>";
				$has_children = false;
				$board->setVisited($options[$move-1][$nopts[$move-1]],true);
				foreach ($children[$case][$options[$move-1][$nopts[$move-1]]] as $key => $child) {
					if(!$board->getTileById($child)->visited and $board->getTileById($child)->is_empty){
						$options[$move][++$nopts[$move]] = $child;
						$has_children=true;
					}
				}

				if(!$has_children){
					$board->setVisited($options[$move-1][$nopts[$move-1]],false);
					echo "<h3>no child, backtrack. remove: ".$options[$move-1][$nopts[$move-1]]."</h3>";
					//unset($options[$move-1][$nopts[$move-1]]);
					$nopts[--$move]--;
					/*if($nopts[$move-1]==0){
						$nopts[--$move]--;
					}*/
				}
				
				/*foreach ($options as $l=>$row) {
					echo $l." : ";
					foreach ($row as $col) {
						echo $col.",";
					}
					echo "<br/>";
				}*/
				//var_dump($options);
				echo "<h3>";
				foreach ($options as $l => $row) {
					if($nopts[$l]>0)
						echo $row[$nopts[$l]]. " , ";
				}
				echo "</h3>";
				echo "<hr/>";

			}//else:solution not found

		}//end if: nopts[move]>0
		else {
			echo "<h3> backtrack</h3>";//" remove: {$options[$move][$nopts[$move]]}</h3>";
			$board->setVisited($options[$move][1],false);
			$nopts[--$move]--;
			
		}

	}//end while

}//foreach case
/*OPTIONS AND NOPTS*/

?>