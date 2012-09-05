/* Author: jose.paternina@desarrollo22.com */
window.moveTo(0,0);
window.resizeTo(screen.width,screen.height);

$(document).ready(function(){

	$('#login_btn').click(function(){
		window.location = '/main/projects/';
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
		var id = $(this).attr('id');
		id = id.split('project_');
		id = id[1];
		window.location = '/main/qfluids/'+id;
	});


	$('#btn_cp_next').click(function(e){
		e.preventDefault();
		var eqyt = 0;
		$('#create_project .required').each(function(){
			if($(this).val() == ''){
				eqyt = eqyt + 1;
			}
		});

		if(eqyt > 0){
			alert('All fields are required.\nPlease verify and try again.');
		}else{
			var data = $('#create_project').serialize();
			$.post('/main/projects',data,function(r){
				if(parseInt(r)){
					window.location = '/main/qfluids/'+r;
				}else{
					alert('There was an error in the saving routine.\nPlease inform the development team for further support.');
				}
			},'json');
		}
	});


	if($('#upload_activation_file').length > 0){
		new AjaxUpload('upload_activation_file', {
			// Location of the server-side upload script
			// NOTE: You are not allowed to upload files to another domain
			action: '/rest/upload_activation_file',
			// File upload name
			name: 'userfile',
			// Submit file after selection
			autoSubmit: true,
			// The type of data that you're expecting back from the server.
			// HTML (text) and XML are detected automatically.
			// Useful when you are using JSON data as a response, set to "json" in that case.
			// Also set server response type to text/html, otherwise it will not work in IE6
			responseType: 'json',
			// Fired after the file is selected
			// Useful when autoSubmit is disabled
			// You can return false to cancel upload
			// @param file basename of uploaded file
			// @param extension of that file
			onChange: function(file, extension){
				if(extension !== 'qfl'){
					alert('The file is invalid. Please provide a valid activation file.');
					return false;
				}
			},
			// Fired before the file is uploaded
			// You can return false to cancel upload
			// @param file basename of uploaded file
			// @param extension of that file
			onSubmit: function(file, extension) {},
			// Fired when file upload is completed
			// WARNING! DO NOT USE "FALSE" STRING AS A RESPONSE!
			// @param file basename of uploaded file
			// @param response server response
			onComplete: function(file, response) {
				log(response);
				if(response.message == 'already_used'){
					alert('This activation file is already in use.\nPlease ask an administrator for a new one.');
				}else if(response.message == 'sucess'){
					$('#key_td a').remove();
					$('#key_td').prepend('Key sucessfully imported.');
					$('#key_td input').val(response.transactional_id);
				}
			}
		});
	}

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





