<?php
$message = "";

require_once('connect.php'); #'inclusion' of php file to connect database for use

# email, password, telephone, and name regular expressions for validating
$ereg = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'; #email regex
$pwReg = '/^(?=.*[a-zA-Z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d$@$!%*#?&]{8,}$/'; #password regex
$name = '/^[a-zA-Z\s-]*$/'; #regex pattern to dettermine if alphacharacters and hyphen
$phone = '/^[0-9]{3}[-][0-9]{3}[-][0-9]{4}$/'; //regex for telephones

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, password, telephone, email, date_joined) VALUES (:fname, :lname, :pword, :tphone, :email, :date)");
$stmt->bindParam(':fname', $firstname);
$stmt->bindParam(':lname', $lastname);
$stmt->bindParam(':pword', $password);
$stmt->bindParam(':tphone', $telephone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':date', $date);

$error = "";

// set parameters and execute
$b=true;
if(!empty($_POST["fname"]) && preg_match($name, $_POST["fname"])){ #validate firstname field value
	$firstname = $_POST['fname'];
}else{
    $error = $error . "Invalid Firstname entered - MUST be alphacharacters with space or hyphens and NOT empty.";
	$b = false; 
}

if(!empty($_POST["lname"]) && preg_match($name, $_POST["lname"])){ #validate lastname field value
	$lastname = $_POST['lname'];
}else{
    $error = $error . "\n" . "Invalid lastname entered - MUST be alphacharacters with space or hyphens and NOT empty.";
	$b = false; 
}

if(!empty($_POST["telephone"]) && preg_match($phone, $_POST["telephone"])){ #validate username fieldvalue
	$telephone = $_POST['telephone'];
}else{
    $error = $error . "\n" . "Invalid telephone entered - an example telephone is: 876-123-4567.";
	$b = false; 
}

if(!empty($_POST["email"]) && preg_match($ereg, $_POST["email"])){ #validate email field value
	$email = $_POST['email'];
}else{
    $error = $error . "\n" . "Invalid email entered - an example email is: example@gmail.com.";
	$b = false; 
}

if(preg_match($pwReg, $_POST["password"])){ #validate password
    $password = md5($_POST['password']);
}else{
    $error = $error . "\n" . "Invalid password entered - MUST contain atleast one number, one letter, one capital letter and MUST be atleast 8 characters long and NOT empty.";
	$b = false; 
}

try {
    if($b == true){
    	$date = date("Y-m-d");
        $stmt->execute();
    	echo "New records created successfully";
        header("location: ../parentPage.html");
    }else{
        throw new Exception($error);
    }
} catch(Exception $e) {
    #display message for exception caught
    $message = sprintf('<lable>%s</lable>', $e->getMessage());
    echo $message;
}
