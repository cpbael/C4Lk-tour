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

function gen_table(){

	var chessboard = new Array();



  	
	


	var stage= document.getElementById('stage');
	var n= document.getElementsByName('size')[0].value;
	//var mid= Math.round(n/2);
	var buff="<table id='exerTable'>";
	for(var i=1; i<=n;i++){
		buff+="<tr>";
		for(var j=1;j<=n;j++)
			buff+="<td id='exerTable'>"+i+","+j+"</td>";
		buff+="</tr>";
	}
	buff+="</tr></table>";
	stage.innerHTML=(buff);
}

function tile(id,parent,visited)
{
this.id=id;
this.parent=parent;
this.visited=visited;
}

