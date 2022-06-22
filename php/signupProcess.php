<?php

require_once "connection.php";
$conn=cnxBD();
  $name=$_POST["username"];
  $phone=$_POST["tele"];
  $email=$_POST["email"];
  $password=sha1($_POST["password"]);
  

  $sql = "INSERT INTO clients (username,password,email,tele) VALUES ('$name', '$password', '$email', $phone)";
  $stm = $conn->prepare($sql); 
  $sign = $stm->execute();
  if ($sign) {
      echo'<script>
              alert("signed up successfully!!");
              window.open("index.php", "_self");
          </script>';
  }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo '<script>window.open("index.php", "_self");</script>';
  }

 

?>
