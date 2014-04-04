function printSol(solution, dimension){
	if(solution == null){
		alert("Invalid Input!");
	}else{
		var id=1;
		var buff="<table id='board' border='2'>";
		var i=0;
		for(var y=dimension; y>0;y--){
			buff+="<tr id="+i+">";
			
			for(var j=0;j<dimension;j++){
				if((y+j)%2==0){
					buff+="<td style='background-color:white;'></td>";
					id++;
				}else{
					buff+="<td style='background-color:black;'></td>";
					id++;
				}
			}
			i++;
			buff+="</tr>";
		}
		buff+="</tr></table>";
		stage.innerHTML=(buff);

		document.getElementById('board').style.width = '400px';
		document.getElementById('board').style.height = '400px';
		document.getElementById('board').style.tableLayout="fixed";
		solArrayLength = solution.length;

		/*var img = document.createElement('img');
    	img.src = "knight.jpg";
    	img.style.width = '50px';
    	img.style.height = '50px';
    	*/
		var k=0;
		function print() {
		setTimeout(function() {
				var id = solution[k].id;
				var row = parseInt((id-1)/dimension);
				var Row = document.getElementById(row);	

				var Cells = Row.getElementsByTagName("td");
				var column = (parseInt(id-1)%dimension);
				//Cells[column].style.overflow = 'auto';
				Cells[column].style.backgroundColor = "Red";
				//Cells[column].appendChild(img)
				k++; 
				if (k < solArrayLength){
					print();
				}else{alert('Printing Finished! :)');}
			}, 1500);
		};
		print();
	}
	
}

