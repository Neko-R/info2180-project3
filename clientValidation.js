function validateUser(){
	// Prevent the default submit action until we pass all validation
	//event.preventDefault();
	
    var f_name		= document.getElementById('fname');
	var l_name		= document.getElementById('lname');
	var email_add	= document.getElementById('email');
	var pass		= document.getElementById('password');
	var telephone	= document.getElementById('telephone');

	var email_exp = /^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var pass_exp = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
	var telephone_exp = /^\d{3}-\d{3}-\d{4}$/;
	var valid = true;	
	
	/*
	The password field must be at least eight characters long, contain at least one uppercase, one lowercase, one number, and one special character.
	*/
		
	if (f_name.value == ''){
		document.getElementById('fname').style.color = "red";
		document.getElementById('fname').style.borderColor = "red";
		valid = false;
	}else{
		document.getElementById('fname').style.color = "green";
		document.getElementById('fname').style.borderColor = "green";
	}
	
	if (l_name.value == ''){
		document.getElementById('lname').style.color = "red";
		document.getElementById('lname').style.borderColor = "red";
		valid = false;
	}else{
		document.getElementById('lname').style.color = "green";
		document.getElementById('lname').style.borderColor = "green";
	}
	
	if (email_add.value == '' || email_exp.test(email_add.value) == false){
		document.getElementById('email').style.color = "red";
		document.getElementById('email').style.borderColor = "red";
		alert("Email does not match correct email format. e.g. mary.jane@example.com");
		valid = false;
	}else{
		document.getElementById('email').style.color = "green";
		document.getElementById('email').style.borderColor = "green";
	}
		
	if (pass.value == '' || pass.length < 8 || pass_exp.test(pass.value) == false){
		document.getElementById('password').style.color = "red";
		document.getElementById('password').style.borderColor = "red";
		alert("Password does not match required criteria. At least eight characters long, contain at least one uppercase, one lowercase, one number, and one special character")
		valid = false;
	}else{
		document.getElementById('password').style.color = "green";
		document.getElementById('password').style.borderColor = "green";
	}
	
	if (telephone.value == '' || telephone_exp.test(telephone.value) == false){
		document.getElementById('telephone').style.color = "red";
		document.getElementById('telephone').style.borderColor = "red";
		alert("Telephone number does not match proper format. e.g. 876-999-8989");
		valid = false;
	}else{
		document.getElementById('telephone').style.color = "green";
		document.getElementById('telephone').style.borderColor = "green";
	}
	
	if (valid == false){
		return false;		
	}else{
		return true;
	}
}