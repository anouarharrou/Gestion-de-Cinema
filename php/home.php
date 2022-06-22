<?php
session_start();
include "connection.php";

if(!$_SESSION['lgd']) {
    header("Location: index.php" ); // verify session Authentification
} 
//print_r($_SESSION);

$conn=cnxBD(); // global variable
$query = "SELECT * FROM films JOIN projection ON films.id_film=projection.film";


try {
    $statement = $conn->prepare($query);  
    $statement->execute();
    $showfilms = $statement->fetchAll();
} catch (PDOException $e){
    echo ($e ->getMessage());
}


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Welcome Home</title>
    <?php include '../components/header.php';?>
</head>

<body>
    <?php include '../components/nav.php';?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Show <b>Room</b></h2>
                            </div>

                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Film Title</th>
                                <th scope="col">Directeur</th>
                                <th scope="col">Acteur</th>
                                <th scope="col">Annee de Sortie</th>
                                <th scope="col">Projection Time</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Reservation</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($showfilms as $output) {?>
                            <tr>
                               
                                <td><?php echo $output['titre'];?></td>
                                <td><?php echo $output['realisateur'];?></td>
                                <td><?php echo $output['acteur'];?></td>
                                <td><?php echo $output['annee'];?></td>                     
                                <td><?php echo $output['time'];?></td>
                                <td><?php echo $output['prix'];?></td>
                                <th scope="col"> <a href="reservation.php?id=<?php echo $output['id_projection'];?>"><button type="button"
                                            class="btn btn-info add-new"><i class="fa fa-plus"></i> Reservation</button>
                                    </a></th>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <?php include '../components/footer.php';?>
    <?php	

?>
</body>

</html>