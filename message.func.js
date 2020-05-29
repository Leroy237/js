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


		$('#repform').submit(function(){
		
			var repondre = $('#repondre').val();
			var sujet = $('#sujet').val();
			var result = true;

			if(repondre == ''){
				$('#repondre').parent().addClass('is-focused error');
				result = false;
			}
			if(sujet == ''){
				$('#repondre').parent().addClass('is-focused error');
				result = false;
			}
			
			return result;
		});

		$('#repondre').keyup(function(){
				if($('#repondre').val() ==''){
					$('#repondre').parent().addClass('is-focused error');
				}else{
					$('#repondre').parent().removeClass('error');
				}
		});

		$('#sujet').keyup(function(){
				if($('#sujet').val() ==''){
					$('#sujet').parent().addClass('is-focused error');
				}else{
					$('#sujet').parent().removeClass('error');
				}
		});
		


});		
