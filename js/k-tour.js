/*	
*/

$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false); 
                } 
            }
        );
        $("#outputLabel").hide();
    }
);
	
var reader = new FileReader();

function readText(that){

	if(that.files && that.files[0]){
		var reader = new FileReader();
		reader.onload = function (e) {  
			var input=e.target.result;
		
			//process text to show only lines with "@":				
			input=input.split("\n");
			var cases=input[0];
			var output="cases:"+cases+"<br/>";
			var last_size=0;
			var initial_config = new Array();
			for(var i=1;i<=cases;i++){
				output = output + "<hr/>i:"+i+"<br/>";
				for(var j=0;j<input[i+last_size];j++){
					output += "j:"+j+":::_index:"+(i+last_size+1+j)+"<br/>";
					initial_config[j]=input[i+last_size+1+j].split(" ");
					output = output+initial_config[j];
					//console.log(initial_config);
					/*for(var k=0;k<input[i+last_size];k++){
						output = output + initial_config[j][k] +"--";
					}*/
					output += "<br/>";
				}
				last_size=last_size+parseInt(input[i+last_size]);
				output += "last size:"+last_size+"<hr/>";
				
				//console.log(initial_config);
			}

			document.getElementById('stage').innerHTML= output;
		};//end onload()
		reader.readAsText(that.files[0]);
	}//end if html5 filelist support
} 


function printSol(solution, dimension){

	
	if(solution.length == 0){
		alert("No Solution Found!");
	}else{
		
		//document.getElementById('printBtn').disabled = true;

		/*var sol = document.getElementById('SolutionList');
		var opt = document.createElement('option');
		for(var i = 0; i < solutionArray.length; i++) {
			var opt = document.createElement('option');
			opt.innerHTML = "Solution" + i;
			opt.data-value = solutionArray[i];
			sol.appendChild(opt);
		}
		console.log(solutionArray[0]);
		var e = document.getElementById("SolutionList");
		var solution = e.options[e.selectedIndex].value;	
		console.log(solution);
    	//var strSel = e.options[e.selectedIndex].value;
    	//alert(strSel);*/
		

		//var solution = sol.options[sol.selectedIndex].value;
		//console.log(solution[0].id);
		//var N=5;
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
				}
			}, 1500);
		};
		print();
	}
		
	
}

