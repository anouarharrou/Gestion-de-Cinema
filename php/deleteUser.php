<?php

  session_start();
  require_once "connection.php";
  $conn=cnxBD();
  if(isset($_SESSION["username"])) {
    $userEmail = $_SESSION["email"];
     

  $sql = "DELETE FROM clients WHERE Email='$userEmail'";
  $stm = $conn->prepare($sql); 
  $sign = $stm->execute();
  if ($sign) {
      echo'<script>
              alert("Delete successfully!!");
              window.open("home.php", "_self");
          </script>';
  }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo '<script>window.open("home.php", "_self");</script>';
  }
    
  }
?>
