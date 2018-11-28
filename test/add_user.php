<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hiremedb";

// Create connection
$conn = new PDO("mysql:host=$dbServername;dbname=$dbName",$dbUsername,$dbPassword);
$conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, password, telephone, email, date_joined) VALUES (:fname, :lname, :pword, :tphone, :email, :date)");
$stmt->bindParam(':fname', $firstname);
$stmt->bindParam(':lname', $lastname);
$stmt->bindParam(':pword', $password);
$stmt->bindParam(':tphone', $telephone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':date', $date);

// set parameters and execute
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$date = date("Y-m-d");
$password = md5($_POST['password']);

$stmt->execute();


echo "New records created successfully";

header("location: ../dashBoard.html");

?>