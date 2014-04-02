<?php

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
  	$board;
  	$i=0;
	for ($i=0; $i <$cases ; $i++) { 
		$size=(int)fgets($fh);
		for($j=0;$j<$size;$j++){
			$board[$i][$j]=array_map('intval',explode(" ",fgets($fh)));
		}
	}
	fclose($fh);  
	//echo sizeof($board[0]);
	//var_dump($board); 
/*END OF FILE READING*/

/*GENERATE CHILDREN FOR EACH TILE*/
for($i=0;$i<$cases;$i++){
	$size = sizeof($board[$i]);
	for ($j=1; $j <= $size * $size ; $j++) {

			$row = (int)(($j - 1)/$size);
			$column = (int)(($j - 1)%$size);

			if( ($row - 2) >= 0 and ($column-1) >= 0){ //upper left
				$children[$i][$j][] =  (($row - 2)*$size) + $column;
			}
			if( ($row + 2) <= $size and ($column-1) >= 0){ //lower left
				$children[$i][$j][] =  (($row + 2)*$size) + $column;
			}
			if( ($row - 1) >= 0 and ($column - 2) >= 0){ //middle upper left
				$children[$i][$j][] =  (($row-1)*$size )+ ($column-1);
			}
			if( ($row + 1) <= $size and ($column - 2) >= 0){ //middle lower left
				$children[$i][$j][] =  (($row+1)*$size)+ ($column-1);
			}

			//RIGHT

			if( ($row - 2) >= 0 and ($column+1) <= $size){ //upper right
				$children[$i][$j][] =  (($row - 2)*$size) + $column +2;
			}
			if( ($row + 2) <= $size and ($column+1) <= $size){ //lower right
				$children[$i][$j][] =  (($row + 2)*$size) + $column+2;
			}
			if( ($row - 1) >= 0 and ($column + 2) <= $size){ //middle upper right
				$children[$i][$j][] =  (($row-1)*$size )+ ($column+3);
			}
			if( ($row + 1) <= $size and ($column + 2) <= $size){ //middle lower right
				$children[$i][$j][] =  (($row+1)*$size)+ ($column+3);
			}

	//var_dump($board);

/*END OF FILE READING*/



var_dump($children);

/*OPTIONS AND NOPTS*/
for($case=0; $case<$cases;$case++){
	
	$start=$move=0;

	$nopts[$start]=1;
	//$options[0][0]= findKnightById();
	$options[1][1]= 1;
	$nopts[++$move] = 1;	//kasi isa lang ang starting point

	while($nopts[$start] > 0){

		echo "nopts[{$move}]:{$nopts[$move]}<br/>";
		if($nopts[$move] > 0){	//populate possible moves

			$nopts[++$move]=0;

			if($move > sizeof($board[0])){ //solution found
				for ($i=1; $i < $move ; $i++) { 

					$solution[][$i] = $options[$i][$nopts[$i]];
				}
			}else{
				echo "nopts[{$move}]:{$nopts[$move]}<br/>";
				foreach ($children[$case][$options[$move-1][$nopts[$move-1]]] as $key => $child) {
					$options[$move][++$nopts[$move]] = $child;
				}

			}//else:solution not found

		}//end if: nopts[move]>0
		else $nopts[--$move]--;

	}//end while
	echo "OPTIONS:<pre>";
	print_r($options);
	echo "</pre>";
}//foreach case
/*OPTIONS AND NOPTS*/


?>