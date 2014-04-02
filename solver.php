<?php

<<<<<<< HEAD
=======
set_time_limit(0);

>>>>>>> New index.php; added board class
/*START OF FILE READING*/
	if (file_exists("upload/" . $_FILES["input"]["name"]))
      {
    	unlink("upload/".$_FILES['input']['name']); //remove the file
      }
    
 	move_uploaded_file($_FILES["input"]["tmp_name"],
  	"upload/" . $_FILES["input"]["name"]); 


  	$fh = fopen('upload/'. $_FILES["input"]["name"],'r') or exit("Unable to open file!");;
  	$case=(int)fgets($fh);
  	$board;
  	$i=0;
	for ($i=0; $i <$case ; $i++) { 
		$size=(int)fgets($fh);
		for($j=0;$j<$size;$j++){
			$board[$i][$j]=array_map('intval',explode(" ",fgets($fh)));
		}
	}
	fclose($fh);  
	//echo sizeof($board[0]);
<<<<<<< HEAD
	var_dump($board); 
=======
	//var_dump($board);

>>>>>>> New index.php; added board class
/*END OF FILE READING*/

/*GENERATE CHILDREN FOR EACH TILE*/
for($i=0;$i<$case;$i++){
<<<<<<< HEAD
	for ($j=0; $j < sizeof($board[$i]) ; $j++) { 
		$children[$i][$]
=======
	for ($j=0; $j < sizeof($board[$i]); $j++) { 
		//$children[$i][$j];
>>>>>>> New index.php; added board class
	}
}


/*OPTIONS AND NOPTS*/
	$start=$move=0;

	$nopts[$start]=1;

	while($nopts[$start] > 0){

		if($nopts[$move] > 0){	//populate possible moves
<<<<<<< HEAD
			
=======

>>>>>>> New index.php; added board class
			$nopts[++$move]=0;

			if($move > sizeof($board[0])){ //solution found
				for ($i=1; $i < $move ; $i++) { 
<<<<<<< HEAD
					$solution[][$i] = $options[$i][$nopts[$i]];
				}
			}else{
				for ($candidate=0; $i < ; $i++) { 
					# code...
				}
=======
					//$solution[][$i] = $options[$i][$nopts[$i]];
				}
			}else{
				//for ($candidate=0; $i < ; $i++) { 
					# code...
				//}
>>>>>>> New index.php; added board class
			}

		}

	}


/*OPTIONS AND NOPTS*/


?>