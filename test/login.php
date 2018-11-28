<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hiremedb";
$message = " ";
try
{
    
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName",$dbUsername,$dbPassword);
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_POST["login"]))
    {
        if(empty($_POST["email"]) || empty($_POST["password"]))
        {
          echo "Incorrect Username or Password";
         $message = '<label>All fields are required</label>';   
            
        }
        else
        { 
            $query = "SELECT * FROM users WHERE email = :email and password= :password"; 
            $stmt = $conn->prepare($query);
            $pword = md5($_POST["password"]);
            $stmt-> execute( array(':email' =>  $_POST["email"], ':password' => $pword ) );
                
        }
        
    }
    $count = $stmt -> rowCount();
    if($count > 0)
    {
        $_SESSION["email"] = $_POST["email"];
        header("location: ../dashBoard.html");
                
    }
    else{
        echo "Incorrect Username or Password";
        $message = '<label>Invalid Information</label>';
        
    }
    
}
catch(PDOException $e){
    $message = $e->getMessage();
}
?>