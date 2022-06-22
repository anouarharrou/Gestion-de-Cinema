<?php

session_start();
require_once "connection.php";

function testLogin($login, $password)
{
  $conn=cnxBD(); // global variable

    $query = "SELECT * FROM clients WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $login);
    $stmt->bindParam(':password', $password);  
    //show query
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}   
  


if($_POST) {
    // log in using hash
    $login = $_POST['username'];
    $password = $_POST['password'];
    $res = testLogin($login, sha1($password)); // SHA1 of the password
        if($res){
            $_SESSION["username"] = $login;  
            $_SESSION['lgd'] = 1;
            header("location: home.php"); 
            
              }
            else {  
            echo "<h3 style='text-align: center;' class='alert alert-danger'>Login failed! Please check your information again</h3>";
        } 
                        
} 
?>
