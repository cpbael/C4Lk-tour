/*	
*/
	
function printNext(solution){
	console.log(solution);
	var N = 5;
	var id=1;
	var buff="<table id='finalTable' border='2'>";
	for(var i=0; i<N;i++){
		buff+="<tr id="+i+">";
		
		for(var j=0;j<N;j++){
			buff+="<td>"+id+"</td>";
			id++;
		}
		buff+="</tr>";
	}
	buff+="</tr></table>";
	
	console.log("heey");

	document.getElementById("board").innerHTML = buff;

}