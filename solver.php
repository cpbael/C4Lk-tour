<?php
include("board.php");

set_time_limit(0);

/*START OF FILE READING*/
	if (file_exists("upload/" . $_FILES["input"]["name"]))
      {
    	unlink("upload/".$_FILES['input']['name']); //remove the file
      }
    
 	move_uploaded_file($_FILES["input"]["tmp_name"],
  	"upload/" . $_FILES["input"]["name"]); 


  	$fh = fopen('upload/'. $_FILES["input"]["name"],'r') or exit("Unable to open file!");;
  	$cases=(int)fgets($fh);
  	$i=0;
	for ($i=0; $i <$cases ; $i++) { 
		$size=(int)fgets($fh);
		for($j=0;$j<$size;$j++){
			$input[$i][$j]=array_map('intval',explode(" ",fgets($fh)));
		}
	}
	fclose($fh);  
	//echo sizeof($board[0]);
	//var_dump($board); 
/*END OF FILE READING*/

/*GENERATE CHILDREN FOR EACH TILE*/
for($i=0;$i<$cases;$i++){
	$size = sizeof($input[$i]);
	for ($j=1; $j <= $size * $size ; $j++) {

			$row = (int)(($j - 1)/$size);
			$column = (int)(($j - 1)%$size);
			//echo "size={$size}<br/>";
			/*echo "J= {$j} row={$row}";
			echo "column={$column}<br/>";*/

			if( ($row - 2) >= 0 and ($column-1) >= 0){ //upper left
				$children[$i][$j][] =  (($row - 2)*$size) + $column;
			}
			if( ($row + 2) < $size and ($column-1) >= 0){ //lower left
				$children[$i][$j][] =  (($row + 2)*$size) + $column;
			}
			if( ($row - 1) >= 0 and ($column - 2) >= 0){ //middle upper left
				$children[$i][$j][] =  (($row-1)*$size )+ ($column-1);
			}
			if( ($row + 1) < $size and ($column - 2) >= 0){ //middle lower left
				$children[$i][$j][] =  (($row+1)*$size)+ ($column-1);
			}

			//RIGHT

			if( ($row - 2) >= 0 and ($column+1) < $size){ //upper right
				$children[$i][$j][] =  (($row - 2)*$size) + $column +2;
			}
			if( ($row + 2) < $size and ($column+1) < $size){ //lower right
				$children[$i][$j][] =  (($row + 2)*$size) + $column+2;
			}
			if( ($row - 1) >= 0 and ($column + 2) < $size){ //middle upper right
				$children[$i][$j][] =  (($row-1)*$size )+ ($column+3);
			}
			if( ($row + 1) < $size and ($column + 2) < $size){ //middle lower right
				$children[$i][$j][] =  (($row+1)*$size)+ ($column+3);
			}
	}//for
	//var_dump($board);
}

//var_dump($children);



/*OPTIONS AND NOPTS*/
for($case=0; $case<$cases;$case++){
	
	$board = new Board($input[$case],sizeof($input[$case]));
	/*echo "<pre>";
	print_r($board);
	echo "</pre>";
	echo $board->getKnightId();*/
	// echo "KNIGHT:".print_r($board.getKnightById());
	$start=$move=0;

	$nopts[$start]=1;
	//$options[0][0]= findKnightById();
	$options[1][1]= 1;
	$nopts[++$move] = 1;	//kasi isa lang ang starting point

	while($nopts[$start] > 0){

		echo "nopts[{$move}]:{$nopts[$move]}<br/>";
		if($nopts[$move] > 0){	//populate possible moves

			$nopts[++$move]=0;

			if($move > $board->size * $board->size){ //solution found
				echo "<h2>SOLUTION FOUND</h2>";
				for ($i=1; $i < $move ; $i++) { 

					$solution[][$i] = $options[$i][$nopts[$i]];
					echo $options[$i][$nopts[$i]].",";
				}

				
			}else{
				//echo "nopts[{$move}]:{$nopts[$move]}<br/>";
				foreach ($children[$case][$options[$move-1][$nopts[$move-1]]] as $key => $child) {
					if(!$board->getTileById($child)->visited and $board->getTileById($child)->is_empty){
						$board->setVisited($child,true);
						$options[$move][++$nopts[$move]] = $child;
					}
				}
				foreach ($options as $row) {
					foreach ($row as $col) {
						echo $col.",";
					}echo "<br/>";
				}
				echo "<hr/>";

			}//else:solution not found

		}//end if: nopts[move]>0
		else {
			echo "<h3>backtrack</h3>";
			$nopts[--$move]--;
		}

	}//end while
	echo "OPTIONS:<pre>";
	print_r($options);
	echo "</pre>";
}//foreach case
/*OPTIONS AND NOPTS*/
?>