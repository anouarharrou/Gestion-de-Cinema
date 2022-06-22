<?php 

session_start();
include "connection.php";
$conn=cnxBD();
$query = "SELECT * FROM films";
// select from films table
try {
    $statement = $conn->prepare($query);  
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $e){
    echo ($e ->getMessage());
}

if(isset($_POST['submit'])) {
    
    foreach ($res as $key){
        $post_id=$key['id_film'];
    }
  
$post_id = $_POST['id_projection'];
$post_time = $_POST['time'];
$post_price = $_POST['prix'];

  
$insert= "INSERT INTO projection (id_projection,film,time,prix) VALUES ($post_id,$post_title,'$post_time','$post_price')";// query request for insert data into  marks table
$stm1 = $conn->prepare($insert); 
$projection = $stm1->execute();
if ($projection) {
    echo'<script>
            alert("Projection added successfully!!");
            window.open("admin.php", "_self");
        </script>';
}
else {
    echo "Error: " . $insert . "<br>" . $conn->error;
    echo '<script>window.open("admin.php", "_self");</script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Projection</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Icon Logo -->
    <link rel="icon" href="../img/logo.png" type="image/png" sizes="16x16">
    <style>
        body {
            color: red;
            background: #000;
            font-family: 'Open Sans', sans-serif;
        }

        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }
    </style>

</head>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">

                <form action="addProjection.php" method="post">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Create <b>Project</b></h2>
                            </div>
                            <div class="col-sm-4">
                            <a href="admin.php"><button type="submit" name="submit"  class="btn btn-info add-new bg-danger "><i class="fa fa-plus"></i>Add Projection</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Film
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_projection" class="col-form-label">Id Projection</label>
                            <input type="number" name="id_projection" class="form-control" required>
                        </div>                      
                        <div class="form-group">
                        <label for="film" class="col-form-label">Film Title</label>
                        <select name="film" class="form-control" id="student">
                            <option >Select Film Name</option>
                            <?php foreach ($result as $output) {?>
                            <option value ="<?php echo $output["id_film"]; ?> "><?php echo $output["titre"];?></option>
                            <?php } ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="time" class="col-form-label">Time</label>
                            <input type="date" name="time" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label for="prix" class="col-form-label">Price</label>
                            <input type="text" name="prix" class="form-control" required></input>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <a href="admin.php"><button type="button" class="btn btn-danger btn-block">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>