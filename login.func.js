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


		$('#logform').submit(function(){
		
			var pseudo = $('#pseudo').val();
			var password = $('#password').val();
			var result = true;

			if(pseudo == ''){
				$('#pseudo').parent().addClass('is-focused error');
				result = false;
			}
			if(password == ''){
				$('#password').parent().addClass('is-focused error');
				result = false;
			}
			return result;
		});

		$('#pseudo').keyup(function(){
				if($('#pseudo').val() ==''){
					$('#pseudo').parent().addClass('is-focused error');
				}else{
					$('#pseudo').parent().removeClass('error');
				}
		});
		$('#password').keyup(function(){
				if($('#password').val() ==''){
					$('#password').parent().addClass('is-focused error');
				}else{
					$('#password').parent().removeClass('error');
				}
		});


});		
