<?php

require_once "connection.php";
$conn=cnxBD();

// (B) HTTP CSV HEADERS
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"export.csv\"");
 
// (C) GET USERS FROM DATABASE + DIRECT OUTPUT
$stmt = $conn->prepare("SELECT * FROM `reservation`");
$stmt->execute();
while ($row = $stmt->fetch()) {
  echo implode(",", [$row["id_client"], $row["titre"], $row["time"], $row["prix"]]);
  echo "\r\n";
}
 

?>