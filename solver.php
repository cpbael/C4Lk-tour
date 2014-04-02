<?php

	//echo $_FILES['input']['name'];

	function generateSol(){
		if (file_exists("upload/" . $_FILES["input"]["name"]))
	      {
	    	unlink("upload/".$_FILES['input']['name']); //remove the file
	      }
	    
	  move_uploaded_file($_FILES["input"]["tmp_name"],
	  "upload/" . $_FILES["input"]["name"]); 


	  	$fh = fopen('upload/'. $_FILES["input"]["name"],'r') or exit("Unable to open file!");;
	  	$case=(int)fgets($fh);
	  	echo $case;
	  	$board;
	  	$i=0;
		for ($i=0; $i <$case ; $i++) { 
			$size=(int)fgets($fh);
			for($j=0;$j<$size;$j++){
				$board[$i][$j]=array_map('intval',explode(" ",fgets($fh)));
			}
		}
		fclose($fh);  

		var_dump($board); 
	}

?>