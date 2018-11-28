<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hiremedb";
$message = "";

try {
	#connecting of PesticideCtrlDB for use
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName",$dbUsername,$dbPassword);
    
    # set the PDO error mode to exception
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	
	#display message for exception caught
    $message = $e->getMessage();
}

?>