<!DOCTYPE html>
<?php
session_start();
include "connection.php";
$conn=cnxBD();
$sql = "SELECT * FROM `projection` p join films f on p.film=f.id_film where id_projection=".$_GET['id'];

try {
    $statement = $conn->prepare($sql);  
    $statement->execute();
    $showfilms = $statement->fetchAll();
    
} catch (PDOException $e){
    echo ($e ->getMessage());
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reservation.css">
    <title>Confirm Reservation</title>
    <?php include '../components/header.php';?>
</head>

<body>
    <?php include '../components/nav.php';?>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <form action="confirm.php" method="post" >
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Confirm <b>Reservation</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <button  type="submit" name="submit" class="btn btn-danger "></i>
                                Confirm</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id Client</th>
                            <th>Film Title</th>
                            <th>Projection Date</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>"><?php echo $_SESSION['username']; ?></td>
                            <td><input type="hidden" name="titre" value="<?php echo $showfilms[0]['titre']; ?>"><?php echo $showfilms[0]['titre']; ?></td>
                            <td><input type="hidden" name="time" value="<?php echo $showfilms[0]['time']; ?>"><?php echo $showfilms[0]['time']; ?></td>
                            <td><input type="hidden" name="prix" value="<?php echo $showfilms[0]['prix']; ?>"><?php echo $showfilms[0]['prix']; ?></td>
                        </tr>
                    </tbody>

                </table>
                </form>
            </div>
        </div>
    </div>




</body>

</html>