<?php

  session_start();

  require_once "connection.php";
  $conn=cnxBD();
  if(isset($_SESSION["username"])){

    
    $userName = $_SESSION["username"];
    $userEmail = $_SESSION["email"];

    
    if(isset($_POST["newUserName"])) {

    $newUserName = $_POST["newUserName"];
    $sql = "UPDATE client SET username='$newUserName,' WHERE email='$userEmail'";
    $stm = $conn->prepare($sql); 
    $sign = $stm->execute();
      if ($sign) {
        echo "Record updated successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
     }

    if(isset($_POST["newPassword"])) {

      $newPassword = $_POST["newPassword"];
      $sql = "UPDATE client SET password='$newPassword' WHERE email='$userEmail'";
      $stm = $conn->prepare($sql); 
      $sign = $stm->execute();
        if ($sign) {
          echo "Record updated successfully";
      }
      else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
     }

    if(isset($_POST["newPhone"])) {
      $newPhone = $_POST["newPhone"];
      $sql = "UPDATE client SET phone='$newPassword' WHERE email='$userEmail'";
      $stm = $conn->prepare($sql); 
      $sign = $stm->execute();
        if ($sign) {
          echo "Record updated successfully";
      }
      else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
     
    }

    if(isset($_POST["newPassword"]) || isset($_POST["newUserName"]) || isset($_POST["newPhone"])) {
      echo '<script>alert("Updated!!");
         window.open("home.php", "_self");
         </script>';
    } else {
      echo '<script>
         window.open("home", "_self");
         </script>';
    }

  }
?>