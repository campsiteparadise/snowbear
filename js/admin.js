$(document).ready(jsboot);

function jsboot(){
	console.log('Jquery is loaded');
	$("button,.button" ).button();
	$("#tabs" ).tabs();
	
	$('form').on('submit',formValidation);
}

function errorNotice(message,timeout){
	$('.errors,.ui-state-error,.notice,error-highlight').remove();
	html = "<div class='notice info message ui-state-error'>"+message+'</div>';
	$('body').prepend(html);
	
	setTimeout(function() {
		$(".notice").slideUp();
	},timeout);
	
	return true;
}

function formValidation(){
	frm = $(this);
	req = frm.find('.required');
	
	errors = new Array;
	if(req.length>0){
		for(i=0;i<req.length;i++){
			el = $(req[i]);
			if(el.val()==''){
				errors[errors.length] = el.attr('rel')+' is required';
				el.addClass('error-highlight');
			}
		}
	}
	
	if(errors.length>0){
		html = buildList(errors);
		errorNotice(html,3000);
		return false;
	}
	
	return true;
}

function buildList(arr){
	html='';
	for(i=0;i<arr.length;i++){
		html+='<li>'+arr[i]+'</li>';
	}
	
	return '<ul>'+html+'</ul>';
}

