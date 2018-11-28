function validateUser(){
    
    alert("test");
    
    var f_name		= document.getElementById('fname');
	var l_name		= document.getElementById('lname');
	var email_add	= document.getElementById('email');
	var pass		= document.getElementById('password');
	var telephone	= document.getElementById('telephone');

	var email_exp = /^(([^<>()\[\]\\.,;:\s@']+(\.[^<>()\[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var pass_exp = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
	var valid = true;	
	
	/*
	The password field must be at least eight characters long, contain at least one uppercase, one lowercase, one number, and one special character.
	*/
		
	if (f_name.value == ''){
		document.getElementById('fname').className = 'invalid';
		valid = false;
	}else{
		document.getElementById('fname').className = 'valid';
	}
	
	if (l_name.value == ''){
		document.getElementById('lname').className = 'invalid';
		valid = false;
	}else{
		document.getElementById('lname').className = 'valid';
	}
	
	if (email_add.value == '' || email_exp.test(email_add.value) == false){
		document.getElementById('email').className = 'invalid';
		valid = false;
	}else{
		document.getElementById('email').className = 'valid';
	}
		
	if (pass.value == '' || pass.length < 8 || pass_exp.test(pass.value) == false){
		document.getElementById('password').className = 'invalid';
		valid = false;
	}else{
		document.getElementById('password').className = 'valid';
	}
	
	if (telephone.value == ''){
		document.getElementById('telephone').className = 'invalid';
		valid = false;
	}else{
		document.getElementById('telephone').className = 'valid';
	}
	
	
	if (valid == false){
	    alert("failed");
		return false;		
	}else{
	    alert("passed");
		return true;
	}
}