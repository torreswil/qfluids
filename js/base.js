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
/** 
 * Contador de letras y palabras y capturar enter según el tamaño del mismo
 * IvanMel
 * class="count[max]/count[min,max]" counter-target="help-block" counter-type="digits/words"
 */
$(document).ready(function() {     

        var allCounter = $('.counter-join');

    $("[class^='counter[']").each(function() {
        var este = $(this);
        var typeCounter = ($(this).attr('counter-type')=='words') ? 'words' : 'digits';                
        var sizeEnter = ($(this).attr('counter-size-enter') > 0 ) ? parseInt($(this).attr('counter-size-enter')) : 0;        
        var attrClass = $(this).attr('class');
        var counterJoin = ($(this).hasClass('counter-join')) ? true : false;
        var target = $(this).attr('counter-target');
        var minSize = 0;
        var maxSize = 0;        
        
        var countControl = attrClass.substring((attrClass.indexOf('['))+1, attrClass.lastIndexOf(']')).split(',');
		
        if(countControl.length > 1) {
                minSize = countControl[0];
                maxSize = countControl[1];
        } else {
                maxSize = countControl[0];
        }
        
        if(counterJoin) {                
                $('.counter-join').bind('keyup click blur focus change paste', function(e) {                        
                        //Reviso donde está el contador
                        var tmp = este.find('.'+target+':first');
                        if(tmp.length == 0) {
                                tmp = $('.'+target+':first');
                        }
                        var counter = (tmp.length == 0) ? este.next().find('.'+target+':first') : tmp;
                        //Tomo el tamaño digitado
                        var sizeInput = (typeCounter=='digits') ? $.trim($(this).val()).length : $.trim($(this).val()).split(' ').length;
                        
                        if($(this).val() === '') {
                                sizeInput = parseInt(counter.text());
                        } else {
                                actual = $(this).attr('id');
                                totalSizeInput = 0;
                                allCounter.each(function(i){
                                        if($(this).attr('id') != actual) {                                                
                                                tmpTotalSizeInput = (typeCounter=='digits') ? $.trim($(this).val()).length : $.trim($(this).val()).split(' ').length;                                                
                                                if(sizeEnter > 0) {
                                                        tmpTotalEnter = ($(this).val().split("\n").length)-1;
                                                        tmpTotalSizeInput = tmpTotalSizeInput + (sizeEnter*tmpTotalEnter);
                                                }
                                                totalSizeInput = totalSizeInput + tmpTotalSizeInput;
                                        }
                                });                                
                                sizeInput = sizeInput + totalSizeInput;
                        }                                                                       
                        
                        if(sizeEnter > 0) {
                                totalEnter = ($(this).val().split("\n").length)-1;
                                sizeInput = sizeInput + (sizeEnter*totalEnter);                        
                        }                          
                        counter.text(sizeInput);
                        if(sizeInput < minSize || (sizeInput > maxSize && maxSize != 0)) {
                                counter.removeClass('label-warning').addClass('label-important');
                                tmpSubstr = (sizeInput-$(this).val().length) - maxSize;
                                if(tmpSubstr < 0) {
                                        tmpSubstr = tmpSubstr*(-1);
                                }                                
                                $(this).val($(this).val().substr(0, tmpSubstr));
                        } else {
                                counter.removeClass('label-important').addClass('label-warning');
                        }
                });
                
        } else {
                $(this).bind('keyup click blur focus change paste', function(e) {
                        var sizeInput = (typeCounter=='digits') ? $.trim($(this).val()).length : $.trim($(this).val()).split(' ').length;
                        if($(this).val() === '') {
                                sizeInput = 0;
                        }  
                        if(sizeEnter > 0) {
                                totalEnter = ($(this).val().split("\n").length)-1;
                                sizeInput = sizeInput + (sizeEnter*totalEnter);                        
                        }                          
                        var tmp = este.find('.'+target+':first');
                        if(tmp.length == 0) {
                                tmp = este.next('.'+target+':first');
                        }                
                        var counter = (tmp.length == 0) ? este.next().find('.'+target+':first') : tmp;
                        counter.text(sizeInput);
                        if(sizeInput < minSize || (sizeInput > maxSize && maxSize != 0)) {
                                counter.removeClass('label-warning').addClass('label-important');
                                $(this).val($(this).val().substr(0, maxSize));
                        } else {
                                counter.removeClass('label-important').addClass('label-warning');
                        }
                });
        }                       
                    
    });
});
