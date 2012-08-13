/* Author: jose.paternina@desarrollo22.com */

$(document).ready(function(){

	$('#login_btn').click(function(){
		window.location = '/main/projects';
	});

	$('#btn_new_project').click(function(e){
		e.preventDefault();
		$('#create_project_overlay').fadeIn('fast');
	});

	$('#create_project_overlay .cancel_overlay').click(function(e){
		e.preventDefault();
		$('#create_project_overlay').hide();
	});

	$('#project_list_tbody tr').click(function(e){
		e.preventDefault();
		window.location = '/main/qfluids';
	});

});

function numbersonly(e, decimal) {

	var key;
	var keychar;

	if(window.event){
	   key = window.event.keyCode;
	}else if(e){
	   key = e.which;
	}else{
	   return true;
	}

	keychar = String.fromCharCode(key);

	if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27)){
	   return true;
	}else if ((("0123456789").indexOf(keychar) > -1)) {
	   return true;
	}else if (decimal && (keychar == ".")) { 
	  return true;
	}else{
	   return false;
	}
}





