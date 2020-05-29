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


		$('#mesform').submit(function(){
		
			var sujet = $('#sujet').val();
			var message = $('#message').val();
			var result = true;

			if(sujet == ''){
				$('#sujet').parent().addClass('is-focused error');
				result = false;
			}
			if(message == ''){
				$('#message').parent().addClass('is-focused error');
				result = false;
			}
			return result;
		});

		$('#sujet').keyup(function(){
				if($('#sujet').val() ==''){
					$('#sujet').parent().addClass('is-focused error');
				}else{
					$('#sujet').parent().removeClass('error');
				}
		});
		$('#message').keyup(function(){
				if($('#message').val() ==''){
					$('#message').parent().addClass('is-focused error');
				}else{
					$('#message').parent().removeClass('error');
				}
		});


});		
