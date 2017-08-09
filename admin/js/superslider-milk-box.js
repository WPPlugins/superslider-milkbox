<script language="javascript" type="text/javascript">
	
	function addmilk() {
		//var form = 'document.showshortcode';
		var milk_code = '[milkbox ';

		var f = document.getElementById('milkopacity'); 
		if (f.value != "") {
			milk_code = milk_code+'opacity="'+f.value+'" ';
			}
		var f = document.getElementById('milktop'); 
		if (f.value != "") {
			milk_code = milk_code+'top="'+f.value+'" ';
			}
		var f = document.getElementById('milkheight'); 
		if (f.value != "") {
			milk_code = milk_code+'height="'+f.value+'" ';
			}
		var f = document.getElementById('milkwidth'); 
		if (f.value != "") {
			milk_code = milk_code+'width="'+f.value+'" ';
			}
		var f = document.getElementById('milkduration'); 
		if (f.value != "") {
			milk_code = milk_code+'duration="'+f.value+'" ';
			}
		var f = document.getElementById('milkplay'); 
		if (f.value != "") {
			milk_code = milk_code+'play="'+f.value+'" ';
			}
		var f = document.getElementById('milkdelay'); 
		if (f.value != "") {
			milk_code = milk_code+'delay="'+f.value+'" ';
			}
		var f = document.getElementById('borderwidth'); 
		if (f.value != "") {
			milk_code = milk_code+'borderwidth="'+f.value+'" ';
			}
		var f = document.getElementById('bordercolor'); 
		if (f.value != "") {
			milk_code = milk_code+'bordercolor="'+f.value+'" ';
			}
		var f = document.getElementById('canvaspad'); 
		if (f.value != "") {
			milk_code = milk_code+'canvaspad="'+f.value+'" ';
			}
	/*	var f = document.getElementById('milktitle'); 
		if (f.value != "") {
			milk_code = milk_code+'title="'+f.value+'" ';
			}*/
		var f = document.getElementById('transition'); 
		if (f.value != "") {
			trans_code = 'transition="'+f.value+':';
			}
		var f = document.getElementById('transition_out'); 
		if (f.value != "") {
		    trans_code = trans_code+f.value+'" ';  
			milk_code = milk_code+trans_code;
			}
				
				milk_code = milk_code+']';
				var destination1 = document.getElementById('content');
				
				if (destination1) {
					destination1.SelStart = 0;
					destination1.value += milk_code;
					}
				
				/*var destination2 = content_ifr.tinymce;
				var destination2 = window.frames[0].document.getelementbyid('tinymce')
				if (destination2) {
					destination2.value += milk_code;
					 alert(document.frames("content_ifr").document.getelementbyid('tinymce').value);
					}*/
			
}

</script>