function handle() {
	var error = '';
	var result= '';
	
	var obj_name = document.getElementById('name');
	var name = obj_name.value;
	var obj_address = document.getElementById('address');
	var address = obj_address.value;
	var obj_code = document.getElementById('code');
	var code = obj_code.value;
	var obj_country = document.getElementById('country');
	var country = code.value;
	var obj_male = document.getElementById('male');
	var male = obj_male;
	var obj_female = document.getElementById('female');
	var female = obj_female;
	var obj_red = document.getElementById('check-box-red');
	var red = obj_red.value;
	var obj_green = document.getElementById('check-box-green');
	var green = obj_green.value;
	var obj_blue = document.getElementById('check-box-blue');
	var blue = obj_blue.value;
	var obj_phone = document.getElementById('phone').value;
	var phone = obj_phone.value;
	var obj_email = document.getElementById('email').value;
	var email = obj_email.value;
	var obj_password = document.getElementById('password');
	var password = obj_password.value;
	var obj_verify = document.getElementById('verify-password');
	var verify = obj_verify.value;
	
	if (name == ''){
		error = "name ko đuc để rỗng";
		obj_name.focus();
	}
	
	document.getElementById('result').innerHTML = result;
	document.getElementById('error').innerHTML = error;
	return false;
}