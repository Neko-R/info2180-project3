<?php
$message = "";
$error = "";
$b = true;

require_once('connect.php'); #'inclusion' of php file to connect database for use

// prepare and bind
$stmt = $conn->prepare("INSERT INTO jobs (job_title, job_description, category, company_name, company_location, date_posted) VALUES (:jobTitle, :jobDes, :category, :companyN, :companyL, :date)");

function trim_value(&$value){
    $value = trim($value);    // this removes whitespace and related characters from the beginning and end of the string
}

array_filter($_POST, 'trim_value');    // the data in $_POST is trimmed

$jobTitle = filter_input(INPUT_POST, 'jobtitle',  FILTER_SANITIZE_STRING);
if($jobTitle == null){
    $error = $error . "Job Title field cannot be empty.";
	$b = false; 
}

$jobDes = filter_input(INPUT_POST, 'jobdescription', FILTER_SANITIZE_STRING);
if($jobDes == null){
    $error = $error . "Job Description field cannot be empty.";
	$b = false; 
}

$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
if($category == null){
    $error = $error . "Job Title field cannot be empty.";
	$b = false; 
}
$companyN = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
if($companyN == null){
    $error = $error . "Company Name field cannot be empty.";
	$b = false; 
}

$companyL = filter_input(INPUT_POST, 'joblocation', FILTER_SANITIZE_STRING);
if($companyL == null){
    $error = $error . "Job Location field cannot be empty.";
	$b = false; 
}

try {
    if($b == true){
    	$stmt->bindParam(':jobTitle', $jobTitle);
        $stmt->bindParam(':jobDes', $jobDes);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':companyN', $companyN);
        $stmt->bindParam(':companyL', $companyL);
        $stmt->bindParam(':date', $date);
        
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