<?php
session_start();
$message = "";

require_once('connect.php'); #'inclusion' of php file to connect database for use

try {
    
    if(isset($_POST["login"]))
    {
        if(empty($_POST["email"]) || empty($_POST["password"]))
        {
          throw new Exception("All fields are required");
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
        $user = $stmt->fetch();
        $_SESSION["id"] = $user["id"];
        header("location: ../parentPage.php");
                
    }
    else{
        throw new Exception("Incorrect Username or Password");
    }

} catch(Exception $e) {
    #display message for exception caught
    $message = sprintf('<lable>%s</lable>', $e->getMessage());
    echo $message;
}