	$(document).ready(function() {
		// au focus

		$('.field-input').focus(function() {

			$(this).parent().addClass('is-focused has-label');
			
			});

		// a la perte du focus
		$('.field-input').blur(function() {

			$parent = $(this).parent();
			if($(this).val() == ''){
				$parent.removeClass('has-label');
			}
			
			 $parent.removeClass('is-focused')
			});

		// si un champ est rempli on rajoute directement la class has-label
		$('.field-input').each(function(){
			if($(this).val() != '')
			{
				$(this).parent().addClass('has-label');
			}
		});

		$('#regform').submit(function(){
			var pseudo = $('#pseudo').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var repeatpassword = $('#repeatpassword').val();
			var apropos = $('#apropos').val();

			var result = true;

			if(pseudo == ""){
				$('#pseudo').parent().addClass('is-focused error');
				result = false;
			}

			if(email == ""){
				$('#email').parent().addClass('is-focused error');
				result = false;
			}

			if(password == ""){
				$('#password').parent().addClass('is-focused error');
				result = false;
			}

			if(repeatpassword == ""){
				$('#repeatpassword').parent().addClass('is-focused error');
				result = false;
			}

			if(apropos == ""){
				$('#apropos').parent().addClass('is-focused error');
				result = false;
			}

			return result;
		});

		$('#pseudo').keyup(function(){

			if($('#pseudo').val() == ""){
				$('#pseudo').parent().addClass('is-focused error');
			}else{
				$('#pseudo').parent().removeClass('error');
			}
			});

		$('#email').keyup(function(){

			if($('#email').val() == ""){
				$('#email').parent().addClass('is-focused error');
			}else{
				$('#email').parent().removeClass('error');
			}
			});

		$('#password').keyup(function(){

			if($('#password').val() == ""){
				$('#password').parent().addClass('is-focused error');
			}else{
				$('#password').parent().removeClass('error');
			}
			});
		
		$('#repeatpassword').keyup(function(){

			if($('#repeatpassword').val() == ""){
				$('#repeatpassword').parent().addClass('is-focused error');
			}else{
				$('#repeatpassword').parent().removeClass('error');
			}
			});

		$('#apropos').keyup(function(){

			if($('#apropos').val() == ""){
				$('#apropos').parent().addClass('is-focused error');
			}else{
				$('#apropos').parent().removeClass('error');
			}
			});

		});