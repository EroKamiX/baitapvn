// JavaScript Document
$(document).ready(function(){
	$('#form-bt-1').submit(function(event){
		
		event.preventDefault();
		var number1 = $('#number1').val();
		var number2 = $('#number2').val();
		var error = "";
		var result = "";
		//validate
		if(number1 == '' ){
			error = "không được bỏ trống số thứ nhất";
			$('#number1').focus();
		}
		else if (number2 == '' ) {
			error = "không được bỏ trống số thứ hai";
			$('#number2').focus();
		} else {
			number1 = parseInt(number1);
			number2 = parseInt(number2);
			
			var perimeter = (number1+number2)*2;
			var area = number1*number2;
			result = "chu vi = "+ perimeter + 'm';
			result += "Diện tích = " + area + 'm<sup>2</sub>';
		}
			$('.error').remove();
			$('.result').remove();
			
			$('#form-bt-1').append("<h3 class = 'error'>" +error+ "</h3>")
			$('#form-bt-1').append("<h3 class = 'result'>" +result+ "</h3>")
	});
});