	
	//Prepares submission----------------------------------------------------------------------------------------------------------------------------------
	function mySubmitFunction(){
		document.getElementById("botao").disabled = true; 
		document.getElementById("box").style.display = '';
		document.getElementById("box").style.backgroundColor="#D0D0D0";
		document.getElementById("demo").innerHTML = 'Submiting...';		
	}
	
	
	//Handles Team Select Change--------------------------------------------------------------------------------------------------------------------
	 //---------------------------------------------------------------------------------------------------------------------------------------------
	function onchangeTeam() {
		var x=document.getElementById("equipa");
		//document.getElementById("box").style.display = 'none';
		var queryString = encodeURIComponent('Select E Where D =');
		var name = x.value;
	    var query = new google.visualization.Query(
		  'https://docs.google.com/spreadsheets/d/1QqTUnwHrmkHEhQQHUXhO1Rt2J5_8RzF2c2sgXJDsHPg/gviz/tq?gid=1677008220&headers=1&tq=' + queryString + '%27' + name + '%27'); 
		query.send(handleOnchangeTeam);
	}
	
	function handleOnchangeTeam(response) {
	  if (response.isError()) {
			alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
			document.getElementById("e_creditos").innerHTML = 'failed';
			return;
	  }
	  var data = response.getDataTable();
	  var rowInds = data.getSortedRows([{column: 0}]);
	  document.getElementById('e_creditos').innerHTML = data.getValue(0, 0);
	  if(!!document.getElementById('produto').value){
		checkQuantiy();
	  }
	 }
	 
	 //Handles Product Select Change---------------------------------------------------------------------------------------------------------------
	 //---------------------------------------------------------------------------------------------------------------------------------------------
	 function onchangeProduct() {
		var x=document.getElementById("produto");
		document.getElementById("box").style.display = 'none';
		var queryString = encodeURIComponent('Select B, C Where A =');
		var name = x.value;
		name = encodeURIComponent(name);
	    var query = new google.visualization.Query(
		  'https://docs.google.com/spreadsheets/d/1QqTUnwHrmkHEhQQHUXhO1Rt2J5_8RzF2c2sgXJDsHPg/gviz/tq?gid=1677008220&headers=1&tq=' + queryString + '%27' + name + '%27'); 
		query.send(handleOnchangeProduct);
	}
	
	function handleOnchangeProduct(response) {
	  if (response.isError()) {
			alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
			document.getElementById("demo").innerHTML = 'failed';
			return;
	  }
	  var data = response.getDataTable();
	  var rowInds = data.getSortedRows([{column: 0}]);
	  document.getElementById('p_creditos').innerHTML = data.getValue(rowInds[0], 0);
	  document.getElementById('p_aux_creditos').value = data.getValue(rowInds[0], 0);
	  document.getElementById('p_max').innerHTML = data.getValue(rowInds[0], 1);
	  document.getElementById('MaxQ').value = data.getValue(rowInds[0], 1);
	  calculatePrice(document.getElementById("quantidade").value, data.getValue(rowInds[0], 0));
	  if(!!document.getElementById('equipa').value){
		checkQuantiy();
	  }
	 }
	 
	 //Obtains quantity purchaged-------------------------------------------------------------------------------------------------------------------
	 //---------------------------------------------------------------------------------------------------------------------------------------------
	 function checkQuantiy(){
		var queryString = encodeURIComponent('select sum(D) Where B=');
		var name = encodeURIComponent(document.getElementById('equipa').value);
		var produto = encodeURIComponent(document.getElementById('produto').value);
		var aux = encodeURIComponent(' and C=');
	    var query = new google.visualization.Query(
		  'https://docs.google.com/spreadsheets/d/1QqTUnwHrmkHEhQQHUXhO1Rt2J5_8RzF2c2sgXJDsHPg/gviz/tq?gid=0&headers=1&tq=' + queryString + '%27' + name + '%27' + aux + '%27' + produto + '%27'); 
		query.send(handleCheckQuantiy);
	}
	
	function handleCheckQuantiy(response) {
	  if (response.isError()) {
			alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
			document.getElementById("demo").innerHTML = 'failed';
			return;
	  }
	  var data = response.getDataTable();
	  var rowInds = data.getSortedRows([{column: 0}]);
	  //For some bizarre reason I simply cannot find a way to check if the returned structure is empty. This is a workaround that------------------
	  if(data.getNumberOfRows()==0){
		  document.getElementById('CurrentQ').value=0;
		  document.getElementById('Rate').innerHTML = '(' + 0 + '/' + document.getElementById('MaxQ').value + ')'; 
	  }else{
		   document.getElementById('CurrentQ').value=data.getValue(0, 0); 
	       document.getElementById('Rate').innerHTML = '(' + data.getValue(0, 0) + '/' + document.getElementById('MaxQ').value + ')';	  
	  }
	  fireAlarm();
	 }
	 	 
		 
	//Changes total price based on quantity--------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------
	function updatePrice() {
		document.getElementById("box").style.display = 'none';
		if(!!document.getElementById('produto').value){
			calculatePrice(document.getElementById("quantidade").value, document.getElementById("p_aux_creditos").value);
		}
		if((!!document.getElementById('produto').value)&&(!!document.getElementById('produto').value)){
			fireAlarm();
		}
	}
	
	function calculatePrice(x, y){
		var z= x*y;
		document.getElementById('f_price').innerHTML=z;
		document.getElementById('creditos').value=z;
	}
	 
	//Updates flag and changes color on Quantity---------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------
	function fireAlarm(){
		var totalQ = +document.getElementById('CurrentQ').value + +document.getElementById('quantidade').value;
		document.getElementById("alarm").style.textDecoration = "";
		document.getElementById("alarm").style.color = "black";
		if(totalQ>document.getElementById('MaxQ').value){
			document.getElementById("alarm").style.color = "red";
			document.getElementById("alarm").style.textDecoration = "underline";
			document.getElementById("botao").disabled = true; 
		} else{
			document.getElementById("botao").disabled = false; 
		}
	} 
	
	//List management-------------------------------------------------------------------------------------------------------------------------------
	function addtoList(ind){ 
		var list = document.getElementById('List' + ind);
		var team = document.getElementById(ind + 'TeamSelect');
		var opt = document.createElement('option');
		if(team.value==""){ return;}
		opt.value = team.value;
		opt.text = team.value;
		list.add(opt);
		if(list.length==2){
			list.value=team.value;
			list.text=team.value;
		}
		team.value="";
	}
	
	function SetList(ind){ 
		var team = document.getElementById('TeamSelect'+ind);
		var list = document.getElementById('List' + ind);
		var value = list.options[1].value;
		if(list.length>1){
			team.value=value;
			team.text=value;
			if(list.length>2) {
				list.value=list.options[2].value;
				list.text = list.options[2].value;	
			} else{
				list.value='';
			}
			list.remove(1);
		}
	}