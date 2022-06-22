<?php


require_once "connection.php";

function testLogin($login, $password)
{
  $conn=cnxBD(); // global variable

    $query = "SELECT * FROM admin WHERE login = :login AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);
    //show query
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}   
  

?>
