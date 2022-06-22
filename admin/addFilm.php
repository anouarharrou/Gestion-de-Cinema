<?php

require_once "connection.php";
$conn=cnxBD();

$post_id = $_POST['id_film'];
$post_title = $_POST['titre'];
$post_realisateur = $_POST['realisateur'];
$post_acteur = $_POST['acteur'];
$post_annee = $_POST['annee'];
  
 
  // insert film into table

$insert= "INSERT INTO films (id_film,titre,realisateur,acteur,annee) VALUES ($post_id,'$post_title','$post_realisateur','$post_acteur','$post_annee') "; // query request for insert data into  marks table

$stm1 = $conn->prepare($insert); 
$mark = $stm1->execute();
if ($mark) {
    echo'<script>
            alert("signed up successfully!!");
            window.open("admin.php", "_self");
        </script>';
}
else {
    echo "Error: " . $insert . "<br>" . $conn->error;
    echo '<script>window.open("admin.php", "_self");</script>';
}


?>