<?php 
require_once "connection.php";
$conn=cnxBD();
  $name=$_POST["username"];
  $titre=$_POST["titre"];
  $time=$_POST["time"];
  $prix=$_POST["prix"];
 
  

  $sql = "INSERT INTO reservation (id_client,titre,time,prix) VALUES ('$name','$titre','$time','$prix')";
  $stm = $conn->prepare($sql); 
  $reserv = $stm->execute();
  if ($reserv) {
      echo'<script>
              alert("reservation confirmed!!");
              window.open("index.php", "_self");
          </script>';
  }
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo '<script>window.open("index.php", "_self");</script>';
  }



?>